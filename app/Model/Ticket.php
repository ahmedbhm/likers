<?php
class Ticket extends AppModel
{
        public $belongsTo = array('Statu' => array(
                                'className' => 'Statu',
                                'foreignKey' => 'statu_id'),
                            'User' => array(
                                                'className' => 'User',
                                                'foreignKey' => 'user_id')
            );

}