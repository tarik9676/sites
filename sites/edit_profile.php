<?php require_once 'header.php';?>

<link rel="stylesheet" href="css/edit_profile.css">
<div class="container">

    <div class="card mb-5" id="cover">
        <div class="d-flex align-items-center" id="cover-photo">
            <?php
                $cover_img = $_SESSION['cover_photo'];
                if ($cover_img == NULL)
                {
                    echo "<img src='img/bikesride.jpg' alt='cover image'>";
                } 
                else 
                {
                    echo "<img src='$cover_img' alt='cover image'>";
                }
            ?>
        </div>
        <div class="card-body" id="profile-image">
            <?php
                $pro_img = $_SESSION['profile_photo'];
                if ($pro_img == NULL) 
                {
                    echo "<img src='img/maleAvatar.png' alt='profile image'>";
                } 
                else 
                {
                    echo "<img src='$pro_img' alt='profile image'>";
                }
            ?>
        </div>
    </div>


    <div class="card">
        <div class="card-body">

        <div class="text-center mt-4">
            <?php
            
            $error = $_GET['error'];
            $edit = $_GET['edit'];

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
            else if ($error === 'usertaken')
            {
                echo "<p class='text-warning'>Username already taken!</p>";
            }
            else if ($error === 'sqlerror')
            {
                echo "<p class='text-warning'>SQL ERROR!</p>";
            }
            else if ($edit === 'success')
            {
                echo "<p class='text-success'>Edit successful!</p>";
                echo "<p class='text-success'>Updates will take efects next time you log in.!</p>";
            }
            
            
            ?>
        </div>

            <form action="edit_profile_action.php" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="profile_photo">Upload profile photo:</label>
                    <input type="file" id="profile_photo" name="profile_photo">
                </div>
                <div class="form-group">
                    <label for="cover_photo">Upload Cover photo:</label>
                    <input type="file" id="cover_photo" name="cover_photo">
                </div>
                <div class="form-group">
                    <label for="pwd">First Name:</label>
                    <input type="text" class="form-control" id="first" value="<?php echo $_SESSION['first'];?>" name="fname">
                </div>
                <div class="form-group">
                    <label for="last">Last Name:</label>
                    <input type="text" class="form-control" id="last" value="<?php echo $_SESSION['last'];?>" name="lname">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" value="<?php echo $_SESSION['email'];?>"  name="email">
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" id="phone" value="<?php echo $_SESSION['phone'];?>"  name="phone">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="confirmpassword">Confirm Password:</label>
                    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword">
                </div>
                <div class="form-group">
                    <label for="birthday">Birtday:</label>
                    <input type="date" class="form-control" id="birthday" name="birthday">
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <input type="radio" name="gender" id="male" value="male"> Male
                    <input type="radio" name="gender" id="female" value="female"> Female
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" class="form-control" id="city" value="<?php echo $_SESSION['city'];?>" name="city">
                </div>
                <div class="form-group">
                    <label for="country">Country:</label>
                    <input type="text" class="form-control" id="country" value="<?php echo $_SESSION['country'];?>" name="country">
                </div>

                <button type="submit" class="btn btn-primary" name="edit_profile">Save</button>

            </form>

        </div>
    </div>

</div>

<?php require_once 'footer.php';?>