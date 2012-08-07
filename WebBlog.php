<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="the link to your css stylesheet">
        <title>Blog</title>
        <?php
        
        $dbc = mysql_connect("server-location", "usrnam", "passwrd");
        $db_sel = mysql_select_db("database-name", $dbc);
        $query = "SELECT * FROM blog ORDER BY date DESC";
        $rquery = mysql_query($query,$dbc);
        ?>
    </head>
    <body>
        <h1>My Blog.</h1>
        <p>The blog info goes here</p>
    <?php
    $row = mysql_num_rows($rquery);
    $i = 0;
            while($i < $row)
            {
            
            $title = mysql_result($rquery, $i, 'title');
            $post_raw = mysql_result($rquery, $i, 'post');
            $time = mysql_result($rquery, $i, 'date');
            echo " <h3>$title</h3>
            <p>$post_raw</p>";
            $i++;
            
            }
    ?>
    </body>
</html>