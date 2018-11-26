<?php
class OrdersController extends AppController
{
    public $components = array('Paginator','RequestHandler');
    public $helpers = array('Js');

    public $paginate = array(
        'limit' => 10,
        'order' => array(
            'Order.created' => 'desc')
    );
        
    public function historic()
    {//user
        $this->Paginator->settings = $this->paginate;
        $OrderCondition=array();
        $this->loadModel('State');
        if ($this->request->is('post'))
        {
            $OrderCondition['id_user']=$this->Session->read('Auth.User.id');
             if (isset($this->request->data['Order']['id_state']) && $this->request->data['Order']['id_state'])
            {
                $OrderCondition['Order.id_state']=$this->request->data['Order']['id_state'];
            }
            if (isset($this->request->data['Order']['created']) && $this->request->data['Order']['created'])
            {
                $OrderCondition['Order.created >=']=date("Y/m/d H:i:s", strtotime($this->request->data['Order']['created']));
            }
            if (isset($this->request->data['Order']['id']) && $this->request->data['Order']['id'])
            {
                $OrderCondition['Order.id']=$this->request->data['Order']['id'];
            }
            $this->set('order_service',$this->Paginator->paginate('Order',array(
                    $OrderCondition
                    )));
        }
        else
        {
            $this->set('order_service',$this->Paginator->paginate('Order',array('id_user'=>$this->Session->read('Auth.User.id'))));
        }        
        $this->set('state1',$this->Order->find('count',
        array(
            'fields'=>array('Order.id_state'),
            'conditions'=>array(
                'Order.id_user'=> $this->Session->read('Auth.User.id'),
                'Order.id_state'=> 1
        ))));
        $this->set('state2',$this->Order->find('count',
        array(
            'fields'=>array('Order.id_state'),
            'conditions'=>array(
                'Order.id_user'=> $this->Session->read('Auth.User.id'),
                'Order.id_state'=> 2
        ))));
        $this->set('state3',$this->Order->find('count',
        array(
            'fields'=>array('Order.id_state'),
            'conditions'=>array(
                'Order.id_user'=> $this->Session->read('Auth.User.id'),
                'Order.id_state'=> 3
        ))));
        $this->set('state4',$this->Order->find('count',
        array(
            'fields'=>array('Order.id_state'),
            'conditions'=>array(
                'Order.id_user'=> $this->Session->read('Auth.User.id'),
                'Order.id_state'=> 4
        ))));
        $this->set('state5',$this->Order->find('count',
        array(
            'fields'=>array('Order.id_state'),
            'conditions'=>array(
                'Order.id_user'=> $this->Session->read('Auth.User.id'),
                'Order.id_state'=> 5
        ))));
        $this->set('all',$this->Order->find('count'));
    }
    
    public function add2()
    {//user
    $this->loadModel('Service');
    $this->loadModel('User');
        $capital=  $this->User->find('all',array(
           'fields'=>array('User.capital'),
           'conditions'=>array('User.id'=>  $this->Session->read('Auth.User.id'))
        ));
        if ($this->request->is('post'))
        {
            if ($this->request->data['Order'])
            {
                if ($this->request->data['Order']['check'])
                {
                     if ($this->request->data['Order']['url']!='') {
                         if(isset($this->request->data['Order']['id_service_order']) && $this->request->data['Order']['id_service_order'])
                         {
                         //récupérer les info du service
                        $t=$this->Service->find('all',
                        array(
                            'fields'=>array('Service.price','Service.lowest_quantity','Service.largest_quantity'),
                            'conditions'=>array('Service.id'=> $this->request->data['Order']['id_service_order'])
                        ));
                        if ($this->request->data['Order']['quantity']>= $t[0]['Service']['lowest_quantity'] &&
                            $this->request->data['Order']['quantity']<= $t[0]['Service']['largest_quantity'])
                        {
                            (float)$prix=((int)$this->request->data['Order']['quantity']*(float)$t[0]['Service']['price'])/1000  ;
                            $reduction = ($prix*(float)$this->Session->read('Auth.User.reduction'))/100;
                             $prix=$prix-$reduction;
                            if ($prix <= (float)$capital[0]['User']['capital'])
                            {
                                //stocker les données
                                $data=array(
                                'id_service_order'=> $this->request->data['Order']['id_service_order'],
                                'final_number'=> (int)$this->request->data['Order']['quantity'],
                                'price'=> $prix,
                                'quantity'=> $this->request->data['Order']['quantity'],
                                'url'=> $this->request->data['Order']['url'],
                                'id_state'=> 1,
                                'id_user'=> $this->Session->read('Auth.User.id')
                                );
                                $this->Order->create();
                                if ($this->Order->save($data))
                                {
                                    $this->User->updateAll(
                                           array('User.capital'=>(float)$capital[0]['User']['capital']-$prix),
                                           array('User.id'=>  $this->Session->read('Auth.User.id')));
                                   $this->setAction('historic'); 
                                }
                            }
                            else
                            {
                                $this->Session->setFlash('رصيدك غير كافي','alert_warning');
                                $this->redirect(array('controller'=>'orders','action'=>'index','1'));                                
                            }
                        }
                        else
                        {
                            $this->Session->setFlash('تأكد من الكمية المطلوبة','alert_warning');
                            $this->redirect(array('controller'=>'orders','action'=>'index','1'));
                        }
                     }
                        else
                        {
                            
                             $this->Session->setFlash('إختر خدمة','alert_warning');
                            $this->redirect(array('controller'=>'orders','action'=>'index','1'));
                        }
                    }
                    else {
                        $this->Session->setFlash('تفقد الروابط','alert_warning');
                                $this->redirect(array('controller'=>'orders','action'=>'index','1'));
                    }
                }
                else
                {
                    $this->Session->setFlash('يجب ان توافق على الشروط','alert_warning');
                    $this->redirect(array('controller'=>'orders','action'=>'index','1')); 
                }
            }
        } 
    }
    
