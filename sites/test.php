<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>

    <h1>Hello, world !</h1>

    <?php

        // function genRandStr($length)
        // {
        //     // $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        //     $char = '01';
        //     $charLength = strlen($char);
        //     $randStr = "";

        //     for ($i=0; $i < $length; $i++)
        //     { 
        //         $randStr .= $char[rand(0, $charLength-1)];
        //     }
            
        //     require_once 'db.php';
        //     $sql = "SELECT user_identity FROM users WHERE user_identity = '$randStr';";
        //     $result = mysqli_query($conn, $sql);
        //     $row = mysqli_fetch_assoc($result);

        //     if (!mysqli_num_rows($result) > 0)
        //     {
        //         echo $randStr;
        //     }
        //     else
        //     {
        //         // I want to run the function again.
        //     }
        //     mysqli_close($conn);
        // }
          
        // // Echo the random string.
        // // Optionally, you can give it a desired string length.
        // echo genRandStr(1);
        echo "<br /><br />";

        date_default_timezone_set('Asia/Dhaka');
        // echo date("Ymd")."<br />";
        // echo date("H:i:s")."<br />";
        echo date("YmdHis");

        echo "<br /><br />";

        // $txt = "tarikul";
        // $txtencode = base64_encode($txt);
        // echo base64_decode($txtencode);
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
        echo date("YmdHis").genRandStr(5);
        
    ?>


    </body>
</html>