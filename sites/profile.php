<?php require_once 'header.php';?>

<link rel="stylesheet" href="css/profile.css">

<div class="container">

    <div class="card mb-5" id="cover">
        <div class="d-flex align-items-center" id="cover-photo">

            <?php
                $cover_img = $_SESSION['cover_photo'];
                if (empty($cover_img))
                {
                    echo "<img src='img/bikesride.jpg' alt='cover image'>";
                }
                else
                {
                    echo "<img src='$cover_img'/>";
                }
            ?>
        </div>
        <div class="card-body" id="profile-image">
            <?php
                $pro_img = $_SESSION['profile_photo'];
                if (empty($pro_img))
                {
                    echo "<img src='img/maleAvatar.png' >";
                }
                else
                {
                    echo "<img src='$pro_img' />";
                    // echo $pro_img;
                }
            ?>

        </div>
    </div>


    <div class="card">
        <div class="card-body">

            <div class="mb-5">
                <a href="edit_profile.php">Edit profile</a>
            </div>

            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td><?php echo $_SESSION['name'];?></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td><?php echo $_SESSION['gender'];?></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td><?php echo $_SESSION['phone'];?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $_SESSION['email'];?></td>
                    </tr>
                    <tr>
                        <td>Birthday</td>
                        <td><?php echo $_SESSION['birthday'];?></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td><?php echo $_SESSION['username'];?></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td><?php echo $_SESSION['city'];?></td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td><?php echo $_SESSION['country'];?></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

</div>

<?php require_once 'footer.php';?>