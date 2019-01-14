<?php 
  include_once "./includes/config.inc.php";
    
  
  $auth=new Auth();
  $auth->redirect_if_is_connected();
  $auth->login();
  $token=(new TokenForm())->get_token_acces();
  

?>
<!DOCTYPE html>
<html lang="en">

  
 <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Test PHP - Ben Mabrouk Mohamed</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
  <p><?php echo (new Notif())->show_notif();?></p>
                        <form action="" method="post" class="top15">
          <input type="hidden" name="action_form" value="login">
          <input type="hidden" name="form_token" value="<?php echo $token;?>">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="البريد الإلكتروني" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="كلمه المرور" name="password" type="password" value="">
                                </div>
                         
                    <button class="btn btn-lg btn-success btn-block"  type="submit"> Login </button>
                            </fieldset>
                        </form>
          <div class="text-center">
           </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>


 </html>
