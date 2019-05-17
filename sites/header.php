<?php
    error_reporting(0);
    session_start();

    if (!isset($_SESSION['id'])) {
        header("Location: login.php");
    }

    $id = $_SESSION['id'];
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
    <link href="https://fonts.googleapis.com/css?family=Muli|Noto+Sans|Cinzel|Dosis|Kanit|Cardo|Crete+Round|Merienda|Sree+Krushnadevaraya|Volkhov" rel="stylesheet">
    <!-- Google Icons -->
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <link href="fonts/google_icons.css" rel="stylesheet" />

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'> -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/header.css">
    <!-- FONTAWESOME 5 ICONS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Noto+Serif|Roboto+Slab" rel="stylesheet">
</head>

<body>

    <!-- STARTING NAVIGATION BAR -->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top p-0">

        <a class="navbar-brand" href="home.php">
            <i class="fas fa-home" style="font-size:20px"></i> Logo
        </a>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav p-0">
                <li class="nav-item">
                    <!-- STARTING DROPDOWN MESSAGES -->
                    <div class="dropdown">
                        <button data-toggle="dropdown">
                            <a class="nav-link" href="#">
                                <i class="fab fa-facebook-messenger"></i>
                            </a>
                        </button>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Link 1</a>
                            <a class="dropdown-item" href="#">Link 2</a>
                            <a class="dropdown-item" href="#">Link 3</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Another link</a>
                        </div>
                    </div>
                    <!-- END DROPDOWN MESSAGES -->
                </li>
                <li class="nav-item">
                    <!-- STARTING DROPDOWN NOTIFICATIONS -->
                    <div class="dropdown">
                        <button data-toggle="dropdown">
                            <a class="nav-link" href="#">
                                <i class="material-icons">notifications</i><span id="badge">3</span>
                            </a>
                        </button>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Link 1</a>
                            <a class="dropdown-item" href="#">Link 2</a>
                            <a class="dropdown-item" href="#">Link 3</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Another link</a>
                        </div>
                    </div>
                    <!-- END DROPDOWN NOTIFICATIONS -->
                </li>
                <li class="nav-item">
                    <!-- STARTING DROPDOWN SETTINGS -->
                    <div class="dropdown">
                        <button data-toggle="dropdown">
                            <a class="nav-link" href="#">
                                <i class="material-icons">settings</i>
                            </a>
                        </button>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Link 1</a>
                            <a class="dropdown-item" href="#">Link 2</a>
                            <a class="dropdown-item" href="#">Link 3</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Another link</a>
                        </div>
                    </div>
                    <!-- END DROPDOWN SETTINGS -->
                </li>
            </ul>
        </div>
        <div class="d-flex justify-content-around" id="nav-right">
            <!-- STARTING DROPDOWN FRIEND REQUESTS -->
            <div class="dropdown dropleft">
                <button data-toggle="dropdown">
                    <a href="#" class="afr"><i class="fas fa-user-friends"></i></a>
                </button>

                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Link 1</a>
                    <a class="dropdown-item" href="#">Link 2</a>
                    <a class="dropdown-item" href="#">Link 3</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Another link</a>
                </div>
            </div>
            <!-- END DROPDOWN FRIEND REQUESTS -->


            <!-- STARTING DROPDOWN ACTIVE FRIENDS -->
            <div class="dropdown dropleft">
                <button data-toggle="dropdown">
                    <a href="#" class="afr"><i class='fab fa-rocketchat'></i></a>
                </button>

                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Link 1</a>
                    <a class="dropdown-item" href="#">Link 2</a>
                    <a class="dropdown-item" href="#">Link 3</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Another link</a>
                </div>
            </div>
            <!-- END DROPDOWN ACTIVE FRIENDS -->

            <!-- STARTING DROPDOWN MY ACCOUNT -->
            <div class="dropdown dropleft float-right">
                <button data-toggle="dropdown">
                    <a href="#" class="text-white" id="my-account">
                        <?php
                            $pro_img = $_SESSION['profile_photo'];
                            if (empty($pro_img))
                            {
                                echo "<img src='img/maleAvatar.png' >";
                            }
                            else
                            {
                                echo "<img src='$pro_img' />";
                            }
                        ?>
                    </a>
                </button>

                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Link 1</a>
                    <a class="dropdown-item" href="#">Link 2</a>
                    <a class="dropdown-item" href="#">Link 3</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Log out</a>
                </div>
            </div>
            <!-- END DROPDOWN MY ACCOUNT -->

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        </div>

    </nav>

    <!-- END NAVIGATION BAR -->