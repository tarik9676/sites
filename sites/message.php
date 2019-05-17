<?php
    require_once 'header.php';

    session_start();
    
    if (!isset($_SESSION['UID']) || !isset($_GET['to'])) {
        header("Location: index.php");
    }

    $me = $_SESSION['UID'];
    $friend = $_GET['to'];

    function message_files($value1, $value2) {
        $dir = "inbox/" . $value1;
        $file = $dir . "/" . $value2 . ".json";

        if (!file_exists($file) && isset($_SESSION['UID'])) {
            mkdir($dir, 0775, true);
            $opened_file = fopen($file, "w") or die("Unable to open file");

            fclose($opened_file);
        }
    }

    message_files($me, $friend);
    message_files($friend, $me);
?>

<link rel="stylesheet" href="css/message.css">
<div class="container p-5">

    <h2 class="text-center">Messenger</h2>

    <div class="row mt-5">
        <div class="col-9">
            <div id="chatBox">

                <div id="chat"></div>
                <div id="enter">
                    <input class="form-control" type="text" id="send-text" placeholder="Write a message...">
                    <button type="button" class="btn btn-primary btn-sm" id="sendButton">
                        <span class="glyphicon glyphicon-send"></span> Send 
                    </button>
                </div>
                
            </div>
        </div>

        <div class="col-3">
            <p class="well font-weight-bold"><?php echo "Username : ". $_SESSION['UID'];?></p>
            <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
    </div>

        <script>
                // LOADING MESSAGE LIVE
            function loadMessage() {
                var xhr = new XMLHttpRequest;
                var url = "liveMessage.php";
                var user = "<?php echo $_GET['to']?>";
                var vars = "uid=" + user;
                xhr.open("POST", url, true);

                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var return_data = xhr.responseText;
                        document.getElementById('chat').innerHTML = return_data;
                    }
                }
                xhr.send(vars);
                setTimeout(loadMessage, 1000);
            };
            loadMessage();

            // SENDING MESSAGE ON CLICK SEND BUTTON
            var sendButton = document.getElementById('sendButton');

            sendButton.addEventListener('click', function() {
                var xhr = new XMLHttpRequest;
                var url = "messageProcess.php";
                var messg = document.getElementById('send-text').value;
                var user = "<?php echo $_GET['to']?>";
                var vars = "message=" + messg + "&uid=" + user;
                xhr.open("POST", url, true);

                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                xhr.send(vars);
            });


            // CLEAR INPUT MESSAGE ON CLICK SEND BUTTON
            sendButton.addEventListener('click', function(event) {
                var inputElements = document.getElementsByTagName('input');

                for (var i = 0; i < inputElements.length; i++) {
                    if (inputElements[i].type == "text") {
                        inputElements[i].value = "";
                    }
                }


                $(document).ready(function() {
                    var chat = $("#chat");
                    chat.stop().animate({
                        scrollTop: $("#chat").height() + 10000 /*$("#chat").position().top*/
                    }, 100, 'swing');
                });
            });
        </script>

    <!--END YOUR CODE HERE-->
</div>

<?php require_once 'footer.php';?>