<?php
class CouponsController extends AppController 
{

    public function index()
    {
      if ($this->Session->read('Auth.User.role_id')==1) 
        {
          $this->set('AllCoupon',  $this->Coupon->find('all'));
        }
        else {
            return $this->redirect('/users/logout');
        }  
    }

     public function add() 
    {
        if ($this->Session->read('Auth.User.role_id')==1) 
        {
            if ($this->request->is('post'))
            {
                if ($this->request->data('Coupon.code')!='' && $this->request->data('Coupon.price')!='') {
                  
                    if ($this->Coupon->save($this->request->data)) {
                        $this->Session->setFlash('لقد تمت العملية بنجاح','alert_success'); 
                    return $this->redirect('/Coupons/index');
                    }
                    else {
                        $this->Session->setFlash('حدث خطأ أتناء التسجيل','alert_warning'); 
                    return $this->redirect('/Coupons/index');
                    }
                }  else {
                    $this->Session->setFlash('تفقد المعلومات','alert_warning'); 
                    return $this->redirect('/Coupons/index');
                }
            }
        }
        else {
            return $this->redirect('/users/logout');
        }
    }
   
}