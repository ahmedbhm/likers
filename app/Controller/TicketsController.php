<?php
class TicketsController extends AppController
{
    
    public $components = array('Paginator');
    public $paginate = array(
        'limit' => 10,
        'order' =>['Ticket.id desc']
    );

    public function index()
    {//user
        $this->Paginator->settings = $this->paginate;
        $this->Paginator->settings = array('order'=>array('Ticket.seen' => 'asc','Ticket.modified' => 'desc'));
        if ($this->Session->read('Auth.User.role_id')==3)
        {
            if (isset($this->request->data['Ticket']['statu_id']) && $this->request->data['Ticket']['statu_id'])
            {
                $this->set('AllTickets',$this->Paginator->paginate('Ticket',
                    array(
                            'Ticket.user_id'=>  $this->Session->read('Auth.User.id'),
                            'Ticket.statu_id'=>  $this->request->data['Ticket']['statu_id']
                        )
                    ));
            }
            else
            {
                $this->set('AllTickets',$this->Paginator->paginate('Ticket',
                    array(
                            'Ticket.user_id'=>  $this->Session->read('Auth.User.id')
                        )
                    ));
            }
        }
        else
        {
            $this->redirect('/users/logout');
        }
        
    }
    
    public function index_admin()
    {
        //admin
     $this->Paginator->settings = $this->paginate;
     $this->Paginator->settings = array('order'=>array('Ticket.seen' => 'asc','Ticket.modified' => 'desc'));
        if ($this->Session->read('Auth.User.role_id')==1 || $this->Session->read('Auth.User.role_id')==2)
        {
            if ($this->request->is('post'))
            {
                $conditions=array();
                if ($this->request->data['Ticket']['statu_id'])
                {
                    $conditions['Ticket.statu_id']=$this->request->data['Ticket']['statu_id'];
                }
                if ($this->request->data['Ticket']['user_id'])
                {
                    $conditions['Ticket.user_id']=$this->request->data['Ticket']['user_id'];
                }
                if ($this->request->data['Ticket']['created'])
                {
                    $conditions['Ticket.created >=']=date("Y/m/d H:i:s", strtotime($this->request->data['Ticket']['created']));
                }
                
                
                $this->set('AllTickets',$this->Paginator->paginate('Ticket',$conditions));
            }
            else
            {
              // $this->Paginator->settings = array('order'=>array('Ticket.id' => 'desc'));
              $this->set('AllTickets',$this->Paginator->paginate('Ticket'));
            }
        }
        else
        {
            $this->redirect('/users/logout');
        }
    }

    public function add()
    {
       if ($this->Session->read('Auth.User.role_id')==3)
        {
            if ($this->request->is('post'))
            {
                $this->loadModel('Message');
                $this->request->data['Ticket']['user_id']=  $this->Session->read('Auth.User.id');
                if ($this->Ticket->save($this->request->data))
                {
                    $mmesage=array();
                    $mmesage['Message']['content']=  $this->request->data['Message']['content'];
                    $mmesage['Message']['user_id']=  $this->Session->read('Auth.User.id');
                    $mmesage['Message']['ticket_id']=  $this->Ticket->getInsertId();
                    $mmesage['Message']['seen']= 1;
                    if ($this->Message->save($mmesage))
                    {
                        
                    }
                    $this->Session->setFlash('تمت العملية بنجاح','alert_success');
                    unset($this->request->data);
                    $this->setAction('index');
                }
            }
        }
        else
        {
            $this->redirect('/users/logout');
        } 
    }
    
    public function ticket_noSeen()
    {//user
        $this->set('ticket_noSeen',$this->Ticket->find('count',
                array(
                    'conditions'=>array('Ticket.seen'=>0)
                )));
        if(isset($this->params['requested'])) 
            { //s’il s’agit de l’appel pour l’élément
                    $ticket_noSeen = $this->Ticket->find('count',
                array(
                    'conditions'=>array('Ticket.seen'=>0)
                ));
                return $ticket_noSeen;
            }
    }
        
    public function ticket_noSeenU()
    {//user
        $this->set('ticket_noSeen',$this->Ticket->find('count',
                array(
                    'conditions'=>array('Ticket.seenU'=>0)
                )));
        if(isset($this->params['requested'])) 
            { //s’il s’agit de l’appel pour l’élément
                $ticket_noSeen = $this->Ticket->find('count',
                array(
                    'conditions'=>array('Ticket.seenU'=>0)
                ));
                return $ticket_noSeen;
            }
    }
    
    public function update_statu() 
    {
        if ($this->request->is('post')) 
        {
            $this->Ticket->updateAll(
                                ['Ticket.statu_id'=> $this->request->data['Ticket']['statu_id']],
                                ['Ticket.id'=> $this->request->data['Ticket']['id']]); 
                        return $this->redirect('/Tickets/index_admin/');
        }    
    }
}
