 <!-- When click on 'Add course' -->
 <!-- Build the next form in the right container and sent data to route -->
<div class='course-div container'>
    <form class='addForm' method='post' action='../routes/api.php'>
        <h4>Add Course</h4>
        <input type='hidden' name='action' value='new_course'>
        <hr>
        <div class='row rowForm'>
            <div class='col-25'>
                <label>Name:</label>
            </div>
            <div class='col-75'>
                <input class='new-course-name' placeholder='Course Name' name='name' required>
            </div>
        </div>
        <div class='row rowForm'>
            <div class='col-25'>
                <label>Description:</label>
            </div>
            <div class='col-75'>
                <textarea class='new-course-description' placeholder='Course Description' name='description' required></textarea>
            </div>
        </div>
            
        <div class='row rowForm'>
            <div class='col-25'>
                <label> Image:</label>
            </div>
            <div class='col-75'>
                <input class='new-course-image' placeholder='Insert Image URL' name='image-course' required>
            </div>
        </div>
        <div class='row rowForm'>
            <div class='col-25'>
                <label>Students:</label>
            </div>
            <div class='col-75'>
                <textarea class='new-course-students' placeholder='Student in class..' name='students' required></textarea>
            </div>
        </div>
        <div class='row rowFormbtn'>
            <button class='btn btn-primary' type='submit' name='save' id='save-course'>Save</button>
            <button class='btn btn-danger'>Delete</button>
        </div>
    </form>
</div>
