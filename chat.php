<?php
session_start();
if(isset($_POST['chatcode'])) {
    $_SESSION['chatcode'] = $_POST['chatcode'];
}
error_reporting(E_ERROR | E_PARSE);
?>
<html>
<head>
    <title id="tit">chat <?php echo $_SESSION['chatcode']?></title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript">
        function getData(msg){
            var dif = 0;
            var dif2;
            var scroll = false;
            if (!msg)
                msg = "`";
            else {
                scroll = true;
                document.getElementById('msg').value = "";
            }


            var divid = 'res';
            $.ajax({
                url: 'getdata.php?message='+msg,
                success: function(html) {
                    var ajaxDisplay = document.getElementById(divid);
                    ajaxDisplay.innerHTML = html;

                }
            });

            if (scroll == true)
            setTimeout(function() {
                window.scrollTo(0, document.body.scrollHeight);
            }, 100);
        }
        function star()
        {

            timer(0);
            var delayInMilliseconds = 1100; //1 second

            setTimeout(function() {
                window.scrollTo(0, document.body.scrollHeight);
            }, delayInMilliseconds);
        }
        function timer(counter)
        {
            setInterval(function () {

                document.getElementById('timer').innerHTML = counter;
                counter = counter - 1;
                if (counter < 0)
                {
                    counter = 5;
                    getData();

                }
            }, 1000);
        }


    </script>
    <script>
        $(document).ready(function(){
            $('#msg').keypress(function(e){
                if(e.keyCode==13)
                    $('#myBtn').click();
            });
        });
    </script>
</head>
<body onload="star()">
<div style="text-align: center">
<div id="res"style="text-align: left;display: inline-block">  </div>
    <br>
<input id="msg" type="text" name="msg" autofocus>
<button id="myBtn" onclick="getData(document.getElementById('msg').value)">Send!</button>
<div>Время до обновления:   <span id="timer">5</span></div>
<a href="choose.php"><input type="submit" value="Назад"/></a>
</div>
</body>
</html>