    public function add()
    {//user
        $this->loadModel('Service');
        $this->loadModel('User');
        $capital=  $this->User->find('all',array(
           'fields'=>array('User.capital'),
           'conditions'=>array('User.id'=>  $this->Session->read('Auth.User.id'))
        ));
        $t=array();
        $prix=0;
    // sauvgarede du données
        if ($this->request->is('post'))
        {
            if ($this->request->data['Order'])
            {
                 if ($this->request->data['Order']['check'])
                    {
                        if(isset($this->request->data['Order']['id_service_order']) && $this->request->data['Order']['id_service_order'])
                        {
                     //récupérer les info du service
                        $t=$this->Service->find('all',
                        array(
                            'fields'=>array('Service.price','Service.lowest_quantity','Service.largest_quantity'),
                            'conditions'=>array('Service.id'=> $this->request->data['Order']['id_service_order'])
                        ));
                        if ($this->request->data['Order']['quantity']>= $t[0]['Service']['lowest_quantity'] &&
                            $this->request->data['Order']['quantity']<= $t[0]['Service']['largest_quantity'])
                        {
                            (float)$prix=((int)$this->request->data['Order']['quantity']*(float)$t[0]['Service']['price'])/1000  ;
                            $reduction = ($prix*(float)$this->Session->read('Auth.User.reduction'))/100;
                             $prix=$prix-$reduction;
                            if ($prix <= (float)$capital[0]['User']['capital'])
                                {
                                 //stocker les données
                                $data=array(
                                'id_service_order'=> $this->request->data['Order']['id_service_order'],
                                'initial_number'=> $this->request->data['Order']['initial_number'],
                                'final_number'=> (int)$this->request->data['Order']['initial_number'] + (int)$this->request->data['Order']['quantity'],
                                'price'=> $prix,
                                'quantity'=> $this->request->data['Order']['quantity'],
                                'url'=> $this->request->data['Order']['url'],
                                'id_state'=> 1,
                                'id_user'=> $this->Session->read('Auth.User.id')
                                );
                                $this->Order->create();
                                if ($this->Order->save($data,array('validate'=>true)))
                                {
                                    $this->User->updateAll(
                                           array('User.capital'=>(float)$capital[0]['User']['capital']-$prix),
                                           array('User.id'=>  $this->Session->read('Auth.User.id')));
                                   $this->setAction('historic'); 
                                }
                                else
                                {
                                     $this->Session->setFlash('تأكد من المعلومات المدخلة','alert_warning');
                                    return $this->redirect(array('controller'=>'orders','action'=>'index',$data['id_service_order']));
                                }
                            }
                            else
                            {
                                $this->Session->setFlash('رصيدك غير كافي','alert_warning');
                                $this->redirect(array('controller'=>'orders','action'=>'index','1'));                                
                            }
                        }
                        else
                        {
                            $this->Session->setFlash('تأكد من الكمية المطلوبة','alert_warning');
                            $this->redirect(array('controller'=>'orders','action'=>'index','1'));
                        }
                        }
                        else
                        {
                             $this->Session->setFlash('alert_warning');
                              $this->Session->setFlash('المرجوا إختيار خدمة','alert_warning');
                        $this->redirect(array('controller'=>'orders','action'=>'index','1'));
                        }
                    }
                else
                    {
                        $this->Session->setFlash('يجب ان توافق على الشروط','alert_warning');
                        $this->redirect(array('controller'=>'orders','action'=>'index','1'));
                    }
            }
        }
    }
    
