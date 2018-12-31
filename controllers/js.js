$(document).ready(function () {

    user_role = the_role;

});

//Display student details when clicking on student.

$(".all-students").click(function () {
    var div_student_id = $(this).attr("id");
    var div_img = $(this).find(".student-img");
    var div_student_name = $(this).find(".student-name");

    $.ajax({
        type: "POST",
        url: "../routes/api.php",
        data: {
            action: "get_all_students"
        },
        success: function (data) {
            $("#main-container").html("");
            var json = JSON.parse(data);
            for (var i = 0; i < json.length; i++) {
                var db_id = json[i].id;
                if (div_student_id == db_id) {
                    $json_id = div_student_id;
                    var json_name = json[i].name;
                    var json_img = json[i].image;
                    var json_phone = json[i].phone;
                    var json_email = json[i].email;
                    var json_student_course = json[i].course;
//Build the student details container 
                    var html = "<div class='topContent'><h3>Student Information</h3>"+
                        "<button class='btn btn-primary edit-student' id='btn-edit-student'>Edit</button></div>"+
                        "<hr><br><div class='row col-md-12 col-sm-12 col-xs-12'>"+
                        "<img src=" + json_img + " class='student-img-details col-md-6 col-sm-6 col-xs-6'><h3 class='col-md-6 col-sm-6 col-xs-6'>" + json_name + 
                        "</h3><br><br><h4 class='col-md-6 col-sm-6 col-xs-6'>" + json_phone + "</h4>"+
                        "<br><br><h4 class='col-md-6 col-sm-6 col-xs-6'>" + json_email + "</h4></div>"+
                        "<ul class='course-student col-md-12 col-sm-12 col-xs-12'><h4>Enrolled in courses:  </h4><li> " + json_student_course + "</li></ul>";
                    $("#main-container").append(html);

//Build the edit student form container. 
                    $("#btn-edit-student").click(function () {
                        $("#main-container").html("");
                        var html = "<div class='student-div container'>"+
                        "<form class='addForm'>"+
                            "<h3> Add Student / Edit Student</h3>"+
                            "<input type='hidden' name='action' value='delete_student' data=" + $json_id + ">"+
                            "<hr>"+
                            "<div class='row rowForm'>"+
                                "<div class='col-25'>"+
                                    "<label>Name : </label>"+
                                "</div>"+
                                "<div class='col-75'>"+
                                    "<input id='new-student-name' placeholder="+ json_name +" name='new-student-name'>"+
                                "</div>"+
                            "</div>"+
                            "<div class='row rowForm'>"+
                                "<div class='col-25'>"+
                                    "<label>Phone : </label>"+
                                "</div>"+
                                "<div class='col-75'>"+
                                    "<input id='new-student-phone' placeholder="+ json_phone +" name='new-student-phone'>"+
                                "</div>"+
                            "</div>"+
                            "<div class='row rowForm'>"+
                                "<div class='col-25'>"+
                                    "<label>E-Mail :</label>"+
                                "</div>"+
                                "<div class='col-75'>"+
                                    "<input id='new-student-email' placeholder="+ json_email +" name='new-student-email'>"+
                                "</div>"+
                            "</div>"+
                            "<div class='row rowForm'>"+
                                "<div class='col-25'>"+
                                    "<label> Image :</label>"+
                                "</div>"+
                                "<div class='col-75'>"+
                                    "<input id='new-student-image' placeholder='Insert Image URL' name='new-student-image'>"+
                                "</div>"+
                            "</div>"+
                            "<div class='row rowFormbtn'>"+
                                "<button class='btn btn-primary add-student' id='save-student' type='submit'>Save</button>"+
                                "<button class='btn btn-danger delete-student' name='delete-student' type='sumbit'>Delete</button>"+
                            "</div>"+
                        "</form>"+
                    "</div>";
                        
                        $("#main-container").append(html);
                        
//Delete student when click on delete.
                        $('.delete-student').click(function () {
                            $.ajax({
                                type: "POST",
                                url: "../routes/api.php",
                                data: {
                                    action: "delete_student",
                                    'studentID': $json_id,

                                },
                                success: function (data) {
                                    $("#students").html(data);
                                }
                            })
                        });
                        
//Update student when click on save.
                        $('#save-student').click(function () {
                            var new_student_name = $("#new-student-name").val();
                            var new_student_phone = $("#new-student-phone").val();
                            var new_student_email = $("#new-student-email").val();
                            var new_student_image = $("#new-student-image").val();

                            $.ajax({
                                type: "POST",
                                url: "../routes/api.php",
                                data: {
                                    action: "edit_student",
                                    'studentID': $json_id,
                                    'studentName': new_student_name,
                                    'studentPhone': new_student_phone,
                                    'studentEmail': new_student_email,
                                    'studentImage': new_student_image
                                },
                                success: function (data) {
                                    $("#main-container").html(data);
                                }
                            })
                        })
                    });
                }
            }
        }
    })
});


