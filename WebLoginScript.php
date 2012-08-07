<?php

// This script assumes that the login details have been submitted through a form field via POST. The details will then be stored in $userrname and $password.

$username = mysql_escape_string($_POST['username']);
$password = mysql_escape_string($_POST['password']);
$dbc = mysql_connect("server-location", "usrnam", "passwrd");
$db_sel = mysql_select_db("database-name", $dbc);
$query = "SELECT * FROM login WHERE username='$username' AND password=SHA('$password')";
$rquery = mysql_query($query, $dbc);
if(mysql_num_rows($rquery) == 0)
{
?>
<html>
<head>
<script>alert("Please login again. The information you provided was faulty!");</script>
<?php
sleep(2);
?>
<meta HTTP-EQUIV="REFRESH" content="1; url="the URL of the location you wish to redirect to.">
</head>
</html>
<?php
}
else
{
    session_start();
    $_SESSION['username'] = $username;
    ?>
    <meta http-equiv="refresh" content="600">
    <?php
    sleep(1);
    header('Location: index.php');
    }
?>