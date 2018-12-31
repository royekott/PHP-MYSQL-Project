

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

        session_start();

        try {
            $conn = new PDO("mysql:host=$servername;dbname=theschool", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if( $_SESSION['isLogged'] = true){

                if(isset($_POST["action"])){
                    switch ($_POST["action"]){
                            
                        case "get_all_students": //Get all students
                            $sql = "SELECT * FROM student";
                            $statement=$conn->prepare($sql);
                            $statement->execute();
                            $results=$statement->fetchAll(PDO::FETCH_ASSOC);                       
                            $json=json_encode($results);
                            echo $json;
                            break;   

                        case "get_all_courses": // Get all courses
                            $sql = "SELECT * FROM course";
                            $statement=$conn->prepare($sql);
                            $statement->execute();
                            $results=$statement->fetchAll(PDO::FETCH_ASSOC);                       
                            $json=json_encode($results);
                            echo $json;
                            break;

                        case "get_all_administrators": //Get all administrators
                            $sql = "SELECT * FROM administrator";
                            $statement=$conn->prepare($sql);
                            $statement->execute();
                            $results=$statement->fetchAll(PDO::FETCH_ASSOC);                       
                            $json=json_encode($results);
                            echo $json;
                            break; 

                        case "new_student": //Insert new student
                            $student_name = $_POST["name"];
                            $student_phone = $_POST["phone"];
                            $student_email = $_POST["email"];
                            $student_image = $_POST["image"];
                            
                            if($student_name =="" || $student_phone == "" || $student_email = ""){
                                header("Location:../views/main.php");
                                die();
                            }
                            
                            $sql = "INSERT INTO `student`(`name`,`phone`,`email`,`image`) VALUES ('".$student_name."', '".$student_phone."', '".$student_email."', '".$student_image."')";
                            $statement=$conn->prepare($sql);
                            $statement->execute();
                            $_POST['action'] = "";
                            header("Location:../views/main.php");
                            break;

                            case "new_course": //Insert new course
                            $course_name = $_POST['name'];
                            $course_description = $_POST['description'];
                            $course_image = $_POST['image-course'];
                            $course_students = $_POST['students'];
                            $sql = "INSERT INTO course(name,description,image,student) 
                            VALUES ('$course_name','$course_description','$course_image','$course_students')";
                            $statement=$conn->prepare($sql);
                            $statement->execute();
                            $_POST['action'] = "";
                            header("Location:../views/main.php");
                            break;
                                                        
                            case "new_user": //Insert new administrator
                            $user_name = $_POST['userName'];
                            $user_role = $_POST['userRole'];
                            $user_phone = $_POST['userPhone'];
                            $user_email = $_POST['userEmail'];
                            $user_password = $_POST['userPassword'];
                            $sql = "INSERT INTO administrator(name,role,phone,email,password) VALUES   ('$user_name','$user_role','$user_phone','$user_email','$user_password')";
                            $statement=$conn->prepare($sql);
                            $statement->execute();
                            header("Location:../views/administration.php");
                            break;
                            
                        case "delete_student": //Delete student 
                            $studentID = $_POST['studentID'];    
                            $stmt = $conn->prepare("DELETE FROM student WHERE id = '$studentID'");
                            $stmt->execute();
                            header("Location:../views/main.php");
                            break;

                        case "delete_course": //Delete course
                            $courseName = $_POST['courseName'];  
                            echo $courseName;
                            $stmt = $conn->prepare("DELETE FROM course WHERE name = '$courseName'");
                            $stmt->execute();
                            header("Location:../views/main.php");
                            break;

                        case "delete_admin": //Delete administrator
                            $adminID = $_POST['adminID'];    
                            $stmt = $conn->prepare("DELETE FROM administrator WHERE id = '$adminID'");
                            $stmt->execute();
                            header("Location:../views/administration.php");
                            break;

                        case "edit_student": //Update student
                            $student_phone = $_POST['studentPhone'];
                            $student_email = $_POST['studentEmail'];
                            $student_image = $_POST['studentImage'];
                            $student_name = $_POST['studentName'];
                            $studentID = $_POST['studentID']; 
                            $stmt = $conn->prepare
                                ("UPDATE student SET name='$student_name',phone='$student_phone',email='$student_email',image='$student_image' WHERE id = '$studentID'");
                            $stmt->execute();
                            header("Location:../views/main.php");
                            break; 

                        case "edit_course": //Update course
                            $old_name = $_POST['oldName'];
                            $course_name = $_POST['courseName'];
                            $course_description = $_POST['courseDescription'];
                            $course_image = $_POST['courseImage'];
                            $course_students = $_POST['courseStudents'];
                            $stmt = $conn->prepare
                                ("UPDATE course SET name='$course_name',description='$course_description',image='$course_image',student='$course_students' WHERE name='$old_name'");
                            $stmt->execute();  
                            header("Location:../views/main.php");
                            break;
                            
                        case "edit_admin": //Update administrator
                            $admin_id = $_POST['adminID'];
                            $admin_name = $_POST['adminName'];
                            $admin_role = $_POST['adminRole'];
                            $admin_phone = $_POST['adminPhone'];                    
                            $admin_email = $_POST['adminEmail'];                    
                            $admin_password = $_POST['adminPassword'];                    
                            $stmt = $conn->prepare("UPDATE administrator SET    name='$admin_name',role='$admin_role',phone='$admin_phone',email='$admin_email',password='$admin_password' WHERE id='$admin_id'");
                            $stmt->execute();  
                            header("Location:../views/administration.php");
                            break;
                    }
                }
            }
        }
    
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }

?>
