<?php
class MessagesController extends AppController
{
    public function index($param = null)
    {//user
        if ($this->Session->read('Auth.User.role_id')==3)
        {
            $this->loadModel('Ticket');
             $UserID=$this->Ticket->find('all',array(
             	'conditions' => array('Ticket.id' => $param ),
    		'fields' => array('Ticket.user_id'),
             ));
             if	($UserID[0]['Ticket']['user_id'] == $this->Session->read('Auth.User.id')){
	            $this->Ticket->updateAll(
	                    array('Ticket.seenU'=>1),
	                    array('Ticket.id'=>$param));
	            
	            $this->Message->updateAll(
	                    array('Message.seen'=>1),
	                    array('Message.ticket_id'=>$param));
	            $this->set('AllMessages',$this->Message->find('all',array(
	                'conditions'=>array(
	                    'Ticket.id'=>$param)
	            )));
            }
            else{
            $this->redirect('/Tickets/index/');
            }
        }
        else
        {
            $this->redirect('/users/logout');
        }
    }
    public function add()
    { //user
        if ($this->Session->read('Auth.User.role_id')==3 || $this->Session->read('Auth.User.role_id')==1 || $this->Session->read('Auth.User.role_id')==2 )
        {
            if ($this->request->is('post'))
            {
                $data=array();
                if ($this->request->data['Message']['content'])
                {
                    $data['Message']['content']  =$this->request->data['Message']['content'];
                    $data['Message']['user_id']  =  $this->Session->read('Auth.User.id');
                    $data['Message']['ticket_id']=$this->request->data['Message']['ticket_id'];
                    $this->Message->create();
                    if ($this->Message->save($data))
                    {
                        $this->loadModel('Ticket');
                        $this->Ticket->updateAll(
                        array('Ticket.seen'=>0,'Ticket.statu_id'=>1),
                        array('Ticket.id'=>$data['Message']['ticket_id']));
                        unset($this->request->data);
                        $this->redirect('/messages/index/'.$data['Message']['ticket_id']);
                    }
                }
                else
                {
                    $this->Session->setFlash('تأكد من محتوى الرسالة','alert_warning'); 
                    unset($this->request->data);
                    $this->redirect('/messages/index/'.$data['Message']['ticket_id']);
                }
            }
        }
        else
        {
            $this->redirect('/users/logout');
        }
    }

    public function index_admin($param = null)
    {//admin
        if ($this->Session->read('Auth.User.role_id')==1)
        {
            $this->loadModel('Ticket');
            $this->Ticket->updateAll(
                    array('Ticket.seen'=>1),
                    array('Ticket.id'=>$param));
            $this->set('AllMessages',$this->Message->find('all',array(
                'conditions'=>array(
                    'Ticket.id'=>$param)
            )));
 
        }
        else
        {
            $this->redirect('/users/logout');
        }
    }
    public function add_admin()
    { //admin
        if ($this->Session->read('Auth.User.role_id')==1 )
        {
            if ($this->request->is('post'))
            {
                $data=array();
                if ($this->request->data['Message']['content'])
                {
                    
                    $data['Message']['content']  =$this->request->data['Message']['content'];
                    $data['Message']['user_id']  =  $this->Session->read('Auth.User.id');
                    $data['Message']['ticket_id']=$this->request->data['Message']['ticket_id'];
                    $this->Message->create();
                    if ($this->Message->save($data))
                    {
                        $this->loadModel('Ticket');
                        if ($this->request->data['Message']['statu_id']) {
                            $this->Ticket->updateAll(
                            array('Ticket.seenU'=>0,'Ticket.statu_id'=>$this->request->data['Message']['statu_id']),
                            array('Ticket.id'=>$data['Message']['ticket_id']));
                            //debug($this->request->data['Message']['statu_id']);die();
                        }  
                        else {
                             $this->Ticket->updateAll(
                            array('Ticket.seenU'=>0),
                            array('Ticket.id'=>$data['Message']['ticket_id']));   
                        }
                        unset($this->request->data);
                        $this->redirect('/messages/index_admin/'.$data['Message']['ticket_id']);
                    }
                }
                else
                {
                    $this->Session->setFlash('تأكد من محتوى الرسالة','alert_warning'); 
                    unset($this->request->data);
                    // $this->redirect('/messages/index_admin/'.$data['Message']['ticket_id']);
                }
            }
        }
        else
        {
            $this->redirect('/users/logout');
        }
    }
}