//Display course details when clicking on course.
$(".all-courses").click(function () {
    $("#main-container").html("");

    var div_course_id = $(this).attr("id");
    $.ajax({
        type: "POST",
        url: "../routes/api.php",
        data: {
            action: "get_all_courses"
        },
        success: function (data) {
            $("#main-container").html("");
            var json = JSON.parse(data);
            for (var i = 0; i < json.length; i++) {
                var json_course_name = json[i].name;
                if (div_course_id == json_course_name) {
                    var json_course_img = json[i].image;
                    var json_course_description = json[i].description;
                    var json_course_name1 = json[i].name;
                    var json_course_student = json[i].student;
                    
//Build the course details container 
                    var html = "<div class='topContent'><h3>Course Information</h3>"+
                        "<button class='btn btn-primary' id='edit-course'>Edit</button></div>"+
                        "<hr><br><div class='row col-md-12 col-sm-12 col-xs-12'>"+
                        "<img src="+ json_course_img +" class='student-img-details col-md-6 col-sm-6 col-xs-6'>"+
                        "<h3 class='col-md-6 col-sm-6 col-xs-6'>"+ json_course_name +"</h3><br><br><p class='col-md-6 col-sm-6 col-xs-6'>"+
                        json_course_description +"</p></div><br><br>"+
                        "<ul class='course-student col-md-12 col-sm-12 col-xs-12'><h4>Students enrolled in this course: </h4>"+
                        "<li> " + json_course_student + "</li></ul>";
                    $("#main-container").append(html);

//Build the edit course form container. 

                    $("#edit-course").click(function () {
                        if (user_role == "owner" || user_role == "manager") {

                            var student_array = [];
                            student_array.push(json_course_student);
                            var student_num = student_array.length

                            $("#main-container").html("");
                            var html = "<div class='course-div container'>"+
                        "<form class='addForm'"+
                            "<h3>Add Course / Edit Course</h3>"+
                            "<hr>"+
                            "<div class='row rowForm'>"+
                                "<div class='col-25'>"+
                                    "<label>Name:</label>"+
                                "</div>"+
                                "<div class='col-75'>"+
                                    "<input class='new-course-name' placeholder="+ json_course_name1 +" name='name' required>"+
                                "</div>"+
                            "</div>"+
                            "<div class='row rowForm'>"+
                                "<div class='col-25'>"+
                                    "<label>Description:</label>"+
                                "</div>"+
                                "<div class='col-75'>"+
                                    "<textarea class='new-course-description' placeholder="+ json_course_description +" name='description' required></textarea>"+
                                "</div>"+
                            "</div>"+

                            "<div class='row rowForm'>"+
                                "<div class='col-25'>"+
                                    "<label> Image:</label>"+
                                "</div>"+
                                "<div class='col-75'>"+
                                    "<input class='new-course-image' placeholder="+ json_course_img +" name='image-course' required>"+
                                "</div>"+
                            "</div>"+
                            "<div class='row rowForm'>"+
                                "<div class='col-25'>"+
                                    "<label>Students :</label>"+
                                "</div>"+
                                "<div class='col-75'>"+
                                    "<textarea class='new-course-students' placeholder="+ json_course_student +" name='students' required></textarea>"+
                                "</div>"+
                            "</div>"+
                            "<div class='row rowFormbtn'>"+
                                "<button class='btn btn-primary save-course'>Save</button>"+
                                "<button class='btn btn-danger delete-course'>Delete</button>"+
                            "</div>"+
                        "<h4>Total "+ student_num +" students are taking this course</h4>"+
                        "</form>"+
                    "</div>";
                            
                            $("#main-container").append(html);
                            
//Delete student when click on delete.
                            $('.delete-course').click(function () {
                                $.ajax({
                                    type: "POST",
                                    url: "../routes/api.php",
                                    data: {
                                        action: "delete_course",
                                        'courseName': json_course_name1,

                                    },
                                    success: function (data) {
                                        $("body").html(data);
                                    }
                                })
                            });
                            
//Update student when click on save.
                            $('.save-course').click(function () {
                                var new_course_name = $(".new-course-name").val();
                                var new_course_description = $(".new-course-description").val();
                                var new_course_image = $(".new-course-image").val();
                                var new_course_students = $(".new-course-students").val();

                                $.ajax({
                                    type: "POST",
                                    url: "../routes/api.php",
                                    data: {
                                        action: "edit_course",
                                        'oldName': json_course_name1,
                                        'courseName': new_course_name,
                                        'courseDescription': new_course_description,
                                        'courseImage': new_course_image,
                                        'courseStudents': new_course_students
                                    },
                                    success: function (data) {
                                        console.log(json_course_name1);
                                        $("body").html(data);
                                    }
                                })
                            })

                        } else {
                            alert("Only Owner and Manager are allowed to edit courses");
                        }
                    });
                };
            }
        }
    })
})

