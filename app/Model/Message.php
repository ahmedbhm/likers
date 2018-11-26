<?php
class Message extends AppModel
{
        public $belongsTo = array('Ticket' => array(
                                'className' => 'Ticket',
                                'foreignKey' => 'ticket_id'));
}