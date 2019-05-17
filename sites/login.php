<?php
    error_reporting(0);

    session_start();

    if (isset($_SESSION['id']))
    {
        header("Location: home.php");
    }
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
    <link href="https://fonts.googleapis.com/css?family=Muli|Cinzel|Dosis|Kanit" rel="stylesheet">
    <!-- Google Icons -->
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <link href="fonts/google_icons.css" rel="stylesheet" />

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'> -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/login.css">
    <!-- FONTAWESOME 5 ICONS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Noto+Serif|Roboto+Slab" rel="stylesheet">
</head>

<body>

    <div class="container-fluid d-flex align-items-center justify-content-center">

        <div class="d-flex align-items-center justify-content-center my-5" id="container">
            <div class="p-5 text-white" id="left">
                <h2>Welcome to the website!</h2>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget consectetur magna. Ut finibus in augue nec eleifend. Nulla aliquam turpis a dictum dapibus.</p>
                <button id="learn-more">Learn more</button>
            </div>
            <div class="d-flex align-items-center" id="right">
                <div class="p-5 my-5">
                    <h1 class="text-center">Log in</h1>

                    <div class="text-center" id="warnings">
                        <?php
                            $error = $_GET['error'];

                            if ($error === 'emptyfields')
                            {
                                echo "<p class='text-warning'>Fill all the fields!</p>";                            
                            }
                            else if ($error === 'sqlerror')
                            {
                                echo "<p class='text-warning'>SQL ERROR!</p>";   
                            }
                            else if ($error === 'wrongpassword')
                            {
                                echo "<p class='text-warning'>Wrong password!</p>";   
                            }
                            else if ($error === 'nouser')
                            {
                                echo "<p class='text-warning'>User not found!</p>";
                            }
                        ?>
                    </div>

                    <form action="login_action.php" method="POST">

                        <div class="igroup"><input type="email" id="email" name="mailuid" placeholder="&#xf007; E-mail or username" /></div>
                        <div class="igroup"><input type="password" id="password" name="password" placeholder="&#xf084; Password" /></div>
                        <div class="igroup mb-4" id="iremember"><input type="checkbox" name="remember" value="yes" /> Remember me</div>
                        <button type="submit" id="login-btn" name="login-submit">Log In</button>

                        <p class="well text-dark pt-4" id="signup-link">Don't have an account? <a href="signup.php">Sign Up</a> here.
                        </p>

                    </form>
                </div>
            </div>
        </div>

    </div>

</body>

</html>