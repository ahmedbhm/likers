<?php
use Cake\I18n\Time;
class UsersController extends AppController
{
    public $components = array('Paginator');
    public $paginate = array(
        'limit' => 10,
        'order' => array(
            'User.created' => 'desc')
    );
    private $SafetyKey='30993c32e3f0880e586a2116686d8975d26afadc';
    
    public function email($to,$username)
    {
        App::uses('CakeEmail', 'Network/Email');
        $email=new CakeEmail('gmail');
        $email->to($to);
        $email->subject('مرحبا بك  ');
        $email->viewVars(array('username'=>$username));
        $email->template('welcom');
        $email->send();
    }

    public function register() 
    {//user
        if ($this->request->is('post'))
        {            
            if ($this->Session->read('Auth.User.role_id')==1)
            {
                $this->request->data['User']['role_id']=3;
                $this->request->data['User']['pass']= AuthComponent::password($this->request->data['User']['pass']);                
                if ($this->User->save($this->request->data)) {
                   $id = $this->User->id;
                   $this->request->data['User'] = array_merge(
                       $this->request->data['User'],
                       array('id' => $id)
                   );
                    $this->email($this->request->data['User']['mail'], $this->request->data['User']['Pseudo']);
                    unset($this->request->data['User']['pass']);
                    $this->Auth->login($this->request->data['User']);
                    return $this->redirect('/users/login');  
                }
            }
            else
            {
                if ($this->request->data['User']['country']!='') 
                {
                    $this->request->data['User']['role_id']=3;
                $this->request->data['User']['pass']= AuthComponent::password($this->request->data['User']['pass']); 
                    try {
	
	                    if ($this->User->save($this->request->data)) 
	                    {
		                    $id = $this->User->id;
		                    $this->request->data['User'] = array_merge(
						                        $this->request->data['User'],
						                        array('id' => $id)
						                    );
				App::uses('CakeEmail', 'Network/Email');
				        $email=new CakeEmail('gmail');
				        $email->to($this->request->data['User']['mail']);
				        $email->subject('مرحبا بك  ');
				        $email->viewVars(array('username'=>$this->request->data['User']['Pseudo']));
				        $email->template('welcom');
				        $email->send();
		                    unset($this->request->data['User']['pass']);
		                    $this->Auth->login($this->request->data['User']);
		                    $this->Session->setFlash('تم تسجيل حسابك بنجاح','alert_success');
		                    return $this->redirect('/users/logout');
	                	}
		                else 
		                {
		                    $this->Session->setFlash('حدث خطأ','alert_warning');
		                }	
		                }
			catch (Exception $e) 
			{
				$this->Session->setFlash('حدث خطأ','alert_warning');
			}
                }
                else {
                    $this->Session->setFlash('تفقد الدولة','alert_warning');
                }
                $this->request->data['User']['role_id']=3;
                $this->request->data['User']['pass']= AuthComponent::password($this->request->data['User']['pass']);
                
            }            
        }
    }
    public function login()
    {
        if ($this->request->is('post'))
        {            
            if ($this->Auth->login())
            {
                if ($this->Session->read('Auth.User.role_id')==3 && $this->Session->read('Auth.User.active')==1)
                {
                    return $this->redirect('/users/home');
                }
                if ($this->Session->read('Auth.User.role_id') == 2 && $this->Session->read('Auth.User.active')==1)
                {
                    return $this->redirect('/users/admin');
                }
                if ($this->Session->read('Auth.User.role_id') == 1 )
                {
                    return $this->redirect('/users/admin');
                }
            }
            else
            {
                $this->Session->setFlash('المرجو تفقد كلمة المرور أو الرقم السري ','alert_warning');   
            }
        }
    }
    public function logout()
    {
        $this->Auth->logout();
        return $this->redirect('/');
    }
    public function navbar_types()
    {//user
        $this->loadModel('Type');
        $this->set('ServicesCategory',$this->Type->find('all',
                array('fields'=>array('Type.id','Type.name','url_icon'),
                    'conditions'=>array('Type.active'=>1)
                )));
        if(isset($this->params['requested'])) 
            { //s’il s’agit de l’appel pour l’élément
                $ServicesCategory = $this->Type->find('all',
                array(
                    'fields'=>array('Type.id','Type.name','url_icon'),
                    'conditions'=>array('Type.active'=>1)         
                ));
                return $ServicesCategory;
            }
    }
    public function home()
    {//user
        if ($this->Session->read('Auth.User.role_id')==3)
        {
            $this->loadModel('Notification');
            $this->set('Notifications',$this->Notification->find('all',
                array(
                    'limit'=>5,
                    'order' => array('Notification.created DESC'),
                    'conditions'=>array(
                        'OR'=>array(
                        'Notification.user_id'=>$this->Session->read('Auth.User.id'),
                        'Notification.is_all'=>1)))));
            //
            $this->loadModel('Ticket');
            $this->set('TicketNoSeen',$this->Ticket->find('all',
                array(
                    'fields'=>array('COUNT(*) as sum_ticket'),
                    'conditions'=>array('Ticket.user_id'=>$this->Session->read('Auth.User.id'),
                        'Ticket.seen'=>0))));
            //
        $this->loadModel('User');
                $this->set('capitale',$this->User->find('all',
                array(
                    'fields'=>array('User.capital'),
                    'conditions'=>array('User.id'=>$this->Session->read('Auth.User.id')))));
        $this->loadModel('Order');
        $this->set('order_count',$this->Order->find('count',
                array(
                    'conditions'=>array(
                        'Order.id_user'=> $this->Session->read('Auth.User.id')
                ))));
        $this->set('LatestOrders',$this->Order->find('all',
                array(
                    'limit' => 5,
                    'fields'=>array('Service.name','Order.created'),
                    'order' => array('Order.created DESC'),
                    'conditions'=>array('Order.id_user'=> $this->Session->read('Auth.User.id'))
                )));
        
       }else{
        $this->redirect('/users/logout');
       }
    }
    
