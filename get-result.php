<?php 

include_once "./includes/config.inc.php";

(new Auth())->auth_page();



if($_POST)
{
  $baseline=$_POST['baseline'];
  $total=$_POST['total'];
  $start_date=$_POST['start_date'];
  $end_date=$_POST['end_date'];

  if ( (!(new ValidateInput())->verifyNumber($baseline, "=", 0)) 
  ||(!(new ValidateInput())->verifyNumber($baseline, "<", 0)) 
  ||(!(new ValidateInput())->verifyNumber($baseline, ">", 100)) 
   ) {
    $json["status"] = "error";$json["result"] = "Invalid baseline";
    print_r(json_encode($json));exit;
  }

  if ( (!(new ValidateInput())->verifyNumber($total, "=", 0)) 
  ||(!(new ValidateInput())->verifyNumber($total, "<", 0))  ) {
    $json["status"] = "error";$json["result"] = "Invalid total";
    print_r(json_encode($json));exit;
  }

  if(!(new ValidateInput())->verifyDate($start_date)) {
    $json["status"] = "error";$json["result"] = "Invalid start date";
    print_r(json_encode($json));exit;
  }
  if(!(new ValidateInput())->verifyDate($end_date)) {
    $json["status"] = "error";$json["result"] = "Invalid end date";
    print_r(json_encode($json));exit;
  }
  
if($start_date>$end_date){
   $json["status"] = "error";$json["result"] = "Date range invalid";
    print_r(json_encode($json));exit;
}

  $Exercice = new Exercice($start_date, $end_date, $total, $baseline);

  $json["status"] = "success";
  $json["result"] = $Exercice->distributeTotalAmount();

  print_r(json_encode($json));
  exit;
}else{

  $json["status"] = "error";$json["result"] = "Access denied";
  print_r(json_encode($json));exit;

  
}
?>  