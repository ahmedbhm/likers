<?php
class ParametersController extends AppController
{

    public function index()
    {//admin
        if ($this->Session->read('Auth.User.role_id')==1)
        {
            $this->set('AllParameters',$this->Parameter->find('first'));
            $this->loadModel('User');
            $this->set('AllSupervisor',$this->User->find('all',array(
                'conditions'=>array('User.role_id'=>2),
                'order'=>array('User.created DESC')
            )));
        }
        else
        {
            $this->redirect('/users/logout');    
        }
    }
    public function add_supervisor()
    {//admin
        if ($this->Session->read('Auth.User.role_id')==1)
        {
            if ($this->request->is('post'))
            {
                $this->loadModel('User');
                $data['User']['Pseudo']=$this->request->data['Parameter']['Pseudo'];
                $data['User']['mail']=$this->request->data['Parameter']['mail'];
                $data['User']['pass']=AuthComponent::password($this->request->data['Parameter']['pass']);
                $data['User']['country']=$this->request->data['Parameter']['country'];
                $data['User']['tel']=$this->request->data['Parameter']['tel'];
                $data['User']['role_id']=2;
                if ($this->User->save($data)) 
                {
                    unset($this->request->data);
                    $this->setAction('index');
                }
                else
                {
                    unset($this->request->data);
                    $this->Session->setFlash('حدث خطأ !!!!','alert_warning');
                    $this->setAction('index');
                }
            }
        }
        else
        {
            $this->redirect('/users/logout');    
        }
    }
    
    public function delet_user()
    {
     if ($this->Session->read('Auth.User.role_id')==1)
        {   
            if ($this->request->is('post'))
            {
                $this->loadModel('User');
                $this->User->delete($this->request->data['Parameters']['id']);
                unset($this->request->data);
                $this->setAction('index');
            }
        }
        else
        {
            $this->redirect('/users/logout');    
        }
    }
    
    public function param()
    {
     if ($this->Session->read('Auth.User.role_id')==1)
        {   
            if ($this->request->is('post'))
            {
                $this->Parameter->updateAll(
                        array(
                            'Parameter.lowest_amount_charging'=>  $this->request->data['Parameter']['lowest_amount_charging'],
                            'Parameter.free_amount'=>  $this->request->data['Parameter']['free_amount'],
                            'Parameter.when_charging'=> $this->request->data['Parameter']['when_charging']
                        ),
                        array('Parameter.id'=>1)
                        );
                unset($this->request->data);
                $this->Session->setFlash('تم التحديث بنجاح','alert_success');
            }
        }
        else
        {
            $this->redirect('/users/logout');    
        }
        $this->setAction('index');
    }
}