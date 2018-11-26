<?php
class RechargesController extends AppController{
    public $components = array('Paginator');
    public $paginate = array(
        'limit' => 10,
        'order' => array(
            'Recharge.id' => 'DESC')
    );
    public function add()
    {
        if ($this->Session->read('Auth.User.role_id') == 1 || $this->Session->read('Auth.User.role_id') == 2)
        {
            if ($this->request->is('post'))
            {
                $this->Recharge->create();
                if ($this->Recharge->save($this->request->data))
                {
                    $this->loadModel('User');
                    $this->User->id=$this->request->data['Recharge']['user_id'];
                    $capital=$this->User->find('all',array(
                        'fields'=>array('User.capital'),
                        'conditions'=>array('User.id'=>$this->request->data['Recharge']['user_id'])
                    ));
                    $this->User->saveField('capital',$capital[0]['User']['capital']+$this->request->data['Recharge']['amount']);
                    $this->setAction('rechages_management');
                }

            }
        }
        else
        {
            $this->redirect('/users/logout');
        }
        
    }
    
    public function rechages_management() 
    {
        if ($this->Session->read('Auth.User.role_id') == 1 || $this->Session->read('Auth.User.role_id') == 2)
        {
            $this->Paginator->settings = $this->paginate;
            $RechagesCondition=array();
            if ($this->request->is('post'))
            {
                if (isset($this->request->data['Recharge']['id']) && $this->request->data['Recharge']['id'])
                {
                    $RechagesCondition['Recharge.id']=$this->request->data['Recharge']['id'];
                }
                if ($this->request->data['Recharge']['user_id'])
                {
                    $RechagesCondition['Recharge.user_id']=$this->request->data['Recharge']['user_id'];
                }
                if ($this->request->data['Recharge']['state'])
                {
                    $RechagesCondition['Recharge.state']=$this->request->data['Recharge']['state'];
                }
                if ($this->request->data['Recharge']['way_id'])
                {
                    $RechagesCondition['Recharge.way_id']=$this->request->data['Recharge']['way_id'];
                }
                if (isset($this->request->data['Recharge']['created']) && $this->request->data['Recharge']['created'])
                {
                    $RechagesCondition['Recharge.created >=']=date("Y/m/d H:i:s", strtotime($this->request->data['Recharge']['created']));
                }
                $this->set('AllRecharges',$this->Paginator->paginate('Recharge',array(
                    $RechagesCondition
                )));
            }
            else
            {
                $this->set('AllRecharges',$this->Paginator->paginate('Recharge'));
            }
        }
        else
        {
            $this->redirect('/users/logout'); 
        }
    }

