<?php
            $username= "usrnam";
            $password= "passwd";
            if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) {
            header('WWW-Authenticate: Basic realm="App info goes here"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'You are not allowed to access this information';
            exit;
            }
            else
            {
            echo 'Welcome '.$_SERVER['PHP_AUTH_USER'];
            }
?>