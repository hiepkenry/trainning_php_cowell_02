<?php
//session_start();
//khai báo biến toàn cục
global $conn;
// function connect database
function connect_db()
{
    global $conn;
    //check connect to database
    if (!$conn) {
        $conn = mysqli_connect('localhost','root','','users') or die('khong the ket noi toi database');
        mysqli_set_charset($conn,'utf8');
    }
}
//function disconnect to database
function disconnect_db()
{
    global $conn;
    //check connect to database
    if ($conn) {
        mysqli_close($conn);
    }
}
//ham lay tat ca users
function get_all_user()
{
    global $conn;
    connect_db();
    //thuc hien truy van
    $sql = "select * from users";
    $query = mysqli_query($conn, $sql);
    $result = array();
    if ($query) {
        while ($row = mysqli_fetch_assoc($query) ) {
            $result[] = $row;
        }
    }
    return $result;


}
// lay user theo ID
function get_user($id)
{
    global $conn;
    connect_db();
    $sql = "select * from users where id = {$id}";
    $query = mysqli_query($conn, $sql);
    $resutl = array();
    //neu co kq thi dua vao $result
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        return $row;
    }
    return $result;
}
//ham them user
function add_user($first_name,$last_name,$phone, $email, $username, $password )
{
    global $conn;
    connect_db();
    $first_name = addslashes($first_name);
    $last_name  = addslashes($last_name);
    $phone      = addslashes($phone);
    $email      = addslashes($email);
    $username   = addslashes($username);
    $password   = addslashes($password);
    $sql = "INSERT INTO users(first_name, last_name, phone, email, username, password) VALUES ('$first_name','$last_name','$phone','$email','$username','$password') ";
    $query = mysqli_query($conn, $sql);
    return $query;
}
// ham sua user
function edit_user($id_user,$first_name,$last_name,$phone, $email, $username, $password ){
    global $conn;
    connect_db();
    $first_name = addslashes($first_name);
    $last_name = addslashes($last_name);
    $phone     = addslashes($phone);
    $email      = addslashes($email);
    $username   = addslashes($username);
    $password   = addslashes($password);
    // truy van dl
    $sql = "UPDATE users SET  
            first_name = '$first_name',
            last_name = '$last_name',
            phone      = '$phone',
            email      = '$email',
            username   = '$username',
            password   = '$password'
            where id   = $id_user
             ";
    $query = mysqli_query($conn, $sql);
    return $query;

}
//ham xoa user
function delete_user($id_user){
    global $conn;
    connect_db();
    $sql = "DELETE FROM users WHERE id = $id_user ";
    $query = mysqli_query($conn, $sql);
    return $query;
}
function check_user($username,$password){
    global $conn;
    connect_db();
    // Kiểm tra username hoặc password có bị trùng hay không
     $sql = "SELECT * FROM users WHERE username = '$username' OR password = '$password'";
      
    // Thực thi câu truy vấn
    $result = mysqli_query($conn, $sql);
      
    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
    if (mysqli_num_rows($result) > 0)
    {
        // Sử dụng javascript để thông báo
        echo '<script language="javascript">alert("username hoặc password đã tồn tại"); window.location="register.php";</script>';
          
        // Dừng chương trình
        die ();
    }
     
}
//kiểm tra login
function check_login($username, $password){
    global $conn;
    connect_db();
        $sql = "select * from users where username = '$username' and password = '$password' ";
            $query = mysqli_query($conn, $sql);
            $num_rows = mysqli_num_rows($query);
            if ($num_rows==0) {
                echo "tên đăng nhập hoặc mật khẩu không đúng !";
}else{
                //tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
                $_SESSION['username'] = $username;
                // Thực thi hành động sau khi lưu thông tin vào session
                
                header('Location: index.php');
            }

}
?>