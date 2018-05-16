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
    <h1>Chaotic string</h1>
    <p>Obtain the original flag from 'flag' table.</p>
    <form action="index.php">
        <input type="text" name="query" size="50" placeholder="query">
    </form>
    <form action="index.php">
        <input type="text" name="remove_space" size="50" placeholder="hint: copy table and paste here.">
    </form>
    <?php
    if (isset($_REQUEST['query']))
    {
        $db = new SQLite3('db.sqlite');
        echo query2table($db, $_REQUEST['query']);
    } ?>
    <?php
    if (isset($_REQUEST['remove_space']))
    {
        echo "<p>".str_replace(' ', '',$_REQUEST['remove_space'])."</p>";
    } ?>
</body>
</html>