    public function index($param=null)
    {//user
        $this->loadModel('Service');
        // ajax
        $s=0;
        if ($this->RequestHandler->isAjax())
        {
            if (isset($this->request->data['Order']['url']))
            {
                 App::uses('Instagram', 'Lib');
                    $ing =new Instagram();
                    if($this->request->data['Order']['url'] && $ing->get($this->request->data['Order']['url']))
                    {
                         $this->set('ing',$ing);
                    }
                    else {
                        $ing->user_name  ="لا توجد معلومات";
                        $ing->followd_by="لا توجد معلومات";
                        $this->set('ing',$ing);
                    }
            }
            if (isset($this->request->data['Order']['id_service_order']) && $this->request->data['Order']['id_service_order'])
            {
            $s=$this->request->data['Order']['id_service_order'];
            $this->set('Service',$this->Service->find('all',
            array(
                'fields'=>array('Service.name','Service.price','Service.lowest_quantity','Service.largest_quantity','Service.description'),
                'conditions'=>array('Service.id'=> $s),
                'recursive' => -1
                )));
            }
        }
        // rmplisage du <select>
        $this->set('OrderServices',$this->Service->find('all',array(
            'fields'=>array('Service.id','Service.name'),
            'conditions'=>array(
                'Service.type_id'=> $param,
                'Service.active'=>1
        ))));
        unset($this->request->data);
   }
  
   public function orders_management()
   {//admin
        if ($this->Session->read('Auth.User.role_id')==1 || $this->Session->read('Auth.User.role_id')==2)
        {
             $this->Paginator->settings =array(
                                              'limit' => 10,
                                              'order' => array(
                                                  'Order.created' => 'desc')
                                              );
          if($this->request->is('post'))
            {
                $conditions=array();
                if ($this->request->data['Order']['id'])
                {
                    $conditions['Order.id']=$this->request->data['Order']['id'];
                }
                if ($this->request->data['Order']['id_user'])
                {
                    $conditions['Order.id_user']=$this->request->data['Order']['id_user'];
                }
                if ($this->request->data['Order']['url'])
                {
                    $conditions['Order.url LIKE']='%'.$this->request->data['Order']['url'].'%';
                }
                if ($this->request->data['Order']['price'])
                {
                    $conditions['Order.price >=']=$this->request->data['Order']['price'];
                }
                if (isset($this->request->data['Order']['id_state']) && $this->request->data['Order']['id_state'])
                {
                    $conditions['Order.id_state']=$this->request->data['Order']['id_state'];
                }
                if ($this->request->data['Order']['created'])
                {
                    $conditions['Order.created >=']=date("Y/m/d H:i:s", strtotime($this->request->data['Order']['created']));
                }
                $this->set('AllOrders',$this->Paginator->paginate('Order',array($conditions)));               
            }
            else
            {
                $this->set('AllOrders',$this->Paginator->paginate('Order'));
            }   
        }
        else
        {
            $this->redirect('/users/logout');
        }
   }
   public function update_state()
   {
       if ($this->Session->read('Auth.User.role_id')==1)
       {
           if ($this->request->is('post'))
           {
               $this->Order->updateAll(
                       array(
                        'Order.id_state'=> $this->request->data['Order']['id_state'],
                        'Order.initial_number'=> $this->request->data['Order']['initial_number'],
                        'Order.final_number'=> (int)$this->request->data['Order']['initial_number']+(int)$this->request->data['Order']['quantity']
                       ),
                   array('Order.id'=>$this->request->data['Order']['id'])
                   );
           }
         unset($this->request->data);
        $this->setAction('orders_management');
        }
                else
        {
            $this->redirect('/users/logout');
        }

   }

   public function cancel()
   {
       if ($this->request->is('post'))
           {
               $this->loadModel('User');
                $data=  $this->Order->find('all',
                        array(
                            'fields'=>array('Order.id_state','Order.price'),
                            'conditions'=>array('Order.id'=>$this->request->data['Order']['id'])
                        ));
                $capital=$this->User->find('all',
                        array(
                            'fields'=>array('User.capital'),
                            'conditions'=>array('User.id'=>$this->request->data['Order']['id_user'])
                        ));
                        if ($data[0]['Order']['id_state']!= 4)
                        {
                             $this->Order->updateAll(array('Order.id_state' => 4 ),
                                array('Order.id'=>$this->request->data['Order']['id'])
                                );
                             $rst=(float)$capital[0]['User']['capital']+ (float)$data[0]['Order']['price'];
                            $this->User->updateAll(array('User.capital' =>$rst),
                                array('User.id'=>$this->request->data['Order']['id_user'])
                                );
                        }
              
           }
           unset($this->request->data);
           $this->setAction('orders_management');
   }
   
           
   
}

