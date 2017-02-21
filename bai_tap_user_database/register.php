<?php
    require './libs/database.php';
    //kiem tra submit
    if (!empty($_POST['add_user'])) {
        //lay du lieu
        $data['first_name']    = isset($_POST['first_name']) ? $_POST['first_name'] : '';
        $data['last_name']     = isset($_POST['last_name']) ? $_POST['last_name'] : '';
        $data['phone']         = isset($_POST['phone']) ? $_POST['phone'] : '';
        $data['email']         = isset($_POST['email']) ? $_POST['email'] : '';
        $data['username']      = isset($_POST['username']) ? $_POST['username'] : '';
        $data['password']      = isset($_POST['password']) ? md5($_POST['password']) : '';
     
     //validate dl
     $errors = array();
     if (empty($data['first_name'])) {
         $errors['first_name'] = "chưa nhập first_name";
     }
     if (empty($data['last_name'])) {
         $errors['last_name'] = 'chưa nhập last_name';
     }
     if (empty($data['phone'])) {
         $errors['phone'] = 'chưa nhập SĐT';
     }
     if (empty($data['email'])) {
         $errors['email'] = 'chưa nhập email';
     }
     if (empty($data['username'])) {
         $errors['username'] = 'chưa nhập username';
     }
     if (empty($data['password'])) {
         $errors['password'] = 'chưa nhập password';
     }
     if (!empty($data['username'] && !empty($data['username']))) {
         check_user($data['username'],$data['username']);
     }
   
     if (!$errors) {
         add_user($data['first_name'],$data['last_name'],$data['phone'], $data['email'],$data['username'], $data['password'] );
         //trở về trang index.php
         header("location: login.php");
     }
}

disconnect_db();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <!-- Bootstrap -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/css/style1.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
            <div class="container">
            <div class="row main">
                <div class="panel-heading">
                   <div class="panel-title text-center">
                        <h1 class="title">Register user</h1>
                        <hr />
                    </div>
                </div> 
                <div class="main-login main-center">
                    <form class="form-horizontal" method="post" action="register.php">
                        
                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">First name</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="first_name" id="name"  placeholder="Enter First Name" value="<?php echo !empty($data['first_name']) ? $data['first_name'] : ''; ?>"/>
                                     
                                </div>
                                <?php if (!empty($errors['first_name'])) echo  $errors['first_name']; ?>
                            </div>
                            <label for="name" class="cols-sm-2 control-label">Last name</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="last_name" id="name"  placeholder="Enter Last Name" value="<?php echo !empty($data['last_name']) ? $data['last_name'] : ''; ?>"/>
                             </div>
                             <?php if (!empty($errors['last_name'])) echo  $errors['last_name']; ?>
                            </div>

                        
                        <label for="phone" class="cols-sm-2 control-label">Phone</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="phone" id="phone"  placeholder="Enter Nember phone" value="<?php echo !empty($data['phone']) ? $data['phone'] : ''; ?>"/>
                                    
                                </div>
                                 <?php if (!empty($errors['lphone'])) echo  $errors['phone']; ?>
                            </div>
                            <label for="email" class="cols-sm-2 control-label">Your Email</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email" value="<?php echo !empty($data['email']) ? $data['email'] : ''; ?>" />
                                      
                                </div>
                                <?php if (!empty($errors['email'])) echo $errors['email']; ?>
                            </div>
                            
                            <label for="username" class="cols-sm-2 control-label">Username</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username" value="<?php echo !empty($data['username']) ? $data['username'] : ''; ?>" />
                                   
                                </div>
                                 <?php if (!empty($errors['username'])) echo $errors['username']; ?>
                            </div>
                            <label for="password" class="cols-sm-2 control-label">Password</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password" value="<?php echo !empty($data['password']) ? md5($data['password']) : ''; ?>"/>
                                     
                                </div>
                                <?php if (!empty($errors['password'])) echo $errors['password']; ?>
                            </div>
                       

                      
                            <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <input name="add_user" type="submit" class="btn btn-primary btn-lg btn-block login-button" value="register"></input>
                        </div>
                        <div class="login-register">
                            <a href="login.php">Login</a>
                         </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="public/js/bootstrap.js"></script>
    </body>
</html>