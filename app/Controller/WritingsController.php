<?php
class WritingsController extends AppController
{
	private $SafetyKey='30993c32e3f0880e586a2116686d8975d26afadc';

    public function usage_instructions()
    {//admin
        if ($this->Session->read('Auth.User.role_id')==1)
        {
            $this->set('UsageInstructions',$this->Writing->find('all',array('conditions'=>array('Writing.id'=>1))));
            if ($this->request->is('post'))
            {
                $this->Writing->updateAll(
                        array('Writing.contents'=>'\''.$this->request->data['Writing']['contents'].'\''),
                        array('Writing.id'=>1)
                        );
                unset($this->request->data);
                return $this->redirect(
                array('controller' => 'Writings', 'action' => 'usage_instructions'));

            }
        }
        else
        {
            return $this->redirect(
                array('controller' => 'Users', 'action' => 'logout'));
        }
    }
    
    public function frequently_questions()
    {
        if ($this->Session->read('Auth.User.role_id')== 1)
        {       
            $this->set('FrequentlyQuestions',$this->Writing->find('all',array('conditions'=>array('Writing.id'=>2))));
            if ($this->request->is('post'))
            {
                $this->Writing->updateAll(
                        array('Writing.contents'=>'\''.$this->request->data['Writing']['contents'].'\''),
                        array('Writing.id'=>2)
                        );
                unset($this->request->data);
                return $this->redirect(
                array('controller' => 'Writings', 'action' => 'frequently_questions'));
            }
        }
        else
        {
            return $this->redirect(
                array('controller' => 'Users', 'action' => 'logout'));
        }
    }
    
    public function view_i() 
    {
        $this->set('UsageInstructions',$this->Writing->find('all',array('conditions'=>array('Writing.id'=>1))));     
    }
    
    public function view_q()
    {
        $this->set('FrequentlyQuestions',$this->Writing->find('all',array('conditions'=>array('Writing.id'=>2))));
    }
    
    public function beforeFilter()
    {
        parent::beforeFilter();
    }

}