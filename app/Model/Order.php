<?php
class Order extends AppModel
{
        public $belongsTo = array('Service' => array(
                                'className' => 'Service',
                                'foreignKey' => 'id_service_order' ),
                            'State' => array(
                                'className' => 'State',
                                'foreignKey' => 'id_state' ),
                            'User' => array(
                                'className' => 'User',
                                'foreignKey' => 'id_user' )
            );
        public $validate = array(
                        'id_service_order' => array(
                            'rule' => array('numeric'),
                            'allowEmpty' => false,
                            'message'    => 'تفقد الخدمة'
                            ),
//                        'url' => array(
//                            'rule' => array('alphaNumeric'),
//                            'allowEmpty' => false,
//                            'message'    => 'تفقد كلمة السر'
//                            ),
                        'quantity' => array(
                            'rule' => array('numeric'),
                            'allowEmpty' => false,
                            'message'    => 'تفقد العدد المطلوب'
                            ),
                        'url' => array(
                           'rule' => 'url',
                           'message' => 'تفقد '
                           )
                        );

}
