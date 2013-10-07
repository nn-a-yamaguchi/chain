<?php
define ('ROOT_DIR', realpath( dirname(__FILE__)) . '/');

require_once ROOT_DIR.'lib/config.php';

$_CdUserCard = new CdUserCard();

$_CdUserCard->where(array('userid' => 5, 'name' => 'test'))->find();