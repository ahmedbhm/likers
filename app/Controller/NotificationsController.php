<?php
class NotificationsController extends AppController
{
public $components = array('Paginator');
    public $paginate = array(
        'limit' => 5,
        'order' => array(
            'Notification.created' => 'desc')
    );
    
     public function getToken() {
    $string = "";
    $chaine = "AZERTYUIOPMLKJHGFDSQWXCVBN1234567890";
    srand((double)microtime()*1000000);
    for($i=0; $i<6; $i++) 
    {
    $string .= $chaine[rand()%strlen($chaine)];
    }

    return $string;
}

    public function get_pwd() {
        if ($this->request->is('post')) 
        {
            if ($this->request->data['User']['mail']!='') {
                $var=  $this->getToken();
                $this->loadModel('User');
                $this->User->updateAll(
                        ['User.pass'=>'\''.AuthComponent::password($var).'\''],
                        ['User.mail'=>  $this->request->data['User']['mail']]);
                    App::uses('CakeEmail', 'Network/Email');
                    $email=new CakeEmail('gmail');                    $email->to($this->request->data['User']['mail']);
                    $email->subject('إشعار بتغيير الرقم السري ');
                    $url= Router::url('/users/login',TRUE);
                    $email->viewVars(array('url'=>$url,'pwd'=>$var));
                    $email->template('getToken');
                    $email->send();  
                    //debug($var);die();
                        $this->Session->setFlash('تمت العملية بنجاح','alert_success');
                        return $this->redirect('/users/logout');
                
            }  else {
                
                $this->Session->setFlash('المرجو تفقدالايميل ','alert_warning');
                return $this->redirect('/users/logout');        
            }
        }
        
    }
    
    public function index()
    {
//die('notife is here probléme 1212ERE');
    $this->Paginator->settings = $this->paginate;
        if ($this->Session->read('Auth.User.role_id')==3)
        {
//die('hello');
            $this->Notification->updateAll(array('Notification.seen'=>1),['Notification.user_id'=>$this->Session->read('Auth.User.id')]);
            $test='\''.$this->Session->read('Auth.User.id').'/\'';
            //$this->Notification->updateAll(array('Notification.seen_all'=>'Notification.seen_all +'.$test),
            //['Notification.user_id'=>NULL]);
            $this->Notification->query("UPDATE notifications set seen_all=concat(seen_all,".$test.") where user_id=0 ;");
            $this->set('AllNotif',$this->Paginator->paginate('Notification',array(
                'OR'=>array('Notification.is_all'=>1,'Notification.user_id'=>  $this->Session->read('Auth.User.id'))             
                    )));

        }
        else
        {
 return $this->redirect(array('controller' => 'users', 'action' => 'logout'));
        }
    }
    
    public function count_notif()
    {
        $this->set('count',(int)$this->Notification->find('count',array(
                'conditions'=>array(
                    'Notification.user_id'=>  $this->Session->read('Auth.User.id')
                    )))+(int)$this->Notification->find('count',array(
                'conditions'=>array(
                    'Notification.is_all'=>1,
                    'Notification.seen_all NOT LIKE'=>'%/'.$this->Session->read('Auth.User.role_id').'/%'
                    ))));
        if(isset($this->params['requested'])) 
            { //s’il s’agit de l’appel pour l’élément
                $count = (int)$this->Notification->find('count',array(
                'conditions'=>array(
                    'Notification.user_id'=>  $this->Session->read('Auth.User.id'),
                    'Notification.seen'=>0
                    )))+(int)$this->Notification->find('count',array(
                'conditions'=>array(
                    'Notification.is_all'=>1,
                    'Notification.seen_all NOT LIKE'=>'%/'.$this->Session->read('Auth.User.id').'/%'
                    )));
                return $count;
            }
    }
       
    public function add()
    {//admin
        if ($this->Session->read('Auth.User.role_id')==1)
        {
            if ($this->request->is('post'))
            {
                if ($this->request->data['Notification']['user_id'])
                {
                    $this->loadModel('User');
                    $mailUser=  $this->User->find('first',array(
                        'conditions'=>array('User.id'=>$this->request->data['Notification']['user_id'])
                    ));
                    $data=array();
                    $data['Notification']['content']=$this->request->data['Notification']['content'];
                    $data['Notification']['is_all']=0;
                    $data['Notification']['seen_all']='/';
                    $data['Notification']['user_id']=$this->request->data['Notification']['user_id'];
                    $this->Notification->create();
                    if ($this->Notification->save($data))
                    {
                     App::uses('CakeEmail', 'Network/Email');
                    $email=new CakeEmail('gmail');
//                    var_dump($email);
//                                        die();
                    $email->to($mailUser['User']['mail']);
                    $email->subject('لديك تنبيه جديد ');
                    $url= Router::url('/Notifications/index',TRUE);
                    $email->viewVars(array('url'=>$url));
                    $email->template('notifications');
                    $email->send();   
                        unset($this->request->data);
                        $this->Session->setFlash('تمت العملية بنجاح','alert_success');
                        $this->redirect('/users/members_management');
                    }
                }
               else
                {
                    $data=array();
                    $data['Notification']['content']=$this->request->data['Notification']['content'];
                    $data['Notification']['is_all']=1;
                    $data['Notification']['user_id']=0;
                    $this->Notification->create();
                    if ($this->Notification->save($data))
                    {
                        unset($this->request->data);
                        $this->Session->setFlash('تمت العملية بنجاح','alert_success');
                        $this->redirect('/users/members_management');
                    }
                }
            }
        }
        else
        {
            $this->redirect('/users/logout');
        }
    }

        public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('index','get_pwd','getToken','add');
    }
}