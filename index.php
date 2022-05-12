<?php
session_start();
if (isset($_SESSION['alerts']))   {echo '<div class="alert">' . $_SESSION['alerts'] . '</div>';$_SESSION['alerts'] = null;}
?>
<form name='form' method='post' action="user_check.php">

    Name: <input type="text" name="name" id="name" ><br/>
    Password: <input type="password" name="password" id="password" ><br/>

    <input type="submit" name="submit" value="Submit">

</form>

<a href="/register.php">
    <input type="submit" value="Зарегистрироваться"/>
</a>