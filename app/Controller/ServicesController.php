<?php
class ServicesController extends AppController
{
        public $components = array('Paginator');
        public $paginate = array(
        'limit' => 1,
        'order' => array(
            'Service.id' => 'desc')
    );
        
        public function services_management() 
    {//admin
            if ($this->Session->read('Auth.User.role_id')==1)
            {
                $this->Paginator->settings=  $this->paginate;
                $this->loadModel('Type');
                $this->loadModel('Service');
                $this->Paginator->settings = array(
                'limit' => 2,
                'Service' => array(
                    'Service.id' => 'desc')
                );
                //récupération des Services
                $this->set('AllServices',$this->Paginator->paginate('Service'));
                // rmplisage du <select> Type service
                $this->set('ServiceTypes',$this->Type->find('all',
                array(
                    'fields'=>array('Type.id','Type.name'))));
        }
        else
        {
                $this->redirect('/users/logout');        
        }
    }
    
    public function add_service()
    {
        if ($this->Session->read('Auth.User.role_id')==1)
        {
            if ($this->request->is('post'))
            {
//                                debug($this->request->data);die();
//                $data=array(
//                    'Service.name'=> $this->request->data['Service']['name'],
//                    'Service.price'=> $this->request->data['Service']['price'],
//                    'Service.lowest_quantity'=> $this->request->data['Service']['lowest_quantity'],
//                    'largest_quantity'=> $this->request->data['Service']['largest_quantity'],
//                    'Service.description'=> $this->request->data['Service']['description'],
//                    'Service.type_id'=> $this->request->data['Service']['type_id']
//                );
                //$this->loadModel('Service');
                //$this->Service->create();
                if ($this->Service->save($this->request->data))
                {
                    unset($this->request->data);
                    $this->setAction('services_management');   
                }
                else
                {
                    $this->Session->setFlash('حدث خطأ !!!','alert_warning'); 
                    $this->setAction('services_management');   
                }
            }
         }
        else
        {
                $this->redirect('/users/logout');        
        }
    }

    public function update()
    {
        if ($this->Session->read('Auth.User.role_id')==1)
        {
            if ($this->request->is('post'))
            {
                $data=array();
                if ($this->request->data['Service']['name'])
                {
                    $data['Service.name']='\''.$this->request->data['Service']['name'].'\'';
                }
                if (isset($this->request->data['Service']['type_id']) && $this->request->data['Service']['type_id'])
                {
                    $data['Service.type_id']=$this->request->data['Service']['type_id'];
                }
                if ($this->request->data['Service']['price'])
                {
                    $data['Service.price']=$this->request->data['Service']['price'];
                }
                if ($this->request->data['Service']['lowest_quantity'])
                {
                    $data['Service.lowest_quantity']=$this->request->data['Service']['lowest_quantity'];
                }
                if ($this->request->data['Service']['largest_quantity'])
                {
                    $data['Service.largest_quantity']=$this->request->data['Service']['largest_quantity'];
                }
                if ($this->request->data['Service']['description'])
                {
                    $data['Service.description']='\''.$this->request->data['Service']['description'].'\'';
                }
                
                $this->Service->updateAll(
                        $data,
                        array('Service.id'=>  $this->request->data['Service']['id'])
                        );
                        unset($this->request->data);
                        $this->setAction('services_management');
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
                if ($this->request->data['Service']['active']==0)
                {
                    $this->Service->updateAll(
                            array('Service.active'=>0),
                            array('Service.id'=>$this->request->data['Service']['id']));
                }
                if ($this->request->data['Service']['active']==1)
                {
                    $this->Service->updateAll(
                            array('Service.active'=>1),
                            array('Service.id'=>$this->request->data['Service']['id']));
                }
            }
            unset($this->request->data);
            $this->redirect('/Services/services_management');
        }
       else
        {
            $this->redirect('/users/logout');        
        }
    }
    
}