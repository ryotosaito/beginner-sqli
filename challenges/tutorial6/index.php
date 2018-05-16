<?php
require "../_util.php";
?>
<html>
<head>
    <title></title>
</head>
<body>
<h1>Guess the query</h1>
<p>
    I saw 'wasedataro' logged in into this page!<br>
    Do I need a password...?
</p>
<hr>
<h2>Members' page</h2>
<form action="index.php">
    <input type="text" name="username" size="20" placeholder="username"
           value="<?= (isset($_REQUEST['username']) && $_REQUEST['username'] !== '') ? $_REQUEST['username'] : '' ?>"><br>
    <input type="text" name="password" size="20" placeholder="password"><br>
    <button type="submit">Login</button>
</form>
<?php
if (isset($_REQUEST['username']) && isset($_REQUEST['password']))
{
    $db = new SQLite3('db.sqlite');
    $res = $db->query("SELECT * FROM users WHERE username = '${_REQUEST['username']}' AND password = '${_REQUEST['password']}';");
    if ($res->numColumns() > 0)
    {
        echo "<p>Welcome, ${_REQUEST['username']}!!<br>This is our page.</p><p>Flag: m1z0r3{sh0lder_h4ck1ng_1s_gu1lty}</p>";
    }
} ?>
</body>
</html>