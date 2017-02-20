<?php
         // define variables and set to empty values
         $nameErr = $emailErr = $sexErr = $birthErr = $phoneErr = "";
         $name = $birth = $sex = $phone = $email = "";

        function input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
         session_start();
         if(isset($_POST['btn'])){
            if (empty($_POST["name"])) {
               $nameErr = "Name is required"; 
            }else {
               $name = input($_POST["name"]);
            }
            
            if (empty($_POST["email"])) {
               $emailErr = "Email is required";
            }else {
               $email = input($_POST["email"]);
               
               // check if e-mail address is well-formed
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format"; 
               }
            }
            
            if (empty($_POST["phone"])) {
               $phoneErr = "phone is required";
            }
            else {
               $phone = input($_POST["phone"]);
            }
            
            if (empty($_POST["birth"])) {
               $birth = "birth is required";
            }else {
               $birth = input($_POST["birth"]);
            }
            
            if (empty($_POST["optionsRadios"])) {
               $sexErr = "Gender is required";
            }else {
               $sex = input($_POST["optionsRadios"]);
            }
         //ghi dữ liệu vào file

		$list = array($name, $sex, $birth, $phone, $email );
 		$arr=array();
 		$row=1;
 	      if (($handle = fopen("file.csv", "r")) !== FALSE) {
 			while (($data= fgetcsv($handle, 100,",")) !== FALSE){ 
 				array_push($arr, $data);
 				$row++;
 			}
 			array_push($arr, $list);
 			$fp = fopen('file.csv', 'w');
 			foreach ($arr as $fields) {
 				fputcsv($fp, $fields);
 			}
 
 			fclose($fp);
            }
        }
        
    		header('Location: index.php');
		
	
?>

	