<?php
class User extends AppModel
{
public $validate = array(
    'mail' => array(
        'rule' => array('email'),
        'allowEmpty' => false,
        'message'    => 'تفقد الايميل'
        ),
    'pass' => array(
        'rule' => array('alphaNumeric'),
        'allowEmpty' => false,
        'message'    => 'تفقد كلمة السر'
        ),
    'Pseudo' => array(
        'rule' => array('alphaNumeric'),
        'allowEmpty' => false,
        'message'    => 'تفقد الاسم'
        ),
    'tel' => array(
        'rule' => array('alphaNumeric'), 
        'allowEmpty' => false,
        'message'    => 'تفقد الهاثف'
        )
);


}