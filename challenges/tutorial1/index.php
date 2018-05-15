<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
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
    if (isset($_REQUEST['query'])):
        $db = new SQLite3('db.sqlite');
        $res = $db->query($_REQUEST['query']);
        ?>
    <table border="1">
        <thead>
        <tr>
            <?php for ($i=0;$i<$res->numColumns();$i++): ?>
            <th><?= $res->columnName($i) ?></th>
            <?php endfor ?>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = $res->fetchArray(SQLITE3_ASSOC)):
        ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['content'] ?></td>
        </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
    <?php endif; ?>
</body>
</html>