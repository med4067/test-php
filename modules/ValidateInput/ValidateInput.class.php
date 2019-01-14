<?php

class ValidateInput {

	public function verifyNumber($val, $operator="", $valCompar=""){
		if(!is_numeric($val)){
			return false;
		}
		if(($this->num_cond($val, $operator, $valCompar))){
			return false;
		}

		return true;
	}	
	public function verifyDate($val){
		if(!$this->validateDate($val)){
			return false;
		}
		return true;
	}
	function num_cond ($var1, $op, $var2) {

		if($op==""){
			return true;
		}
		switch ($op) {
			case "=":  return $var1 == $var2;
			case "!=": return $var1 != $var2;
			case ">=": return $var1 >= $var2;
			case "<=": return $var1 <= $var2;
			case ">":  return $var1 >  $var2;
			case "<":  return $var1 <  $var2;
			default:       return true;
		}   
		 return true;
	}

	function validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}
}					