<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Bootstrap Core CSS -->
    <link href="public1/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="public1/vendor/bootstrap/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
         .error {color: #FF0000;}
      </style>

</head>

<body id="page-top">
	 
	<div class = "container">
		<legend><h1><center>Registration</center></h1></legend>
		 <div class="col-xs-6 col-md-4"></div>
		 <div class = "row">
			<form class="col-md-4" action="register.php" method = "post" id = "myform">
				<div class="form-group">
					<label for="exampleInputEmail1">Full Name</label>
					<input type="name" class="form-control"  value = "" placeholder="Name" name="name" id = "name">
					 
					<p for="exampleInputEmail1" class="text-danger"></p> 
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Birth Day</label>
					<input type="date" class="form-control"  value = "" placeholder="Birth Day" name="birth" id = "birth">
					<p for="exampleInputEmail1" class="text-danger"></p> 
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Genders</label>
					<div class="radio">
						<label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="Nam" checked>
                            Male                     
                        </label>
                    </div>
                    <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="Nữ">
                        Female              
                        </label>
                    </div>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Phone</label>
					<input type="text" class="form-control" placeholder="Phone" name="phone" id = "phone">
					<p for="exampleInputEmail1" class="text-danger"></p> 
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control"  value = "" placeholder="Email" name="email" id = "email">
					<p for="exampleInputEmail1" class="text-danger"></p>
				</div>
				
				
				<button type="submit" name="btn" class="btn btn-default">Register</button>
			</form>
			 <div class="col-xs-6 col-md-4"></div>
		</div>
	</div>
    <!-- jQuery -->
    <script src="public1/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="public1/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="public1/vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="public1/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="public1/js/creative.min.js"></script>
	<script src="public1/js/jquery-1.11.1.min.js"></script>
	<script src="public1/js/jquery.validate.min.js"></script>
	<script src="public1/js/additional-methods.min.js"></script>
	
	
	<script type="text/javascript">

	$(document).ready(function() {

		$("#myform").validate({
			rules: {
				birth:{
					required: true
				},
				phone:{
					required: true
				},
				email: {
					required: true
				},
				name:{
					required: true
				}
			}
		});
	});
	</script>
</body>

</html>
