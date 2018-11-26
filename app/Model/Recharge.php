<?php
class Recharge extends AppModel
{
        public $belongsTo = array(
            'Way' => array(
                                'className' => 'Way',
                                'foreignKey' => 'way_id' ),
            'User' => array(
                                'className' => 'User',
                                'foreignKey' => 'user_id' )
            );
                public $validate = array(
                        'transaction_id' => array(
                            'rule' => array('alphaNumeric'),
                            'allowEmpty' => false,
                            'message'    => 'تفقد  كود الكاشيو'
                            ),
                        'amount' => array(
                            'rule' => array('numeric'),
                            'allowEmpty' => false,
                            'message'    => 'تفقد مبلغ الشحن '
                            )
                        );

}