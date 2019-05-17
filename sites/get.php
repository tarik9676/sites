<?php
// require_once 'db.php';    

// $id = addslashes($_REQUEST['id']);
// $type = addslashes($_REQUEST['type']);
// $sql = "SELECT * FROM users WHERE id=$id;";

// $image = mysqli_query($conn, $sql);
// $image = mysqli_fetch_assoc($image);

// if ($type == "profile")
// {
    // $image = $image['profile_image'];
    // header ("Content-type: image/jpeg");
    // echo $image;
// }
// elseif ($type == "cover")
// {
//     $image = $image['cover_photo'];
//     header ("Content-type: image/jpeg");
//     echo $image;
// }

// mysqli_close($conn);
// header ("Content-type: image/jpeg");
// echo $image;

require_once 'db.php';    

$id = addslashes($_REQUEST['id']);
$sql = "SELECT * FROM users WHERE id=$id;";

$image = mysqli_query($conn, $sql);
$image = mysqli_fetch_assoc($image);
$image = $image['profile_image'];

header ("Content-type: image/jpeg");
echo $image;
mysqli_close($conn);
?>