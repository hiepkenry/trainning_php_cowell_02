<?php
require './libs/database.php';
$user = get_all_user();
disconnect_db();
//session_start();
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['username'])) {
     header('Location:login.php');}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>danh sách sinh viên</title>

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
        <h1><center>Danh sách sinh viên </center></h1>
         <br/> <br/>
        <div class="container">
        <table class="table table-bordered" width="100%" border="1" cellspacing="0" cellpadding="10">
            <thead>
              <tr>
                <th>STT</th>
                <th>First_name</th>
                <th>Last_name</th>
                <th>Phone </th>
                <th>email</th>
                <th>username</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($user as $item){ ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['first_name']; ?></td>
                <td><?php echo $item['last_name']; ?></td>
                <td><?php echo $item['phone']; ?></td>
                <td><?php echo $item['email']; ?></td>
                <td><?php echo $item['username']; ?></td>
                
                <td>
                    <form method="post" action="delete.php">
                        <input onclick="window.location = 'edit_user.php?id=<?php echo $item['id']; ?>'" type="button" value="Sửa"/>
                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>"/>
                        <input onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Xóa"/>
                    </form>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
        
        </div>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="public/js/bootstrap.min.js"></script>
    </body>
</html>