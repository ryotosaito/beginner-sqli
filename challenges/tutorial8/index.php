<?php
require "../_util.php";
?>
<html>
<head>
    <title></title>
</head>
<body>
<h1>Reserved username</h1>
<p>
    Are you going to register?
    We'll tell you if your user ID can be used!
</p>
<form action="index.php">
    <input type="text" name="username" size="20" placeholder="username"
           value="<?= (isset($_REQUEST['username']) && $_REQUEST['username'] !== '') ? $_REQUEST['username'] : '' ?>"><br>
    <button type="submit">search</button>
</form>
<?php
if (isset($_REQUEST['username']))
{
    $db = new SQLite3('db.sqlite');
    $res = $db->query("SELECT * FROM users WHERE username = '${_REQUEST['username']}';");
    if ($res->fetchArray() !== false)
    {
        echo "<p>This ID is already used...</p>";
    }
    else
    {
        echo "<p>You can use this ID!</p>";
    }
} ?>
</body>
</html>