    public function admin() 
    {
        if ($this->Session->read('Auth.User.role_id')==1 || $this->Session->read('Auth.User.role_id')==2)
        {
        $this->loadModel('Order');
        $this->loadModel('Recharge');

        // 5 new user
        $this->set('NewUser',  $this->User->find('all',array(
            'fields' => array('User.id', 'User.Pseudo','User.created'),
            'limit'=>8,
            'order' => array('User.created DESC')
        )));
        //10 active user
        $this->set('ActiveUser',$this->User->find('all',array(
            'fields' => array('User.id', 'User.Pseudo','User.created'),
            'conditions'=>array('TIMESTAMPDIFF(MINUTE,last_connection,NOW()) <=' => 10)        
        )));
        // nombre total des orders
        $this->set('OrdersCount',$this->Order->find('count'));
    //total price for recharges
        $this->set('sum_amount', $this->Recharge->find('all', array(
                    'fields' => array('sum(Recharge.amount) as total_sum'
                ))));
    //total capitales of users
        $this->set('sum_capital', $this->User->find('all', array(
                    'fields' => array('sum(User.capital) as total_sum'
                ))));
    //total prices of Orders
        $this->set('sum_prices', $this->Order->find('all', array(
                    'conditions'=>array('Order.id_state'=>2),
                    'fields' => array('sum(Order.price) as total_sum'
                ))));
//total prices of recharge Recharge today
$this->set('sum_Recharge_today', $this->Recharge->find('all', array(
            'conditions'=>array('DATE(Recharge.created) = '=>date('Y-m-d')),
            'fields' => array('sum(Recharge.amount) as total_sume'
        ))));        
//total prices of recharge Recharge Yesterday
$this->set('sum_Recharge_Yesterday', $this->Recharge->find('all', array(
            'conditions'=>array(
                'AND'=>array('DATE(Recharge.created) <'=>date('Y-m-d'),
                    'DATE(Recharge.created) >='=>date('Y-m-d', strtotime('-1 day'))
                    )),
            'fields' => array('sum(Recharge.amount) as total_sum')
        )));
        //total prices of recharge Recharge A week ago
$this->set('sum_Recharge_week_ago', $this->Recharge->find('all', array(
    'fields' => array('sum(Recharge.amount) as total_sum'),
            'conditions'=>array(
                'AND'=>array('DATE(Recharge.created) <= '=>date('Y-m-d'),
                    'DATE(Recharge.created) >='=>date('Y-m-d', strtotime('-7 day')
                    )))
        )));
$this->set('sum_Recharge_month_ago', $this->Recharge->find('all', array(
            'fields' => array('sum(Recharge.amount) as total_sum'),
            'conditions'=>array(
                'AND'=>array('DATE(Recharge.created) <='=>date('Y-m-d'),
                    'DATE(Recharge.created) >='=>date('Y-m-d', strtotime('-30 day')
                    )))
    )));
        //total prices of recharge Recharge A year ago
$this->set('sum_Recharge_year_ago', $this->Recharge->find('all', array(
            'fields' => array('sum(Recharge.amount) as total_sum'),
            'conditions'=>array(
                'AND'=>array('DATE(Recharge.created) <='=>date('Y-m-d'),
                    'DATE(Recharge.created) >='=>date('Y-m-d', strtotime('-365 day')
                    )))
    )));
    //The 4 last financial transactions
        $this->set('last_4_recharges', $this->Recharge->find('all', array(
                    'limit'=>4,
                    'order' => array('Recharge.created DESC')
                )));
        }   
        else{
        $this->redirect('/users/logout');
       } 
    }
     
