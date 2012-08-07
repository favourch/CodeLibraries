<?php
$dbc = mysql_connect("server-location", "usrnam", "passwrd");
$db_sel = mysql_select_db("database-name", $dbc);

$username = mysql_escape_string($_POST['new_username']);
$password = mysql_escape_string($_POST['new_password']);
$password_re = mysql_escape_string($_POST['new_password_re']);
$school = mysql_escape_string($_POST['school']);
$email = mysql_escape_string($_POST['email']);
$fname = mysql_escape_string($_POST['fname']);
$lname = mysql_escape_string($_POST['lname']);
$email = mysql_escape_string($_POST['email']);

if(!empty($username) && !empty($password) && !empty($password_re) && !empty($school) && ($password == $password_re)) {
    //To make sure some one else is not using the same username
    $query = "SELECT * FROM login WHERE username = '$username'";
    $data = mysql_query($query, $dbc);
    $row = mysql_num_rows($data);
    if($row == 0)
    {
        $query = mysql_query("INSERT INTO login(username, password, joindate, school, first_name, last_name, email_id) VALUES('$username', SHA('$password'), NOW(), '$school', '$fname', '$lname', '$email')");
        echo"<p>Your account has been created.</p>";
        sleep(1);
        ?>
        <meta HTTP-EQUIV=REFRESH content="0; url=URL TO REDIRECT TO AFTER CREATING ACCOUNT.">
            <?php
    }
    else
    {
        echo"<p>Sorry, an account already exists with this username, please select a different one.</p>";
        sleep(2);
        ?>
        <meta HTTP-EQUIV=REFRESH content="1; url=THE SAME URL OF THIS SAME PAGE.">
            <?php

    }
}
else
{
    echo"<p>We had an error. Please re-fill the form.</p>";
    sleep(2);
    ?>
    <meta HTTP-EQUIV=REFRESH content="0; url=THE SAME URL OF THIS SAME PAGE.">
    <?php
}
mysql_close($dbc);
?>
        