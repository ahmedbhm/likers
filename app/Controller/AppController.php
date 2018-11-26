<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {
         public $components = array('RequestHandler','Session', 'Cookie', 'Auth'
            => array(
                'authenticate' => array(
                    'Form' => array(
                        'fields' => array('username' => 'mail','password'=>'pass')
                    )
                )
            )
        );
     public function beforeFilter()
     {
         parent::beforeFilter();   
     }
     public function beforeRender()
     {
              ### UPDATE LAST VISIT ###
        $online_offline_status = 0;
        if ($this->Session->check('Auth.User.id'))
            {
         //Checking for the SESSION - Proceed only if MEMBERUSER is logged in.
            $this->loadModel('User');  //Loading MEMBER Model
            
            // UPDATE MEMBER VISIT TIME
            

             //GET TIME DIFFERENCE
            $member_last_visit = $this->User->find('first', array('conditions' => 
               array('User.id' => $this->Session->read('Auth.User.id'))));
            //CURRENT TIME
            $current_time = strtotime(date('Y-m-d H:i:s'));  
            $last_visit = strtotime($member_last_visit['User']['last_connection']);  //LAST VISITED TIME
            
            $time_period = round(abs($current_time - $last_visit)/60,2); //CALCULATING MINUTES
            //IF YOU WANT TO CALCULATE DAYS THEN USER THIS
            //$time_period = floor(round(abs($current_time - $last_visit)/60,2)/1440);
            
            //echo $time_period;
            if ($time_period >= 10)
                {
                    $last_visit = date('Y-m-d H:i:s', time());
                    $this->User->updateAll(
                            array('User.last_connection' => '\''.$last_visit.'\''), 
                                    array('User.id' => $this->Session->read('Auth.User.id'))
                            );
                }
        }    
        
    }//end beforeRender() ;
    
}
