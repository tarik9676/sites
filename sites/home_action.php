<?php

session_start();

if (!isset($_SESSION['id']))
{
    header("Location: login.php");
}
else
{
    // SUBMITING POST
    if (isset($_POST['status_share']))
    {

        require_once 'db.php';

        function validate($data)
        {
            $data = trim($data);
            $data = stripcslashes($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $post_txt = validate(mysqli_real_escape_string($conn, $_POST['post_txt']));

            $post_image_1 = addslashes(file_get_contents($_FILES['post_img_1']['tmp_name']));
            $post_image_1_size = getimagesize($_FILES['post_img_1']['tmp_name']);
            if ($post_image_1_size == TRUE)
            {
            $post_img_1 = $post_image_1;
            }

            $post_image_2 = addslashes(file_get_contents($_FILES['post_img_2']['tmp_name']));
            $post_image_2_size = getimagesize($_FILES['post_img_2']['tmp_name']);
            if ($post_image_2_size == TRUE)
            {
            $post_img_2 = $post_image_2;
            }
        }

        if (empty($post_txt))
        {
            header("Location: home.php?error=emptyfields");
            exit();
        }
        else
        {
            $uid = $_SESSION['username'];
            $insert = "INSERT INTO posts (user, post, photo_1, photo_2, time, date) VALUES (?, ?, ?, ?, CURRENT_TIME, CURRENT_DATE);";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $insert))
            {
                header("Location: home.php?error=sqlerror&post=".$post_txt);
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt, "ssss", $uid, $post_txt, $post_img_1, $post_img_2);
                mysqli_stmt_execute($stmt);
                header("Location: home.php?post=success");
                exit();
            }
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        }
    }
    else
    {
      header("Location: signupPage.php");
      exit();
    }
}






?>