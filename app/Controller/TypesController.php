<?php
class TypesController extends AppController
{
    public function services_categories()
    {//admin
        if ($this->Session->read('Auth.User.role_id')==1)
        {
            $this->set('AllTypes',$this->Type->find('all'));
        }
        else
        {
            return $this->redirect(
                array('controller' => 'Users', 'action' => 'logout'));    
        }
    }

    public function add()
    {//admin
        if ($this->Session->read('Auth.User.role_id')==1)
        {
            if ($this->request->is('post'))
            {
            // upload de l'image
            $name='';
                $extension=  strtolower(pathinfo($this->request->data['Type']['url_icon_file']['name'],
                                        PATHINFO_EXTENSION ));
                if ($this->request->data['Type']['url_icon_file']['tmp_name'])
                {
                    move_uploaded_file(
                            $this->request->data['Type']['url_icon_file']['tmp_name'], 
                            IMAGES .'types_icon'.DS.$this->request->data['Type']['name'].'.'.$extension ); 
                }
                if($this->request->data['Type']['name']!='')
                {
                $name=$this->request->data['Type']['name'];
                }
                $data=array(
                    'name'=>$name,
                    'active'=>1,
                    'url_icon'=>$this->request->data['Type']['name'].'.'.$extension
                );
                $this->Type->create();
                if ($this->Type->save($data))
                {
                    $this->setAction('services_categories');
                }
                else
                {
                    $this->Session->setFlash('حدث خطأ !!!','alert_warning');
                    $this->setAction('services_categories');
                }
            }
        }
        else
        {
            return $this->redirect(
                array('controller' => 'Users', 'action' => 'logout'));    
        }
    }    
    
    public function update_state()
    {
        //admin
        if ($this->Session->read('Auth.User.role_id')==1)
        {
            if ($this->request->is('post'))
            {
                $this->loadModel('Service');
                if ($this->request->data['Type']['active'] == 0)
                {
                    $this->Type->updateAll(
                            array('Type.active'=>0),
                            array('Type.id'=>$this->request->data['Type']['id'])
                            );
                    $this->Service->updateAll(
                            array('Service.active'=>0),
                            array('Service.type_id'=>$this->request->data['Type']['id'])
                            );
                            $this->redirect('/Types/services_categories');
                }
                if ($this->request->data['Type']['active'] == 1)
                {
                 $this->Type->updateAll(
                            array('Type.active'=>1),
                            array('Type.id'=>$this->request->data['Type']['id'])
                            );
                    $this->Service->updateAll(
                            array('Service.active'=>1),
                            array('Service.type_id'=>$this->request->data['Type']['id'])
                            );   
                    $this->redirect('/Types/services_categories');
                }
            }
            
        }  
        else
        {
            return $this->redirect(array('controller' => 'Users', 'action' => 'logout'));    
        }
        
    }
}
