<?php
 
require './libs/database.php';
 
// Lấy thông tin hiển thị lên để người dùng sửa
$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
if ($id){
    $data = get_user($id);
}
 
// Nếu không có dữ liệu tức không tìm thấy sinh viên cần sửa
if (!$data){
   header("location: index.php");
}
 
// Nếu người dùng submit form
if (!empty($_POST['edit_user']))
{ //lay du lieu
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
     if (!$errors) {
         edit_user($data['id'],$data['first_name'],$data['last_name'],$data['phone'], $data['email'],$data['username'], $data['password'] );
         //trở về trang index.php
         header("location: index.php");
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
        <style type="text/css">
            .errors{
                color: red;
            }
        </style>
    </head>
    <body>
        <h1>EDIT_USER</h1>
        <a href="index.php">Trở về</a> <br/> <br/>
        <form method="post" action="edit_user.php?id=<?php echo $data['id']; ?>">
            <table width="50%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>FirstName</td>
                    <td>
                        <input type="text" name="first_name" placeholder="first_name" value="<?php echo !empty($data['first_name']) ? $data['first_name'] : ''; ?>"/>
                        <?php if (!empty($errors['first_name'])) echo $errors['first_name']; ?>
                    </td>
                </tr>
                <tr>
                    <td>LastName</td>
                   <td>
                        <input type="text" name="last_name" placeholder="last_name" value="<?php echo !empty($data['last_name']) ? $data['last_name'] : ''; ?>"/>
                        <?php if (!empty($errors['last_name'])) echo $errors['last_name']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>
                        <input type="text" name="phone" placeholder="phone" value="<?php echo !empty($data['phone']) ? $data['phone'] : ''; ?>"/>
                        <?php if (!empty($errors['phone'])) echo $errors['phone']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" name="email" placeholder="Email" value="<?php echo !empty($data['email']) ? $data['email'] : ''; ?>"/>
                        <?php if (!empty($errors['email'])) echo $errors['email']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" placeholder="username" value="<?php echo !empty($data['username']) ? $data['username'] : ''; ?>"/>
                        <?php if (!empty($errors['username'])) echo $errors['username']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" placeholder="password" value="<?php echo !empty($data['password']) ? md5($data['password']) : ''; ?>"/>
                        <?php if (!empty($errors['password'])) echo $errors['password']; ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>"/>
                        <input type="submit" name="edit_user" value="update"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>