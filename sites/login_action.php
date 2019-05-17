<?php

if (isset($_POST['login-submit'])) {
    
require_once 'db.php';

    function validate($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $mailuid    = validate(mysqli_real_escape_string($conn, $_POST['mailuid']));
        $password = validate(mysqli_real_escape_string($conn, $_POST['password']));
    }

    if (empty($mailuid) || empty($password))
    {
        header("Location: login.php?error=emptyfields");
        exit();
    }
    else
    {
        $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: login.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result))
            {
                $pwdCheck = password_verify($password, $row['password']);

                if ($pwdCheck == false)
                {
                    header("Location: login.php?error=wrongpassword");
                    exit();
                }
                else if ($pwdCheck == true)
                {
                    session_start();
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['first'] = $row['first'];
                    $_SESSION['last'] = $row['last'];
                    $_SESSION['name'] = $row['first'] . " " . $row['last'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['folder'] = $row['folder'];
                    $_SESSION['user_identity'] = $row['user_identity'];
                    $_SESSION['profile_photo'] = $row['pro_img_path'];
                    $_SESSION['cover_photo'] = $row['cover_img_path'];
                    $_SESSION['phone'] = $row['phone'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['gender'] = $row['gender'];
                    $_SESSION['birthday'] = $row['birthday'];
                    $_SESSION['city'] = $row['city'];
                    $_SESSION['country'] = $row['country'];

                    header("Location: home.php");
                    exit();
                }
                else
                {
                    header("Location: login.php?error=wrongpassword");
                    exit();
                }
            }
            else
            {
                header("Location: login.php?error=nouser");
                exit();
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
else
{
  header("Location: login.php");
  exit();
}