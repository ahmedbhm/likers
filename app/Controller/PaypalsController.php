<?php

class PaypalsController extends AppController 
{
    public function update() 
    {
        if ($this->Session->read('Auth.User.role_id')== 1) 
        {
            if ($this->request->is('post')) 
            {
                $this->Paypal->updateAll(
                        [
                            'Paypal.user'=> '\''. $this->request->data['Paypal']['user'].'\'',
                            'Paypal.pass'=> '\''. $this->request->data['Paypal']['pass'].'\'',
                            'Paypal.signature'=> '\''.$this->request->data['Paypal']['signature'].'\''
                        ],
                        ['Paypal.id'=>1]
                        );
                        $this->set('تم التحديث بنجاح');
                        return $this->redirect('/users/profile_admin');
            }
        }
        else 
        {
            return $this->redirect('/users/logout');
        }
    }
}