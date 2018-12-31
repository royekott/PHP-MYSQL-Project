<?php

$sql = "SELECT * FROM `administrator`";
$result = $conn->query($sql);
$admin = $result->fetchAll(); 

session_start();
 //Check validations for passing login page.

 if(isset($_POST["submit"])){ 
     for( $i = 0 ; $i < count($admin); $i++){         
            if($_POST["uname"]==$admin[$i]["name"] && $_POST["psw"]==$admin[$i]["password"]){
                $_SESSION["uname"] = $_POST["uname"];
                $_SESSION["psw"] = $_POST["psw"];
                $_SESSION['isLogged'] = true;
                header("Location:main.php");
                exit;
            }
    }   
    header("Location:login.php");
 }


 



?>
