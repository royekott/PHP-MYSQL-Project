<!-- Log in page --> 

<!DOCTYPE html>
<html class=''>
    <head>
        <!-- Js files --> 
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script>
        <script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script>
        <script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script>
        <meta charset='UTF-8'>
        <meta name="robots" content="noindex">
        <!-- Css files -->
        <link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
        <link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/Lewitje/pen/BNNJjo?limit=all&page=21&q=animation" />
        <link rel="stylesheet" href="login-style.css">
        
    </head>
    
    <body>
        
    <?php
        session_start();
    ?>
        
        <div class="wrapper">
            <div class="container" id="formContainer">
                <h1>Welcome</h1>

                <form class="form loginForm" action="main.php" method="post">
                    <label for="uname"><b>Username:</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>
                    <label for="psw"><b>Password:</b></label>
                     <input class="psw" type="password" placeholder="Enter Password" name="psw" required>
                    <button type="submit" name="submit" id="login-button">Login</button>
                </form>
            </div>

            <ul class="bg-bubbles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
        <script > 
      
            var allowSubmit = false;
            $("#login-button").click(function(event){
                if(!allowSubmit){
                    event.preventDefault();
                $('form').fadeOut(500);
                $('.wrapper').addClass('form-success');
                }
            setInterval( allowSubmit = true, 5000);

        });
    
        </script>
        <div class="footer">
            <span><a href="login.php"><img src="../root/logo.PNG"></a></span>
        </div>
    </body>
</html>