<?php
class State extends AppModel
{
    public $hasMany = array('Order'=> array(
                            'className' => 'Order',
                            'foreignKey' => 'id_service_order' ));

}