//Display administrator details when clicking on course.
$(".all-administrators").click(function () {
    var div_administrator_id = $(this).attr("id");
    var div_administrator_name = $(this).find(".student-name");

    $.ajax({
        type: "POST",
        url: "../routes/api.php",
        data: {
            action: "get_all_administrators"
        },
        success: function (data) {
            $("#admin-container").html("");
            var json = JSON.parse(data);
            for (var i = 0; i < json.length; i++) {
                var db_id = json[i].id;
                if (div_administrator_id == db_id) {
                    var json_name = json[i].name;
                    var json_role = json[i].role;
                    var json_phone = json[i].phone;
                    var json_email = json[i].email;
//Build the administrator details container 
                    var html = "<div class='topContent'><h3>administrator Information</h3>"+
                        "<button class='btn btn-primary edit-administrator' id='btn-edit-administrator'>Edit</button></div>"+
                        "<hr><br><div class='row col-md-12 col-sm-12 col-xs-12'>"+
                        "<img class='col-md-6 col-sm-6 col-xs-7' src='http://www.slbc.lk/ta/images/services/thendral/announcers/default-avatar-rapper-guy.png' class='admin-avatar'>"+
                        "<h3 class='col-md-6 col-sm-6 col-xs-7'>"+ json_name +"</h3>"+
                        "<br><br><h4 class='col-md-6 col-sm-6 col-xs-7'>"+ json_phone +"</h4><br><br>"+
                        "<h4 class='col-md-6 col-sm-6 col-xs-7'>"+ json_email +"</h4>"+
                        "<h4 class='col-md-6 col-sm-6 col-xs-7'>"+ json_role +"</h4>"+
                        "</div>";
                    $("#admin-container").append(html);

                    //Hide administration page from manager role.
                    if (user_role == "manager" && json_role == "owner") {
                        $(".administrator-info").hide();
                        alert("Only Owner can view this page");

                    }
                    
                    $("#btn-edit-administrator").click(function () {
                        $("#admin-container").html("");
//Build the edit course form container. 
                        
                        var html =
                        "<div class='administrator-div container'>"+
                            "<form class='addForm'"+
                                "<h3>Edit administrator</h3>"+
                                "<hr>"+
                                "<div class='row rowForm'>"+
                                    "<div class='col-25'>"+
                                        "<label for='name'>Name:</label>"+
                                    "</div>"+
                                    "<div class='col-75'>"+
                                        "<input name='new-administrator-name' placeholder="+ json_name +" class='new-user-name'>"+
                                    "</div>"+
                                "</div>"+
                                "<div class='row rowForm'>"+
                                    "<div class='col-25'>"+
                                        "<label class='role-label' for='role'>Role:</label>"+
                                    "</div>"+
                                    "<div class='col-75'>"+
                                        "<input role='new-administrator-role' placeholder="+ json_role +" class='new-user-role'>"+
                                    "</div>"+
                                "</div>"+
                                "<div class='row rowForm'>"+
                                    "<div class='col-25'>"+
                                        "<label for='phone'> Phone:</label>"+
                                    "</div>"+
                                    "<div class='col-75'>"+
                                        "<input name='new-administrator-phone' placeholder="+ json_phone +" class='new-user-phone'>"+
                                    "</div>"+
                                "</div>"+
                                "<div class='row rowForm'>"+
                                    "<div class='col-25'>"+
                                        "<label for='email'>E-Mail: :</label>"+
                                    "</div>"+
                                    "<div class='col-75'>"+
                                        "<input name='new-administrator-email' placeholder="+ json_email +" class='new-user-email'>"+
                                    "</div>"+
                                "</div>"+
                                "<div class='row rowForm'>"+
                                        "<div class='col-25'>"+
                                            "<label for='password'>Password:</label>"+
                                        "</div>"+
                                        "<div class='col-75'>"+
                                            "<input name='new-administrator-password' placeholder='Password' class='new-user-password' type='password'>"+
                                "<div class='row rowFormmbtn'>"+
                                    "<button class='btn btn-primary save-admin'>Save</button>"+
                                    "<button class='btn btn-danger delete-admin'>Delete</button>"+
                                "</div>"+
                            "</form>"+
                        "</div>";

                        $("#admin-container").append(html);

                        // Permissions for manager on sales role.
                        if (user_role == "manager" && json_role !== "sales") {
                            $(".new-user-role" && ".role-label").hide();
                            $(".delete-admin").hide();
                        }
//Delete administrator when click on delete.
                        $('.delete-admin').click(function () {
                            $.ajax({
                                type: "POST",
                                url: "../routes/api.php",
                                data: {
                                    action: "delete_admin",
                                    'adminID': div_administrator_id,

                                },
                                success: function (data) {
                                    $("body").html(data);
                                }
                            })
                        });
                        
//Update administrator when click on save.
                        $('.save-admin').click(function () {
                            var new_user_name = $(".new-user-name").val();
                            var new_user_role = $(".new-user-role").val();
                            var new_user_phone = $(".new-user-phone").val();
                            var new_user_email = $(".new-user-email").val();
                            var new_user_password = $(".new-user-password").val();
                            $.ajax({
                                type: "POST",
                                url: "../routes/api.php",
                                data: {
                                    action: "edit_admin",
                                    'adminID': div_administrator_id,
                                    'adminName': new_user_name,
                                    'adminRole': new_user_role,
                                    'adminPhone': new_user_phone,
                                    'adminEmail': new_user_email,
                                    'adminPassword': new_user_password,

                                },
                                success: function (data) {
                                    $("body").html(data);
                                }
                            })
                        });
                    });
                }
            }
        }
    })
});

