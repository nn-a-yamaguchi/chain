<?php

class CdUserCard extends ChainModel {
    public $belongs_to = array(
        'users' => array(
            'foreign_key' => array(
                'userid' => 'userid'
            )
        )
    );
}