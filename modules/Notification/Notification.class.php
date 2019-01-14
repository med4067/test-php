<?php
class Notif {
	
	function add_notif($notif) {
		$_SESSION['notif']=$notif;
	}
	
	function show_notif() {
		$result="";
		if(isset($_SESSION['notif'])){
			$last_notif=$_SESSION['notif'];
			$type=$last_notif['type'];
			
			$result='<div style="  opacity: 1;  padding: 8px;    margin-bottom: 7px;"class="alert alert-block alert-'.$type.' fade in"><button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button><h4 style="font-weight: 500;" class="alert-heading">'.$last_notif['value'].'</h4></div>';
			
			unset($_SESSION['notif']);
		}
		return $result;
	}
	
}				