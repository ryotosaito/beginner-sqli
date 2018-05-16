<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
require "../_util.php";
?>
<html>
<head>
    <title></title>
</head>
<body>
    <h1>Where is my partner?</h1>
    <p>You must combine tables with a proper 'join'.</p>
    <form action="index.php">
        <input type="text" name="query" size="50" placeholder="query">
    </form>
    <?php
    $db = new SQLite3('db.sqlite');
    if (isset($_REQUEST['query']) && $_REQUEST['query'] !== '')
    {
        echo query2table($db, $_REQUEST['query']);
    }
    else { ?>
        <div style="max-width: 40%; float: left; margin-right: 10px">
            <h4 style="margin: 0;">flag_left</h4>
            <?= query2table($db, "SELECT * FROM flag_left;") ?>
        </div>
        <div style="max-width: 40%;">
            <h4 style="margin: 0;">flag_right</h4>
            <?= query2table($db, "SELECT * FROM flag_right;") ?>
        </div>
    <?php } ?>
</body>
</html>