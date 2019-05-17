<?php
session_start();

$user = $_POST['uid'];
$data = file_get_contents('inbox/' . $_SESSION['UID'] . '/' . $user . '.json');
$array_data = json_decode($data, true);

if($array_data == null){
    if (isset($_SESSION['UID'])) {
        echo "<p class='well text-success'>Say hi to " . $user ."</p>";
    }
}else{
    foreach($array_data as $row){

        if($row['from'] == $_SESSION['UID']){
            $id = "me";
        }else{
            $id = "friend";
        }
        
        // echo "<div id='inChat'><p id=" . $id . ">" . $row['message'] . "</p><i id=" . $id . ">" . $row['date'] . "<br>" . $row['time'] . "</i></div>";
        echo "<div id='inChat'><p id=" . $id . ">" . $row['message'] . "</p></div>"; //<i id=" . $id . ">" . $row['date'] . "<br>" . $row['time'] . "</i>;
    }
}
//display: none
if(!isset($_SESSION['UID'])){
    echo "You are not logged in !";
}
?>