<?php
    error_reporting(0);
    ini_set('display_errors', 'off');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <!-- OFFLINE FILES -->
    <link rel="stylesheet" href="bootstrap4/bootstrap.min.css">
    <script src="bootstrap4/jquery.min.js"></script>
    <script src="bootstrap4/popover.min.js"></script>
    <script src="bootstrap4/bootstrap.min.js"></script>
    <link rel='stylesheet' href='css/fontawesome-free-5.6.3-web/css/all.min.css' />
    <link href="https://fonts.googleapis.com/css?family=Muli|Cinzel|Kanit" rel="stylesheet">
    <!-- Google Icons -->
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <link href="fonts/google_icons.css" rel="stylesheet" />

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'> -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/signup.css">
    <!-- FONTAWESOME 5 ICONS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Dosis|Noto+Serif|Roboto+Slab" rel="stylesheet">
</head>

<body>

    <div class="container-fluid d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center row" id="container">

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="left">
                <h1 class="text-center">Sign up</h1>

                <div class="text-center mt-4">
                    <?php
                    
                    $error = $_GET['error'];
                    $signup = $_GET['signup'];

                    if ($error === 'emptyfields') 
                    {
                    echo "<p class='text-warning'>Fill all the fields!</p>";
                    }
                    else if ($error === 'invalidmailuid')
                    {
                        echo "<p class='text-warning'>Email & username are not valid!</p>";
                    }
                    else if ($error === 'invalidmail')
                    {
                        echo "<p class='text-warning'>Your email is not valid!</p>";
                    }
                    else if ($error === 'invaliduid')
                    {
                        echo "<p class='text-warning'>Your username is not valid!</p>";
                    }
                    else if ($error === 'passwordnotmatch')
                    {
                        echo "<p class='text-warning'>Password does not match!</p>";
                    }
                    else if ($error === 'useremail')
                    {
                        echo "<p class='text-warning'>Username or Email already taken!</p>";
                    }
                    else if ($error === 'sqlerror')
                    {
                        echo "<p class='text-warning'>SQL ERROR!</p>";
                    }
                    else if ($error === 'afsqlerror')
                    {
                        echo "<p class='text-warning'>ADD FRIEND COLUMN SQL ERROR!</p>";
                    }
                    else if ($signup === 'success')
                    {
                        echo "<p class='text-success'>Signup successful!</p>";
                    }
                    
                    
                    ?>
                </div>

                <form action="signup_action.php" method="POST">
                    <div class="igroup d-flex justify-content-between">
                        <input value="<?php echo $_GET['first'];?>" type="text" id="fname" name="fname" placeholder="First name" required>
                        <input value="<?php echo $_GET['last'];?>" type="text" id="lname" name="lname" placeholder="Last name" required>
                    </div>

                    <div class="igroup d-flex justify-content-between">
                        <input value="<?php echo $_GET['mail'];?>" type="email" id="email" name="email" placeholder="Email" required>
                        <input value="<?php echo $_GET['uid'];?>" type="username" id="username" name="username" placeholder="Username" required>
                    </div>

                    <div class="igroup d-flex justify-content-between">
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm password" required>
                    </div>

                    <div class="igroup d-flex justify-content-between">
                        <input value="<?php echo $_GET['birthday'];?>" type="date" id="birthdate" name="birthdate" value="Birthdate">
                        <div id="gender">
                            <input type="radio" name="gender" id="male" value="Male"> Male
                            <input type="radio" name="gender" id="female" value="Female"> Female
                        </div>
                    </div>

                    <div class="d-flex justify-content-center" id="signup-cont"><button type="submit" id="signup-btn" name="signup-submit">Sign up</button></div>

                    <p class="well text-dark pt-4" id="Login-link">Already have an account? <a href="login.php">Log
                            in</a> here.
                    </p>
                </form>
            </div>

            <div class="p-5 text-white col-lg-6 col-md-6 col-sm-12 col-xs-12" id="right">
                <h2 class="mb-3">Follow your interests !</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget consectetur magna. Ut finibus in augue nec eleifend. Nulla aliquam turpis a dictum dapibus.</p>
            </div>

        </div>
    </div>

</body>

</html>