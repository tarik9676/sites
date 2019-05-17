<?php

if(isset($_POST['signup-submit']))
{

  require_once 'db.php';

  // Form validating function
  function validate($data) {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $first = $last = $uid = $password = $email = $phone = $gender = $birthday = "";
  // variable declaration
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first    = validate(mysqli_real_escape_string($conn, $_POST['fname']));
    $last     = validate(mysqli_real_escape_string($conn, $_POST['lname']));
    $uid      = validate(mysqli_real_escape_string($conn, $_POST['username']));
    $password = validate(mysqli_real_escape_string($conn, $_POST['password']));
    $confirmPassword = validate(mysqli_real_escape_string($conn, $_POST['confirmpassword']));
    $email    = validate(mysqli_real_escape_string($conn, $_POST['email']));
    // $phone    = validate(mysqli_real_escape_string($conn, $_POST['phone']));
    $gender   = validate(mysqli_real_escape_string($conn, $_POST['gender']));
    $birthday = validate(mysqli_real_escape_string($conn, $_POST['birthdate']));
    // $district = validate(mysqli_real_escape_string($conn, $_POST['district']));
    // $country  = validate(mysqli_real_escape_string($conn, $_POST['country']));
  }

  if (empty($first) || empty($last) || empty($uid) || empty($password) || empty($confirmPassword) || empty($email) || empty($gender))
  {
    header("Location: signup.php?error=emptyfields&first=".$first."&last=".$last."&uid=".$uid."&mail=".$email."&birthday=".$birthday);
    exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $uid))
  {
    header("Location: signup.php?error=invalidmailuid=".$first."&last=".$last."&birthday=".$birthday);
    exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
    header("Location: signup.php?error=invalidmail&first=".$first."&last=".$last."&uid=".$uid."&birthday=".$birthday);
    exit();
  }
  else if(!preg_match("/^[a-zA-Z0-9]*$/", $uid))
  {
    header("Location: signup.php?error=invaliduid&first=".$first."&last=".$last."&mail=".$email."&birthday=".$birthday);
    exit();
  }
  else if($password !== $confirmPassword)
  {
    header("Location: signup.php?error=passwordnotmatch&first=".$first."&last=".$last."&uid=".$uid."&mail=".$email."&birthday=".$birthday);
    exit();
  }
  else
  {
    $sql = "SELECT username FROM users WHERE username = ? OR email = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
      header("Location: signup.php?error=sqlerror&first=".$first."&last=".$last."&uid=".$uid."&mail=".$email."&birthday=".$birthday);
      exit();
    }
    else
    {
      mysqli_stmt_bind_param($stmt, "ss", $uid, $email);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if ($resultCheck > 0)
      {
        header("Location: signup.php?error=useremail&first=".$first."&last=".$last."&mail=".$email."&birthday=".$birthday);
      }
      else
      {
        // data submission query to server
        $insert = "INSERT INTO users(first, last, user_identity, username, password, email, gender, birthday, DATE, TIME)
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, CURRENT_DATE(), CURRENT_TIME());";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $insert))
        {
          header("Location: signup.php?error=sqlerror&first=".$first."&last=".$last."&uid=".$uid."&mail=".$email."&birthday=".$birthday);
          exit();
        }
        else
        {
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);


          function genRandStr($length)
          {
              $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
              $charLength = strlen($char);
              $randStr = "";
  
              for ($i=0; $i < $length; $i++)
              { 
                  $randStr .= $char[rand(0, $charLength-1)];
              }
              return $randStr;
          }
          date_default_timezone_set('Asia/Dhaka');
          $u_identity = date("YmdHis").genRandStr(5);

          mysqli_stmt_bind_param($stmt, "ssssssss", $first, $last, $u_identity, $uid, $hashedPwd, $email, $gender, $birthday);
          mysqli_stmt_execute($stmt);
          header("Location: signup.php?signup=success");
          exit();
        }
      }
    }
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);

}
else
{
  header("Location: signupPage.php");
  exit();
}