<?php
class Auth {

	function get_id_current_user(){
		if(isset($_SESSION['User'])){
			return $_SESSION['User']['id'];
		}
	}

	function auth_page() {

		if(!isset($_SESSION['User']['usename'])) {
			$_SESSION['notification'] = array('type'=>'error','msg'=>'Authentification requise');
			$this->redirect('login.php');
		}

		if(isset($_SESSION['Time'])) {

			$period = 120*120;
			if( time() - $_SESSION['Time'] >= $period ) {
				unset($_SESSION['User']);
				$_SESSION['notification'] = array('type'=>'error','msg'=>"Votre session a expiré S'il vous plaît veuillez vous connecter à nouveau.");
				$this->redirect('login.php');
			}else{
				
				$_SESSION['Time']=time();
			}
		}
		return TRUE;
	}


	function logout() {
		unset($_SESSION['User']);
		$this->redirect('login.php');
	}

	function login()
	{
		
		if((isset($_POST['action_form'])) && ($_POST['action_form'] == "login") ) 
		{  
			if((isset($_POST['form_token'])) && ($_POST['form_token'] ==  $_SESSION['form_token']) ){ 
				if(!($this->check_user($_POST['username'],$_POST['password']))) {
					$error = 'Invalid authentication';
					(new Notif())->add_notif(array('type'=> "danger",'value'=> $error));

				}else{
					$this->redirect('index.php');
				}
			}
		}	
	}	

	function redirect($url, $permanent = false) {
		if($permanent) {
			header('HTTP/1.1 301 Moved Permanently');
		}
		header('Location: '.$url);
		exit();
	}

	function redirect_if_is_connected(){
		if(isset($_SESSION['User']['usename'])){

			$this->redirect('index.php');
		}
	}

	function check_user($usename, $password) {

		if( ($usename =="test") && ($password == "php"))
		{
			$user['usename'] = "test_php";
			$user['firstname'] = "Exercice PHP";
			$_SESSION['User'] = $user;
			$_SESSION['Time'] = time();
			return TRUE;
		}
	}

}						