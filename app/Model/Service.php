<?php
class Service extends AppModel
{
        public $belongsTo = array('Type' );
        public $hasMany=array('Order'=> array(
                            'className' => 'Order',
                            'foreignKey' => 'id_service_order' )
            );
//        public $validate = array(
//                'name' => array(
//                    'rule' => array('alphaNumeric'),
//                    'allowEmpty' => false,
//                    'message'    => 'تفقد اسم الخدمة'
//                    ),
//                'price' => array(
//                    'rule' => array('numeric'),
//                    'allowEmpty' => false,
//                    'message'    => 'تفقد الثمن '
//                    ),
//                'lowest_quantity' => array(
//                    'rule' => array('numeric'),
//                    'allowEmpty' => false,
//                    'message'    => 'تفقد العدد '
//                    ),
//                'largest_quantity' => array(
//                    'rule' => array('numeric'),
//                    'allowEmpty' => false,
//                    'message'    => 'تفقد العدد '
//                    ),
//            'description' => array(
//                    'rule' => array('alphaNumeric'),
//                    'allowEmpty' => true,
//                    'message'    => 'تفقد العدد '
//                    )
//                );
        
}