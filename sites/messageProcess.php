<?php
session_start();

$user = $_POST['uid'];

// GET THE MESSAGE CONTAINING JSON FILE
$current_data = file_get_contents('inbox/' . $_SESSION['UID'] . '/' . $user . '.json');
$count = file_get_contents('inbox/' . $_SESSION['UID'] . '/' . $user . '.txt');
$array_data = json_decode($current_data, true); // DECODE JSON TO STRING

// SET THE OBJECT'S VALUES FOR JSON(STORE) FILE
date_default_timezone_set("Asia/Dhaka");
$date = date("d-M-Y");
$time = date("h:i:sa");
$message = $_POST['message'];

// SET ASSOCIATIVE ARRAY FOR JSON FILE
$data = array(
    'from' => $_SESSION['UID'],
    'date' => $date,
    'time' => $time,
    'message' => $message
);

$array_data[] = $data;
$final_data = json_encode($array_data); // CONVERTING INTO JSON

// APPEND DATA IF EVERYTHING IS READY
if(!isset($final_data)){
    echo "Data appending Failed";
}else{
    if($message != null){

        $your_json       = 'inbox/' . $_SESSION['UID'] . '/' . $user . '.json';
        if(file_exists($your_json)){
            file_put_contents($your_json, $final_data);
        }else{
            echo $your_json . " not found !!";
        }

        $frnd_json       = 'inbox/' . $user . '/' . $_SESSION['UID'] . '.json';
        if(file_exists($frnd_json)){
            file_put_contents($frnd_json, $final_data);
        }else{
            echo $frnd_json . " not found !!";
        }

    }
}


?>