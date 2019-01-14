<?php
session_start();
setlocale(LC_TIME, 'fr_US.utf8','fra'); 

$ConfigDefault = array('filedefnum'=>10);

 	// include common file
include_once 'modules/TokenForm/TokenForm.class.php';
include_once 'modules/ValidateInput/ValidateInput.class.php';
include_once 'modules/Notification/Notification.class.php';
include_once 'modules/Exercice/Exercice.class.php';
include_once "modules/Auth/Auth.class.php";







