<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
require "../_util.php";
$query_pref = "SELECT name, price FROM product WHERE name LIKE '";
$query_suff = "'";
?>
<html>
<head>
    <title></title>
</head>
<body>
    <h1>Injection Introduction</h1>
    <p>
        Hahaha, I found the 'users' table schema!<br>
        There are 'name' and 'password' columns in it!
    </p>
    <hr>
    <h2>Mizore Fruit Store</h2>
    <form action="index.php">
        <?= $query_pref ?>
        <input type="text" name="query" size="30"
               value="<?= (isset($_REQUEST['query']) && $_REQUEST['query'] !== '') ? $_REQUEST['query'] : '%' ?>">
        <?= $query_suff ?>
    </form>
    <?php
    if (isset($_REQUEST['query']))
    {
        $db = new SQLite3('db.sqlite');
        echo query2table($db, $query_pref.$_REQUEST['query'].$query_suff);
    } ?>
    <?php
    if (isset($_REQUEST['remove_space']))
    {
        echo "<p>".str_replace(' ', '',$_REQUEST['remove_space'])."</p>";
    } ?>
</body>
</html>