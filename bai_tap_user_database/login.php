<?php
session_start();
?>
<html>
<head>
	<title>Trang đăng nhập</title>
	<meta charset="utf-8">
</head>
<body>
<?php
	//Gọi file connection.php ở bài trước
	require_once("libs/database.php");
	// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
	if (isset($_POST["btn_submit"])) {
		// lấy thông tin người dùng
		$username = $_POST["username"];
		$password = md5($_POST["password"]);
		//chống lại tấn công theo phương thức sql injection
	
		$username = addslashes($username);
		$password = addslashes($password);
		if ($username == "" || $password =="") {
			echo "username hoặc password bạn không được để trống!";
		}else{
			
			check_login($username,$password);
		}
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Bootstrap -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
  <form method="POST" action="login.php">
   <div class="container">
        <div class="card card-container">
            
            <img id="profile-img" class="profile-img-card" src="public/image/avatar.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name="username" class="form-control" placeholder="username" required autofocus>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button name="btn_submit" class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Đăng nhập</button>
            </form><!-- /form -->
            <button name="" class="btn btn-lg btn-primary btn-block btn-signin" type="submit"><a class="link" href="register.php">Đăng ký</a></button>
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
  </form>
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/js.js"></script>
  </body>
</html>