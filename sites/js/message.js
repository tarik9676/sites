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