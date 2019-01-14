<?php 

include_once "./includes/config.inc.php";

(new Auth())->auth_page();



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

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top" >

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index-2.html">plogg</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></div>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">


      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ben Mabrouk Mohamed <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

          <a class="dropdown-item" href="logout" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index-2.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>PHP Exercise</span>
        </a>
      </li>



    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Enter the exercise parameters</a>
          </li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-2 col-sm-6 mb-3">
           <div class="form-label-group">
            <input type="number" min='0' value="0" max='100' id="baseline" class="form-control" placeholder="Baseline" required="required" autofocus="autofocus">
            <label for="baseline">Baseline</label>
          </div>
        </div>
        <div class="col-xl-2 col-sm-6 mb-3">
          <div class="form-label-group">
            <input type="number" id="total" min="0" value="0" class="form-control" placeholder="Total" required="required" autofocus="autofocus">
            <label for="total">Total</label>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="form-label-group">
            <input type="date" id="start_date" data-date-format="YYYY-MM-DD" class="form-control" placeholder="Start date" required="required" autofocus="autofocus">
            <label for="start_date">Start date</label>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="form-label-group">
            <input type="date" id="end_date" class="form-control" placeholder="End date" required="required" autofocus="autofocus">
            <label for="end_date">End date</label>
          </div>
        </div>
        <div class="col-xl-2 col-sm-6 mb-3">
          <div class="form-label-group">
            <button class="btn btn-primary btn-block" onclick="getResult();">Get Result</button>             
          </div>
        </div>
      </div>

      <!-- Area Chart Example-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-dollar-sign"></i>
        Result</div>
        <div class="card-body">
         <div id="exercie-result">

         </div>

       </div>
     </div>

     <!-- DataTables Example -->


   </div>
   <!-- /.container-fluid -->

   <!-- Sticky Footer -->
   <footer class="sticky-footer">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright © Ben Mabrouk Mohamed 2019</span>
      </div>
    </div>
  </footer>

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="logout">Logout</a>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="js/demo/datatables-demo.js"></script>


<script type="text/javascript">
 function getResult(){

  var baseline = $( "#baseline" ).val();
  var total = $( "#total" ).val();
  var start_date = $( "#start_date" ).val();
  var end_date = $( "#end_date" ).val();

  var data = "baseline="+baseline+"&total="+total+"&start_date="+start_date+"&end_date="+end_date;
  $( "#exercie-result" ).html();
  jQuery.ajax({
    url: "get-result.php",
    type: "POST",
    data: data,
    success: function(response)
    {
      var responce = JSON.parse(response);
      if(responce.status == "success"){

        var htmlArray="Array(<br>";
        jQuery.each(responce.result, function(i, val) {
          htmlArray += "&nbsp;["+i+"]=>"+val+",<br/>";
        });
        htmlArray+=")";
        $('#exercie-result').html(htmlArray);


      }else{


        var div_alert = ' <div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" ria-hidden="true">×</button>';
        div_alert += responce.result;
        div_alert += ' </div>';
        $( "#exercie-result" ).html(div_alert);

      }

    }
  });
}
</script>


</body>


</html>
