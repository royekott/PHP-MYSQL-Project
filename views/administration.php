<!-- Administration main page -->

<?php

require_once("header.php");
?>

<div class="container" id="switch-container">
<!-- Background rotation -->
        <div id="mainRow">
            <img class="canvas" src="../root/book1.jpeg">
            <img class="canvas" src="../root/book2.jpg">
            <img class="canvas" src="../root/book3.jpg">
            <img class="canvas" src="../root/book4.jpg">
            <img class="canvas" src="../root/book5.jpg">
             <div class="row">
            
                 <div class="col-sm-offset-1 col-md-2 col-sm-3 col-xs-4" id="administrators">
                     
                     <div class="topContent">
                        <h3>Administrators </h3>
                        <button type="button" class="btn btn-default btn-sm plus-btn" id="add-administrator">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                         <hr>
                    </div>
                     
<!-- Build administrations menu (left side) -->
            <?php
                $sql = "SELECT * FROM administrator";
                $result = $conn->query($sql);
                $administrator = $result->fetchAll();
                for($i = 0 ; $i<count($administrator) ; $i++){
                    $administrator_name = $administrator[$i]["name"]; //name
                    $administrator_phone = $administrator[$i]["phone"]; //phone 
                    $administrator_role = $administrator[$i]["role"]; //role
                    $administrator_id = $administrator[$i]["id"]; //id
                    $administrator_email = $administrator[$i]["email"]; //email
                        echo "<div class='all-administrators' id='$administrator_id'>".
                                "<ul>".
                                    "<li>";
// Display menu by pernissions follow the administrator role.
                            if($administrator_role == 'sales'){
                                echo "<img src='../root/sales.png' class='admin-avatar'>";
                            }
                            elseif($administrator_role == 'manager'){
                                echo "<img src='../root/manager.png' class='admin-avatar'>";
                            }
                            elseif($administrator_role == 'owner'){
                                echo "<img src='../root/owner.png' class='admin-avatar'>";
                            }
                    
                                echo    "<h4 class='administrator-name'>Name: $administrator_name</h4>".
                                        "<h4 class='administrator-phone'> Phone: $administrator_phone</h4>".
                                        "<h4 class='administrator-role'> Role: $administrator_role</h4>".
                                        "<h4 class='administrator-email'>Email: $administrator_email</h4>".
                                    "</li>".
                                "</ul>".
                            "</div>";
                    }
                ?>
                 </div>
                    <!-- When clicking on administrator/add -->
            <div class="col-sm-offset-1 col-md-5 col-sm-6 col-xs-7" id="admin-container"></div>
        </div>
    </div>
</div>

<?php 
require_once("footer.php");
?>