    public function members_management($param = null)
    {//admin
        if ($this->Session->read('Auth.User.role_id')==1 || $this->Session->read('Auth.User.role_id')==2)
        {
            $this->Paginator->settings=  $this->paginate;
            if ($param != null && $param >= 1 && $param <= 5)
            {
                //debug($this->Presence_member($param));die();
                $this->set('AllUsers',$this->Paginator->paginate('User',$this->Presence_member($param)));                    
            }
            elseif($this->request->is('post'))
            {
                $conditions=array();
                if ($this->request->data['User']['id'])
                {
                    $conditions['User.id']=$this->request->data['User']['id'];
                }
                if ($this->request->data['User']['Pseudo'])
                {
                    $conditions['User.Pseudo']=$this->request->data['User']['Pseudo'];
                }
                if ($this->request->data['User']['mail'])
                {
                    $conditions['User.mail']=$this->request->data['User']['mail'];
                }
                if ($this->request->data['User']['country'])
                {
                    $conditions['User.country']=$this->request->data['User']['country'];
                }
                if ($this->request->data['User']['created'])
                {
                    $conditions['User.created >=']=date("Y/m/d H:i:s", strtotime($this->request->data['User']['created']));
                }
                $this->set('AllUsers',$this->Paginator->paginate('User',array($conditions)));                 
            }
            else
            {
                $this->set('AllUsers',$this->Paginator->paginate('User')); 
            }
        }
        else
        {
            $this->redirect('/users/logout');
        } 
    }
    
    private function Presence_member($param)
    {
        $condition=array();
        if ($param == 1)
        {
             $condition['DATE(User.last_connection) = ']=date('Y-m-d');
            return $condition;
        }
        if ($param == 2)
        {
             $condition['DATE(User.last_connection) = ']=date('Y-m-d', strtotime('-1 day'));   
             return $condition;
        }
        if ($param == 3)
        {
             $condition['DATE(User.last_connection) >= ']=date('Y-m-d', strtotime('-7 day'));   
             return $condition;
        }
        if ($param == 4)
        {
             $condition['DATE(User.last_connection) >= ']=date('Y-m-d', strtotime('-30 day')); 
             return $condition;
        }
        if ($param == 5)
        {
             $condition['DATE(User.last_connection) >= ']=date('Y-m-d', strtotime('-365 day'));
             return $condition;
        }
    }
    
    public function add()
    {//admin
        if ($this->Session->read('Auth.User.role_id')==1)
        {
            if ($this->request->is('post'))
            { 
                $this->request->data['User']['role_id']=3;
                $this->request->data['User']['pass']= AuthComponent::password($this->request->data['User']['pass']);
                if ($this->User->save($this->request->data))
                {
                   unset($this->request->data); 
                }
                $this->redirect('/users/members_management');
            }
            
        }
        else
        {
            $this->redirect('/users/logout'); 
        }
    }
    
    public function prices()
    {//user
        $this->loadModel('Service');
        $this->set('prices',$this->Service->find('all',
                array(
                    'fields'=>array('Type.name','Service.name','Service.price','Service.lowest_quantity','Service.largest_quantity','Service.description'),
'conditions'=>array('Service.active'=>'1')
                )));
    }
    
    public function update_state()
    {//admin
        if ($this->Session->read('Auth.User.role_id')==1)
        {
            if ($this->request->is('post'))
            {
                if ($this->request->data['User']['active']==0)
                {
                    $this->User->updateAll(
                            array('User.active'=>0),
                            array('User.id'=>$this->request->data['User']['id']));
                }
                if ($this->request->data['User']['active']==1)
                {
                    $this->User->updateAll(
                            array('User.active'=>1),
                            array('User.id'=>$this->request->data['User']['id']));
                }
            }
            unset($this->request->data);
            $this->redirect('/users/members_management');
        }
        else
        {
            $this->redirect('/users/logout');
        } 
    }
    
    
    public function profile_user() 
    {
        if ($this->Session->read('Auth.User.role_id')==3)
        {
            $t=$this->User->find('all',
                    array(
                        'conditions'=>array('User.id'=>  $this->Session->read('Auth.User.id'))
                ));
            $this->set('profile_user',$t );
            if ($this->request->is('post'))
            {
                if ($this->request->data['User']['mail'])
                {
                    $this->User->updateAll(
                            array('User.mail'=>'\''.$this->request->data['User']['mail'].'\''),
                            array('User.id'=>  $this->Session->read('Auth.User.id')));
                    $this->Session->setFlash('تم التحديث','alert_success');
                }
                if ($this->request->data['User']['mail_paypal'])
                {
                   $this->User->updateAll(
                            array('User.mail_paypal'=>'\''.$this->request->data['User']['mail_paypal'].'\''),
                            array('User.id'=>  $this->Session->read('Auth.User.id'))); 
                   $this->Session->setFlash('تم التحديث','alert_success');
                }
                if ($this->request->data['User']['old_pass'])
                {
                    if (AuthComponent::password($this->request->data['User']['old_pass'])==$t[0]['User']['pass'])
                    {
                        $this->User->updateAll(
                            array('User.pass'=>'\''.AuthComponent::password($this->request->data['User']['pass1']).'\''),
                            array('User.id'=>  $this->Session->read('Auth.User.id')));
                        $this->Session->setFlash('تم التحديث','alert_success');
                    }
                    else
                    {
                        $this->Session->setFlash(' تفقد كلمة السر','alert_warning');
                    }
                }
            }
        }
        else
        {
            $this->redirect('/users/logout');
        }
    }
    
