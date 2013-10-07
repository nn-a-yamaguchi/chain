<?php
define ('ROOT_DIR', realpath( dirname(__FILE__)) . '/');

require_once ROOT_DIR.'lib/config.php';

$_CdUserCard = new CdUserCard();

$_CdUserCard->not()->where(array('userid' => 5, 'name' => 'test'))->where(array('delete_flg' => 1))->find();