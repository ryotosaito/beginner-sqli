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
    <h1>A very beginning</h1>
    <p>Find the flag from 'flag' table.</p>
    <form action="index.php">
        <input type="text" name="query" size="50" placeholder="query">
    </form>
    <?php
    if (isset($_REQUEST['query']))
    {
        $db = new SQLite3('db.sqlite');
        echo query2table($db, $_REQUEST['query']);
    } ?>
</body>
</html>