    public function profile_admin() 
    {
        if ($this->Session->read('Auth.User.role_id')==1)
        {
            $this->loadModel('Paypal');
            $this->set('paypal',$this->Paypal->find('first'));
            $t=$this->User->find('all',
                    array(
                        'conditions'=>array('User.id'=>  $this->Session->read('Auth.User.id'))
                ));
            $this->set('profile_user',$t );
            if ($this->request->is('post'))
            {
                if ($this->request->data['User']['mail']!='')
                {
                    $this->User->updateAll(
                            array('User.mail'=>'\''.$this->request->data['User']['mail'].'\''),
                            array('User.id'=>  $this->Session->read('Auth.User.id')));
                    $this->Session->setFlash('تم التحديث','alert_success');
                }
                if ($this->request->data['User']['old_pass'])
                {
                    if (AuthComponent::password($this->request->data['User']['old_pass'])==$t[0]['User']['pass'])
                    {
                        $this->User->updateAll(
                            array('User.pass'=>'\''.AuthComponent::password($this->request->data['User']['pass1']).'\''),
                            array('User.id'=>  $this->Session->read('Auth.User.id')));
                             $this->Session->setFlash('تم التحديث','alert_success');
                    }
                    else
                    {
                        $this->Session->setFlash(' تفقد كلمة السر','alert_warning');
                    }
                }
            }
            unset($this->request->data);
        }
        else
        {
            $this->redirect('/users/logout');
        }
    }
    
    public function profile_suppervisor()
    {
         if ($this->Session->read('Auth.User.role_id')==2)
        {
            $t=$this->User->find('all',
                    array(
                        'conditions'=>array('User.id'=>  $this->Session->read('Auth.User.id'))
                ));
            $this->set('profile_user',$t );
            if ($this->request->is('post'))
            {
                if ($this->request->data['User']['mail'])
                {
                    $this->User->updateAll(
                            array('User.mail'=>'\''.$this->request->data['User']['mail'].'\''),
                            array('User.id'=>  $this->Session->read('Auth.User.id')));
                    $this->Session->setFlash('تم التحديث','alert_success');
                }
                
                if ($this->request->data['User']['old_pass'])
                {
                    if (AuthComponent::password($this->request->data['User']['old_pass'])==$t[0]['User']['pass'])
                    {
                        $this->User->updateAll(
                            array('User.pass'=>'\''.AuthComponent::password($this->request->data['User']['pass1']).'\''),
                            array('User.id'=>  $this->Session->read('Auth.User.id')));
                        $this->Session->setFlash('تم التحديث','alert_success');
                    }
                    else
                    {
                        $this->Session->setFlash(' تفقد كلمة السر','alert_warning');
                    }
                }
            }
        }
        else
        {
            $this->redirect('/users/logout');
        }
    }
    
    public function update_reduction()
    {
        if ($this->Session->read('Auth.User.role_id')==1)
        {
            if ($this->request->is('post'))
            {
if(isset($this->request->data['User']['reduction']) && $this->request->data['User']['reduction'])
{
                $this->User->updateAll(
                        array('User.reduction'=>$this->request->data['User']['reduction']),
                        array('User.id'=>$this->request->data['User']['id'])
                        ); 
                unset($this->request->data);
                $this->Session->setFlash('تمالعملية بنجاح','alert_success');
                $this->setAction('members_management');
}
else{
 $this->Session->setFlash('أدخل قيمة التخفيظ','alert_warning');
 return $this->redirect('/users/members_management');
}
            }
                $this->setAction('members_management');
        }
        else
        {
            $this->redirect('/users/logout');
        }
    }
    
    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('register');
    }
}	