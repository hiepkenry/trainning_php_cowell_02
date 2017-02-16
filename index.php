<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Pagination</title>

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
    <h2 class="title">list_persion</h2>
    <div class="container">
        <table class="table table-bordered">
            <thead>
              <tr>
                
                <th>Họ và Tên</th>
                <th>Ngày Sinh</th>
                <th>Giới tính</th>
                <th>Số điện thoại</th>
                <th>email</th>
            </tr>
        </thead>
        <tbody>
         <?php
         $list=array();
         $row = 1;
         if (($handle = fopen("list_persion.csv", "r")) !== FALSE) {
            while (($data= fgetcsv($handle, 100,",")) !== FALSE){ 
             array_push($list, $data);
             $row++;
         }
         fclose($handle);
     }

     $limit = 6;
     $total_rows = count($list);    //tông số record
     $pages = ceil($total_rows / $limit);   //tính tổng số trang
     $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
     $current_page = ($total_rows > 0) ? min($pages, $current_page) : 1;
     $start = ($current_page -1 ) * $limit;

     $slice = array_slice($list, $start, $limit);
     foreach ($slice as $val) {

         ?>
         <tr>

             <td><?php echo $val[0]; ?></td>
             <td><?php echo $val[1]; ?></td>
             <td><?php echo $val[2]; ?></td>
             <td><?php echo $val[3]; ?></td>
             <td><?php echo $val[4]; ?></td>

         </tr>
         <?php
     }
     ?>
 </tbody>
</table>
<nav aria-label="Page navigation">
    
        <ul class="pagination">
        <?php 
            if ($current_page > 1) {
                ?>
                <li><a href="http://localhost:8080/trainning_php_cowell_02/index.php?page=<?php echo ($current_page-1); ?>">&laquo;</a></li>
                <?php
            }
            ?>
            <?php 
                for ($i=0; $i < $pages; $i++) { 
            ?>
                <li><a href="http://localhost:8080/trainning_php_cowell_02/index.php?page=<?php echo ($i+1); ?>">
                <?php echo ($i+1); ?></a></li>
             <?php }
             if($current_page<$pages)
             {
            ?>
                <li><a href="http://localhost:8080/trainning_php_cowell_02/index.php?page=<?php echo  ($current_page+1);  ?>">&raquo;</a></li>

                <?php } ?>
            </ul>
        

    </div>
</nav>
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="public/js/bootstrap.min.js"></script>
</body>
</html>