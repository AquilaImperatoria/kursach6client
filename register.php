

<?php
session_start();
if (isset($_SESSION['alerts']))   {echo '<div class="alert">' . $_SESSION['alerts'] . '</div>';$_SESSION['alerts'] = null;}
?>
<form name='form' method='post' action="register_query.php" onsubmit="return formValidation()">

    Name: <input type="text" name="name" id="name" ><br/>
    Password:<input type="password" name="password" id="password" ><br/>
    Repeat password:<input type="password" name="password_rep" id="password_rep" ><br/>
    <input type="submit" name="submit" value="Submit">

</form>
<script>
    function formValidation() {
        var result = true;
        if (document.getElementById("password").value !== document.getElementById("password_rep").value) {
            alert("Введенные пароли не совпадают!");
            result = false;
        }
        return result;
    }
</script>
<a href="index.php"><input type="submit" value="Назад"/></a>
