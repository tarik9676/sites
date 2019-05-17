<?php
session_start();

if(isset($_POST['edit_profile']))
{

  require_once 'db.php';

  // Form validating function
  function validate($data)
  {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $first = $last = $profile_image = $uid = $password = $email = $phone = $gender = $birthday = "";
  // variable declaration
  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {

    //Geting profile image & image name
    $profile_image = $_FILES['profile_photo']['tmp_name'];
    $profile_image_name = $_FILES['profile_photo']['name'];
    $profile_image_size = getimagesize($_FILES['profile_photo']['tmp_name']);
    if ($profile_image_size == TRUE)
    {
      $profile_photo = $profile_image;
    }

    //Geting cover image & image name
    $cover_image = $_FILES['cover_photo']['tmp_name'];
    $cover_image_name = $_FILES['cover_photo']['name'];
    $cover_image_size = getimagesize($_FILES['cover_photo']['tmp_name']);
    if ($cover_image_size == TRUE)
    {
      $cover_photo = $cover_image;
    }

    $first    = validate(mysqli_real_escape_string($conn, $_POST['fname']));
    $last     = validate(mysqli_real_escape_string($conn, $_POST['lname']));
    $password = validate(mysqli_real_escape_string($conn, $_POST['password']));
    $confirmPassword = validate(mysqli_real_escape_string($conn, $_POST['confirmpassword']));
    $email    = validate(mysqli_real_escape_string($conn, $_POST['email']));
    $phone    = validate(mysqli_real_escape_string($conn, $_POST['phone']));
    $gender   = validate(mysqli_real_escape_string($conn, $_POST['gender']));
    $birthday = validate(mysqli_real_escape_string($conn, $_POST['birthday']));
    $city = validate(mysqli_real_escape_string($conn, $_POST['city']));
    $country  = validate(mysqli_real_escape_string($conn, $_POST['country']));
  }

  if (empty($first) || empty($last) || empty($email) || empty($gender))
  {
    header("Location: edit_profile.php?error=emptyfields&first=".$first."&last=".$last."&uid=".$uid."&mail=".$email."&birthday=".$birthday."&phone=".$phone."&city=".$city."&country=".$country);
    exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $uid))
  {
    header("Location: edit_profile.php?error=invalidmailuid=".$first."&last=".$last."&birthday=".$birthday."&phone=".$phone."&city=".$city."&country=".$country);
    exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
    header("Location: edit_profile.php?error=invalidmail&first=".$first."&last=".$last."&uid=".$uid."&birthday=".$birthday."&phone=".$phone."&city=".$city."&country=".$country);
    exit();
  }
  else if(!preg_match("/^[a-zA-Z0-9]*$/", $uid))
  {
    header("Location: edit_profile.php?error=invaliduid&first=".$first."&last=".$last."&mail=".$email."&birthday=".$birthday."&phone=".$phone."&city=".$city."&country=".$country);
    exit();
  }
  else if($password !== $confirmPassword)
  {
    header("Location: edit_profile.php?error=passwordnotmatch&first=".$first."&last=".$last."&uid=".$uid."&mail=".$email."&birthday=".$birthday."&phone=".$phone."&city=".$city."&country=".$country);
    exit();
  }
  else
  {
    $id = $_SESSION['id'];
    $insert = "UPDATE users SET first=?, last=?, pro_img_path=?, cover_img_path=?, phone=?, city=?, country=?, email=?, gender=?, birthday=? WHERE id=$id;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $insert))
    {
      header("Location: edit_profile.php?error=sqlerror&first=".$first."&last=".$last."&uid=".$uid."&mail=".$email."&birthday=".$birthday."&phone=".$phone."&city=".$city."&country=".$country);
      exit();
    }
    else
    {

      //UPLOADING PROFILE & COVER PHOTO
      $dir = "users"; // files directory
      // Generating random string to protect files
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

      //Geting IMAGE file extension (function)
      function getFileExt($file_name) {
        return pathinfo($file_name, PATHINFO_EXTENSION);
      }
      //UPLOADING COVER PHOTO
      // $pro_img_path = $dir."/".date("YmdHis").genRandStr(10).".".getFileExt($profile_image_name)."?verify=".$_SESSION['user_identity'];
      $pro_img_path = $dir."/".date("YmdHis").genRandStr(10).".".getFileExt($profile_image_name);
      move_uploaded_file($profile_photo, $pro_img_path);
      //UPLOADING COVER PHOTO
      // $cover_img_path = $dir."/".date("YmdHis").genRandStr(10).".".getFileExt($cover_image_name)."?verify=".$_SESSION['user_identity'];
      $cover_img_path = $dir."/".date("YmdHis").genRandStr(10).".".getFileExt($cover_image_name);
      move_uploaded_file($cover_photo, $cover_img_path);

      // FINALY BINDING PARAMETERS AND EXECUTING SQL
      mysqli_stmt_bind_param($stmt, "ssssssssss", $first, $last, $pro_img_path, $cover_img_path, $phone, $city, $country, $email, $gender, $birthday);
      mysqli_stmt_execute($stmt);
      
      header("Location: edit_profile.php?edit=success");
      exit();
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