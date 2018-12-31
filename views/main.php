<!-- Main school page -->

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
                
            <div class="col-md-2 col-sm-2 col-xs-3" id="students">
                <div class="topContent">
                    <h3>Students </h3>
                    <button type="button" class="btn btn-default btn-sm plus-btn" id="add-student">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>
                    <hr>
                </div>
<!-- Build students menu (left side page) -->                
            <?php
                $sql = "SELECT * FROM student";
                $result = $conn->query($sql);
                $students = $result->fetchAll();
                for($i = 0 ; $i<count($students) ; $i++){
                    $student_name = $students[$i]["name"];
                    $student_phone = $students[$i]["phone"];
                    $student_img = $students[$i]["image"];
                    $student_id = $students[$i]["id"];
                        echo "<div class='all-students' id='$student_id'>".
                                "<ul>".
                                    "<li>".
                                        "<img src='$student_img' class='student-img'>".
                                            "<h4 class='student-name'>Name: $student_name</h4>".
                                            "<h4 class='student-phone'> Phone: $student_phone</h4>".
                                    "</li>".
                                "</ul>".
                            "</div>";
                }
            ?>
            </div>
                <div class="col-sm-1-offset col-md-2 col-sm-2 col-xs-3" id="courses">
                    <div class="topContent">
                        <h3>Courses </h3>
                        <button type="button" class="btn btn-default btn-sm plus-btn" id="add_course">
                            <span class="glyphicon glyphicon-plus"></span> 
                        </button>
                        <hr>
                    </div>
<!-- Build students menu (left side page) -->                
                <?php
                    $sql = "SELECT * FROM course";
                    $result = $conn->query($sql);
                    $course = $result->fetchAll();
                    for($i = 0 ; $i<count($course) ; $i++){
                        $course_name = $course[$i]["name"];
                        $course_description = $course[$i]["description"];
                        $course_img = $course[$i]["image"];
                            echo "<div class='all-courses' id='$course_name'>".
                                    "<ul>".
                                        "<li>".
                                            "<img src='$course_img' class='student-img'>".
                                            "<h4 class='student-name'>$course_name</h4>".
                                        "</li>".
                                    "</ul>".
                                "</div>";
                    }
                ?>
                </div>
 <!-- When clicking on student/course -->
                <div class="col-md-6 col-sm-6 col-xs-5" id="main-container">
                    <div class="student-div" style="display:none;">
                        <form method="post">
                            <h4> Add Student </h4>
                            <hr>
                            <button class="btn btn-primary">Save</button>
                            <button class="btn btn-danger">Delete</button>
                            <br><br>
                            <label>Name :  
                        <input class="new-student-name" placeholder="Name">
                        </label> <br><br>
                            <label>Phone :  
                        <input class="new-student-phone" placeholder="phone">
                        </label> <br> <br>
                            <label>E-Mail :  
                        <input class="new-student-email" placeholder="email">
                        </label>
                    <?php
                    $sql = "SELECT * FROM course";
                    $result = $conn->query($sql);
                    $course = $result->fetchAll();
                    for($i = 0 ; $i<count($course) ; $i++){
                        $course_name1 = $course[$i]["name"]; 
                        $course_description1 = $course[$i]["description"]; 
                        $course_img1 = $course[$i]["image"];
                        echo "<label class = 'checkbox-inline'>".
                                "<input type='checkbox' value=''>$course_name1</label>";
                        }
                    ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
require_once("footer.php"); ?>
