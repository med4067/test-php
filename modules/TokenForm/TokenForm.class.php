<?php
	class TokenForm {
		
		function get_token_acces() {
			$token=md5($this->generateRandomString(20));
			$_SESSION['form_token'] =$token;
			return $token;
		}
	
		
		function generateRandomString($length = 10) {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}
		
	}	