<?php

    session_start();

    $id = $_SESSION["id"];
    $sql = "SELECT * FROM users WHERE id = '$id';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $_SESSION['profile_photo'] = $row['pro_img_path'];
    $_SESSION['cover_photo'] = $row['cover_img_path'];
    
    header("Location: edit_profile.php?edit=success");
    exit();

    

?>