    public function delete()
    {
        if ($this->request->is('post'))
        {
            $this->Recharge->deleteAll(array('Recharge.id'=>$this->request->data('Recharge.id'),'Recharge.state'=>0));
            $this->loadModel('Notification');
             $data=array();
                    $data['Notification']['content']='لقد تم إلغاء عملية الشحن رقم: '.$this->request->data['Recharge']['id'].'
                                                        للمزيد من المعلومات المرجوا الإتصال مباشرة بالدعم الفني.
                                                        و شكرا.';
                    $data['Notification']['is_all']=0;
                    $data['Notification']['user_id']=$this->request->data['Recharge']['user_id'];
                    $this->Notification->create();
                    if ($this->Notification->save($data))
                    {
                        $this->loadModel('User');
                        $mail_user =  $this->User->find('all',array(
                            'fields'=>array('User.mail'),
                            'conditions'=>array('User.id'=>$data['Notification']['user_id'])
                        ));
                     App::uses('CakeEmail', 'Network/Email');
                        $email=new CakeEmail('gmail');
                        $email->to($mail_user[0]['User']['mail']);
                        $email->subject('لديك ينبيه جديد ');
                        //$url=$this->Html->url(array('controller'=>'Notifications','action'=>'index'));
                        $email->send('لقد تم إلغاء عملية الشحن رقم: '.$this->request->data['Recharge']['id'].'
                                                        للمزيد من المعلومات المرجوا الإتصال مباشرة بالدعم الفني.
                                                        و شكرا.');   
                        unset($this->request->data);
                        $this->Session->setFlash('تمت العملية بنجاح','alert_success');
                        $this->redirect('/Recharges/rechages_management');
                    }
        }
        unset($this->request->data);
        $this->setAction('rechages_management');
    }

    public function accept()
    {
        if ($this->request->is('post'))
        {
            $this->loadModel('User');
            $this->User->id=$this->request->data('Recharge.user_id');
            $capital=$this->User->find('all',array(
                'fields'=>array('User.capital'),
                'conditions'=>array('User.id'=>$this->request->data['Recharge']['user_id'])
            ));
            $this->User->saveField('capital',$capital[0]['User']['capital']+$this->request->data['Recharge']['amount']);                
            $this->Recharge->id=$this->request->data('Recharge.id');
            $this->Recharge->saveField('state',1);
            $this->loadModel('Notification');
             $data=array();
                    $data['Notification']['content']='لقد تم شحن حسابك    .'.$this->request->data['Recharge']['amount'].'
رقم العملية:  .'.$this->request->data('Recharge.id');
                    $data['Notification']['is_all']=0;
                    $data['Notification']['user_id']=$this->request->data['Recharge']['user_id'];
                    $this->Notification->create();
                    if ($this->Notification->save($data))
                    {
                         $mail_user =  $this->User->find('all',array(
                            'fields'=>array('User.mail'),
                            'conditions'=>array('User.id'=>$data['Notification']['user_id'])
                        ));
                     App::uses('CakeEmail', 'Network/Email');
                    $emaile=new CakeEmail('gmail');
                    $emaile->to($mail_user[0]['User']['mail']);
                    $emaile->subject('لقد تم شحن حسابك ');
                    $url= Router::url('/recharges/payments/',TRUE);
                    $emaile->viewVars(array('url'=>$url,'price'=>$this->request->data['Recharge']['amount']));
                    $emaile->template('kachyou');
                    $emaile->send();
                        $this->Session->setFlash('تمت العملية بنجاح','alert_success');
                        $this->redirect('/Recharges/rechages_management');
                    }

        }
        unset($this->request->data);
        $this->setAction('rechages_management');
    }
            
    public function balance()
    {//user
        if ($this->Session->read('Auth.User.role_id')==3)
        {
            $this->loadModel('User');
            $this->set('capitale',$this->User->find('all',
                array(
                    'fields'=>array('User.capital'),
                    'conditions'=>array('User.id'=>$this->Session->read('Auth.User.id')))));
            $data=array();
            $this->loadModel('Parameter');
            $parameter = $this->Parameter->find('first');
        if ($this->request->is('post'))
        {
            if ($this->request->data['Recharge']['way_id']==3) 
            {
                if (isset($this->request->data['Recharge']['cheked']) && $this->request->data['Recharge']['cheked'])
                {
                    if ((float)$this->request->data['Recharge']['amount'] >= (float)$parameter['Parameter']['lowest_amount_charging'])
                    {
                        if ((float)$this->request->data['Recharge']['amount'] >= (float)$parameter['Parameter']['when_charging'])
                        {
                            (float)$this->request->data['Recharge']['amount']=(float)$this->request->data['Recharge']['amount']+(float)$parameter['Parameter']['free_amount'];
                        }
                         APP::uses('Paypale', 'Lib');
                         $this->loadModel('Paypal');
                         $P= $this->Paypal->find('first');
                            $obj=new Paypale($P['Paypal']['user'],$P['Paypal']['pass'],$P['Paypal']['signature'],FALSE);
                            $params = array(
                            'PAYMENTREQUEST_0_PAYMENTACTION'=>'SALE',
                            'PAYMENTREQUEST_0_AMT'=> $this->request->data['Recharge']['amount'],
                            'PAYMENTREQUEST_0_CURRENCYCODE' =>'USD',
                            'L_PAYMENTREQUEST_0_NAME0'=>' شحن حسابك في  likers ',
                            'L_PAYMENTREQUEST_0_AMT0'=>$this->request->data['Recharge']['amount'],
                            'L_PAYMENTREQUEST_0_QTY0'=>1,
                            'returnUrl' => Router::url(array('controller'=>'Recharges', 'action'=>'payment_paypal'), true),
                            'cancelUrl' => Router::url(array('controller'=>'Recharges', 'action'=>'balance'), true)
                        ); 
                            $response=$obj->request('SetExpressCheckout',$params);
                            if($response != FALSE)
                            {
                               // var_dump($response);    
                                return $this->redirect("https://www.paypal.com/webscr?cmd=_express-checkout&useraction=commit&token=".$response['TOKEN']);
                            }
                            else
                            {
                                echo 'errore paypal';
                               var_dump($obj->errors);
                               die();
                            } 
                    }
                    else
                    {
                        $this->Session->setFlash('المرجو تفقد المبلغ المراد شحنه','alert_warning');
                    }
                }
                else
                {
                    $this->Session->setFlash('يجب عليك مراجعة شروط الاستخدام','alert_warning');
                }
            }
            if ($this->request->data['Recharge']['way_id']==5) 
            {
                if (isset($this->request->data['Recharge']['cheked']) && $this->request->data['Recharge']['cheked'])
                {
                    if ($this->request->data['Recharge']['amount'] && $this->request->data['Recharge']['transaction_id'])
                    {
                        $data['Recharge']['amount']=  $this->request->data['Recharge']['amount'];
                        $data['Recharge']['way_id']=  5;
                        $data['Recharge']['user_id']=  $this->Session->read('Auth.User.id');
                        $data['Recharge']['state']=  0;
                        $data['Recharge']['transaction_id']=  $this->request->data['Recharge']['transaction_id'];
                        if ((float)$data['Recharge']['amount'] >= (float)$parameter['Parameter']['lowest_amount_charging'])
                        {
                            if ((float)$data['Recharge']['amount'] >= (float)$parameter['Parameter']['when_charging'])
                            {
                                (float)$data['Recharge']['amount']=(float)$data['Recharge']['amount']+(float)$parameter['Parameter']['free_amount'];

                            }
                             if($this->Recharge->save($data))
                                {
                                    $this->Session->setFlash('عمليتك في طور المراجة','alert_success'); 
                                } 
                        }
                        else
                        {
                            $this->Session->setFlash('المرجو تفقد المبلغ المراد شحنه','alert_warning');
                        }
                    }
                    else
                    {
                        $this->Session->setFlash('المرجو تفقد المعلومات','alert_warning');
                    }
                }
                else
                {
                    $this->Session->setFlash('يجب عليك مراجعة شروط الاستخدام','alert_warning');
                }
                }
                //
            if ($this->request->data['Recharge']['way_id']==2) 
            {
                if (isset($this->request->data['Recharge']['cheked']) && $this->request->data['Recharge']['cheked'])
                {
                    if ($this->request->data['Recharge']['amount'] && $this->request->data['Recharge']['transaction_id'])
                    {
                        $data['Recharge']['amount']=  $this->request->data['Recharge']['amount'];
                        $data['Recharge']['way_id']=  2;
                        $data['Recharge']['user_id']=  $this->Session->read('Auth.User.id');
                        $data['Recharge']['state']=  0;
                        $data['Recharge']['transaction_id']=  $this->request->data['Recharge']['transaction_id'];
                        if ((float)$data['Recharge']['amount'] >= (float)$parameter['Parameter']['lowest_amount_charging'])
                        {
                            if ((float)$data['Recharge']['amount'] >= (float)$parameter['Parameter']['when_charging'])
                            {
                                (float)$data['Recharge']['amount']=(float)$data['Recharge']['amount']+(float)$parameter['Parameter']['free_amount'];

                            }
                             if($this->Recharge->save($data))
                                {
                                    $this->Session->setFlash('عمليتك في طور المراجة','alert_success'); 
                                } 
                        }
                        else
                        {
                            $this->Session->setFlash('المرجو تفقد المبلغ المراد شحنه','alert_warning');
                        }
                    }
                    else
                    {
                        $this->Session->setFlash('المرجو تفقد المعلومات','alert_warning');
                    }
                }
                else
                {
                    $this->Session->setFlash('يجب عليك مراجعة شروط الاستخدام','alert_warning');
                }
                }
            if ($this->request->data['Recharge']['way_id']==4) 
            {
                if (isset($this->request->data['Recharge']['cheked']) && $this->request->data['Recharge']['cheked']) {
                 
                $this->loadModel('Coupon');
                 $price=  $this->Coupon->find('first',array(
                    'conditions'=>array('Coupon.code'=> $this->request->data['Recharge']['transaction_id'])
                ));
                if($price!=null)
                {
                $data['Recharge']['amount']=  $price['Coupon']['price'];
                        $data['Recharge']['way_id']=  4;
                        $data['Recharge']['user_id']=  $this->Session->read('Auth.User.id');
                        $data['Recharge']['state']=  1;
                        $data['Recharge']['transaction_id']=  $this->request->data['Recharge']['transaction_id'];
                if ($this->Recharge->save($data)) {
                     $this->loadModel('User');
                            $capitale=$this->User->find('all',
                                array(
                                    'fields'=>array('User.capital'),
                                    'conditions'=>array('User.id'=>$this->Session->read('Auth.User.id'))));
                            $this->User->updateAll(
                                    ['User.capital'=>(float)$capitale[0]['User']['capital']+(float)$data['Recharge']['amount']],
                                    ['User.id' => $data['Recharge']['user_id'] ]);
                            $this->Coupon->delete($price['Coupon']['id']);
                            App::uses('CakeEmail', 'Network/Email');
                    $email=new CakeEmail('gmail');
                    $email->to($this->Session->read('Auth.User.mail'));
                    $email->subject('لديك تنبيه جديد ');
                    $url= Router::url('/Recharges/payments',TRUE);
                    $email->viewVars(array('url'=>$url,'price'=>$data['Recharge']['amount']));
                    $email->template('coupon');
                    $email->send();
                            $this->Session->setFlash('لقد نجحت عملية الشحن','alert_success');
                            return $this->redirect('/Recharges/payments');
                }
                else
                {
                  //save  
                $this->Session->setFlash('حدت خطأ المرجوا إعادة المحاولة','alert_warning');
                }
                }
                else{
                    //coupon note existe
                                   $this->Session->setFlash('الكوبون لا يعمل أو إنتهت مدة صلاحيته','alert_warning');

                }
                }
            else
                {
                    $this->Session->setFlash('يجب عليك مراجعة شروط الاستخدام','alert_warning');
                }
            }
        }  
        }
    }
    
    public function payment_paypal() 
    {
        
        APP::uses('Paypale', 'Lib');
        $this->loadModel('Paypal');
        $P= $this->Paypal->find('first');
        $obj=new Paypale($P['Paypal']['user'],$P['Paypal']['pass'],$P['Paypal']['signature'],FALSE);

	$response = $obj->request('GetExpressCheckoutDetails',array(
			'TOKEN'=>$_GET['token']
		));
	if($response)
	{
		//die();
	}
	else{
		$this->Session->setFlash('لقد فشلة عملية الشحن','alert_warning');
                $this->redirect('/Recharges/balance',true);
	}        
        $response = $obj->request('DoExpressCheckoutPayment',array(
	'TOKEN'=>$_GET['token'],
	'PAYERID' =>$_GET['PayerID'],
	'PAYMENTACTION'=>'Sale',
	'PAYMENTREQUEST_0_AMT'=>$response['PAYMENTREQUEST_0_AMT'],
	'PAYMENTREQUEST_0_CURRENCYCODE' =>'USD'
	));
	
	if($response)
	{
            if ($response['PAYMENTINFO_0_ACK']=='Success') 
            {
               $data=[];
                $data['Recharge']['amount']=  $response['PAYMENTINFO_0_AMT'];
                        $data['Recharge']['way_id']=  3;
                        $data['Recharge']['user_id']=  $this->Session->read('Auth.User.id');
                        $data['Recharge']['state']=  1;
                        $data['Recharge']['transaction_id']= $response['PAYMENTINFO_0_TRANSACTIONID'];
                        if ($this->Recharge->save($data)) {
                            $this->loadModel('User');
                            $capitale=$this->User->find('all',
                                array(
                                    'fields'=>array('User.mail,User.capital'),
                                    'conditions'=>array('User.id'=>$this->Session->read('Auth.User.id'))));
//                                debug($capitale);
//                                die();
                            $this->User->updateAll(
                                    ['User.capital'=>(float)$capitale[0]['User']['capital']+(float)$data['Recharge']['amount']],
                                    ['User.id' => $data['Recharge']['user_id'] ]);
                            App::uses('CakeEmail', 'Network/Email');
                    $email=new CakeEmail('gmail');
                    $email->to($capitale[0]['User']['mail']);
                    $email->subject('لقد تم شحن حسابك ');
                    $url= Router::url('/recharges/payments/',TRUE);
                    $email->viewVars(array('url'=>$url,'price'=>$data['Recharge']['amount']));
                    $email->template('paypaleMaill');
                    $email->send();
                            $this->Session->setFlash('لقد نجحت عملية الشحن','alert_success');
                            $this->setAction('payments');
                           // return $this->redirect('/Recharges/payments',true);
                        } 
            }  
            else {
                $this->Session->setFlash('لقد فشلة عملية الشحن','alert_warning');
                $this->setAction('payments');
            }
                        
	}
	else{
		$this->Session->setFlash('لقد فشلة عملية الشحن','alert_warning');
                $this->setAction('payments');
	}
	
        
        
       
    }
    
    public function payments()
    {//user
       if ($this->Session->read('Auth.User.role_id')==3)
        {
           $this->Paginator->settings=  $this->paginate;
            $this->loadModel('User');
            $RechagesCondition=array();
                $this->set('capitale',$this->User->find('all',
                array(
                    'fields'=>array('User.capital'),
                    'conditions'=>array('User.id'=>$this->Session->read('Auth.User.id')))));
                
            $RechagesCondition['Recharge.user_id']=$this->Session->read('Auth.User.id');
            if ($this->request->is('post'))
            {
                if ($this->request->data['Recharge']['id'])
                {
                    $RechagesCondition['Recharge.id']=$this->request->data['Recharge']['id'];
                }

                if (isset($this->request->data['Recharge']['state']) && $this->request->data['Recharge']['state'])
                {
                    $RechagesCondition['Recharge.state']=$this->request->data['Recharge']['state'];
                }
                if (isset($this->request->data['Recharge']['way_id']) && $this->request->data['Recharge']['way_id'])
                {
                    $RechagesCondition['Recharge.way_id']=$this->request->data['Recharge']['way_id'];
                }
                $this->set('AllRecharges',$this->Paginator->paginate('Recharge',array(
                    $RechagesCondition
                )));
                }
                else
                {
                    $this->set('AllRecharges',$this->Paginator->paginate('Recharge',$RechagesCondition));
                }
            }
    }

}