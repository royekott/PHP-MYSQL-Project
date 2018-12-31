 <!-- When click on 'Add student' -->
 <!-- Build the next form in the right container and sent data to route -->

<div class='student-div container'>
    <form class='addForm' method='post' action='../routes/api.php'>
        <h4> Add Student </h4>
        <input type='hidden' name='action' value='new_student'>
        <hr>
        <div class='row rowForm'>
            <div class='col-25'>
                <label>Name : </label>
            </div>
            <div class='col-75'>
                <input class='add-student-name' placeholder='Name' name='name' autocomplete='name' required>
            </div>
        </div>
        <div class='row rowForm'>
            <div class='col-25'>
                <label>Phone : </label>
            </div>
            <div class='col-75'>
                <input class='add-student-phone' placeholder='phone' name='phone' autocomplete='phone' required>
            </div>
        </div>
        <div class='row rowForm'>
            <div class='col-25'>
                <label>E-Mail :</label>
            </div>
            <div class='col-75'>
                <input class='add-student-email' placeholder='email' name='email' autocomplete='email' required>    
            </div>
        </div>
        <div class='row rowForm'>
            <div class='col-25'>
                <label> Image :</label>
            </div>
            <div class='col-75'>
                <input name='image' placeholder='Insert Image URL' class='add-student-image' autocomplete='email' required>
            </div>
        </div>
        <div class='row rowFormbtn'>
            <button class='btn btn-primary' name='save' id='save-student' type='submit'>Save</button>
            <button class='btn btn-danger delete-student'>Delete</button>
        </div>
    </form>
</div>
