<!-- Header page -->

<!DOCTYPE html>
<html>
<!-- Require files -->
    <?php
        require("../controllers/connections.php");
        require("../controllers/functions.php");
        if(!$_SESSION['isLogged']) {    // If user not logged in, send user to login page.
            header("location:login.php"); 
            die();
        }
     ?>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> The School </title>
<!-- Css links -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="styles.css" type="text/css">
<!-- Js links -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>        
    </head>

    <body>
    
<!-- Navigation bar -->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                 <div class="navbar-header">
<!-- Navigation bar small screen -->
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                  </button>
                  <a class="navbar-brand" href="#"><img src="../root/Capture1.PNG"  class="header_logo"></a>
                </div>
<!-- Navigation bar content -->                
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">

<!-- Check 'role' variable and display accourding to premissions -->                         
                         <?php
                        function checkRole($role2){
                        if($role2 !== "sales" ): ?>
                        <li class="admin"><a href="administration.php">Administration</a></li>
                            <?php endif; }?>
                        <li class="school"><a href="main.php">School</a></li>
                        
                        <li class="login_name">
                            <a href="#">
                            <?php
                            $sql = "SELECT * FROM administrator";
                            $result = $conn->query($sql); 
                            $admin = $result->fetchAll();

                            for( $i = 0 ; $i < count($admin); $i++){ 
                                if( $admin[$i]["name"] == $_SESSION["uname"]){
                                    $GLOBALS["role"] = $admin[$i]["role"];
                                }
                            }
                                $the_user = $_SESSION["uname"];
                                echo  $the_user . ", " . $role ;
                                checkRole($role);
                            ?>
                            </a>
                        </li>
                        <li><a href="logout.php" id="logout-btn">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
 <!-- Send data to display role in administrators menu + details -->        
        <script>
            var the_role = "<?php echo $role; ?>";
            $.ajax({
                type: "POST",
                url: "../controllers/js.js",
                data: the_role
            })

        </script>
        <script src="../controllers/js.js"></script>