// Add administrators container 
$("#add-administrator").click(function () {
    $("#admin-container").html("");
    
    //Building form 
     var administrator_div =
                    "<div class='container administrator-div'>"+
                        "<form class='addForm'>"+
                            "<h4>Add New User</h4>"+
                            "<hr>"+
                            "<div class='row rowForm'>"+
                                "<div class='col-25'>"+
                                    "<label>Name :</label>"+
                                "</div>"+
                                "<div class='col-75'>"+
                                    "<input class='new-user-name' placeholder='Name'>"+
                                "</div>"+
                            "</div>"+
                            "<div class='row rowForm'>"+
                                "<div class='col-25'>"+
                                    "<label>Phone :</label>"+
                                "</div>"+
                                "<div class='col-75'>"+
                                    "<input class='new-user-phone' placeholder='phone'>"+
                                "</div>"+
                            "</div>"+
                            "<div class='row rowForm'>"+
                                "<div class='col-25'>"+
                                    "<label>Role :</label>"+
                                "</div>"+
                                "<div class='col-75'>"+
                                    "<input class='new-user-role' placeholder='role'>"+
                                "</div>"+
                            "</div>"+
                            "<div class='row rowForm'>"+
                                "<div class='col-25'>"+
                                    "<label>E-Mail :</label>"+
                                "</div>"+
                                "<div class='col-75'>"+
                                    "<input class='new-user-email' placeholder='email'>"+
                                "</div>"+
                            "</div>"+
                            "<div class='row rowFrom'>"+
                                    "<div class='col-25'>"+
                                        "<label>Password :</label>"+
                                    "</div>"+
                                    "<div class='col-75'>"+
                                        "<input class='new-user-password' placeholder='Insert Password'>"+
                            "<div class='row rowFormbtn'>"+
                                "<button class='btn btn-primary add-user'>Save</button>"+
                            "</div>"+
                        "</form>"+
                    "</div>";

    

    $("#admin-container").append(administrator_div);

    $('.add-user').click(function () {
        var new_user_name = $(".new-user-name").val();
        var new_user_phone = $(".new-user-phone").val();
        var new_user_role = $(".new-user-role").val();
        var new_user_email = $(".new-user-email").val();
        var new_user_password = $(".new-user-password").val();

// Sending data to route
        $.ajax({
            type: "POST",
            url: "../routes/api.php",
            data: {
                action: "new_user",
                'userName': new_user_name,
                'userPhone': new_user_phone,
                'userRole': new_user_role,
                'userEmail': new_user_email,
                'userPassword': new_user_password

            },
            success: function (data) {
                console.log(new_user_email);
                $("body").html(data);
            }
        })
    })
});


// When click on add course 
$("#add_course").click(function () {
    $("#main-container").html("");
    $("#main-container").load("../views/new-course.php");


});

//When click on add student
$("#add-student").click(function () {
    $("#main-container").html("");
    $("#main-container").load("../views/new-student.php");

});

// Update student info, After click save.
$("#save-student").click(function () {
    var add_name = $(".add-student-name").val();
    var add_phone = $(".add-student-phone").val();
    var add_email = $(".add-student-email").val();
    var add_image = $(".add-student-image").val();

    if (/\wW+/.test(add_name) || add_image.endsWith(".jpg") || add_image.endsWith(".png")) {
        alert("Student added successfully!");
    }

});

// Update course info, After click save.
$("#save-course").click(function () {
    var add_course_name = $(".new-course-name").val();
    var add_description = $(".new-course-description").val();
    var add_course_image = $(".new-course-image").val();
    var add_course_students = $(".new-course-students").val();

    if (/\wW+/.test(add_course_name) || add_course_image.endsWith(".jpg") || add_course_image.endsWith(".png")) {
        alert("Course added successfully!");
    }

});

