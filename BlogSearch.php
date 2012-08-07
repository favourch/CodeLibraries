<html>
    <head>
        <title>Search results</title>
        <link rel="stylesheet" type="text/css" href="the link to your css stylesheet">
<?php

$rawsearch = // If you want data from a form field then use this - "$_POST['searchb'];" Otherwise, if you want to search raw data then use this - "'data-to-be-searched';".
$search = mysqli_escape_string($rawsearch);
$search = explode(' ', $search);
$dbc = mysql_connect("server-location", "usrnam", "passwrd");
        $db_sel = mysql_select_db("database-name", $dbc);
$query = "SELECT * FROM blog WHERE post LIKE '%$rawsearch%'";
$rquery = mysql_query($query,$dbc);
?>
    </head>
    <body>
<?php
    $row = mysql_num_rows($rquery);
    $i = 0;
            if($row == 0)
            {
                echo '<h3>No close matches!</h3><p>I am sorry, but your search query did not match any blog posts. Please try some other querry.</p>';
            }
            while($i < $row)
            {
            
            $title = mysql_result($rquery, $i, 'title');
            $post = mysql_result($rquery, $i, 'post');
            $time = mysql_result($rquery, $i, 'date');
            echo "<div id=content>
            <h3>$title</h3>
            <p>$post</p>
            <p><h5>Post has been posted on:</h5> &nbsp".substr($time, 0,10)."</p></div>";
            $i++;
            }
    ?>
    </body>
</html>