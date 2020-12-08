<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perpus-Line</title>
     <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url().'assets/vendor/jquery/jquery.min.js' ?>"></script>
    <script src="<?php echo base_url().'assets/vendor/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url().'assets/vendor/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url().'assets/vendor/fontawesome-free/css/all.min.css' ?>" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url().'assets/css/sb-admin.css' ?>" rel="stylesheet">

  </head>
</head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login Perpus-Line</div>
        <div class="card-body">
		
		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan']=="gagal"){
				echo "<div class='alert alert-danger alert-danger'>";
				echo $this->session->flashdata('alert');
				echo "</div>";
			} else if($_GET['pesan']=='logout'){
				if($this->session->flashdata())
				{
					echo "<div class='alert alert-danger alert-success'>";
					echo $this->session->flashdata('anda telah logout');
					echo "</div>";
				}
			}else if($_GET['pesan']=='belum login' ){
				if($this->session->flashdata())
				{
					echo "<div class='alert alert-danger alert-primary'>";
					echo $this->session->flashdata('alert');
					echo "</div>";
				}
			}
		}else{
			if($this->session->flashdata())
				{
					echo "<div class='alert alert-danger alert-message'>";
					echo $this->session->flashdata('alert');
					echo "</div>";
				}
		}

		 ?>
		<div class="panel panel-default">
			<div class="panel-body">
				<br>
				<form method="post" action="<?php echo base_url().'welcome/login' ?>">
					<div class="form-group">
						<input type="text" name="admin_username" placeholder="Username" class="form-control">
						<?php echo form_error('username'); ?>
			</div>
			<div class="form-group">
						<input type="password" name="admin_password" placeholder="Password" class="form-control">
						<?php echo form_error('password'); ?>
			</div>
			<div class="form-group">
				<input type="submit" value="login" class="btn btn-primary btn-block">
			</div>
		</form>
			<br>
		</div>
	</div>
</div>
	</div>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url().'assets/vendor/jquery-easing/jquery.easing.min.js' ?>"></script>
</body>
</html>