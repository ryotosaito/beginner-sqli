<?php
$query = "SELECT * FROM members LEFT JOIN groups ON members.group_id = groups.id;";
if (isset($_REQUEST['query']) && $_REQUEST['query'] !== '')
{
    $query = $_REQUEST['query'];
}
?>
<html>
<head>
    <title></title>
</head>
<body>
<h1>Who is the liar?</h1>
<p>
    Here is the m1z0r3 member list.<br>
    What? This is not real data, really?
</p>
<hr>
<h2>Members' page</h2>
<form action="index.php">
    <input type="text" name="query" size="30" placeholder="query"
           value="<?= $query ?>">
</form>
<?php
$res = $db->query($query);
$table = "<table border='1'><thead><tr>";
for($i=0;$i<$res->columnCount();$i++)
{
    $table .= "<th>".$res->getColumnMeta($i)["name"]."</th>";
}
$table .= "</tr></thead><tbody>";
while ($row = $res->fetch())
{
    $table .= "<tr>";
    for ($i=0;$i<$res->columnCount();$i++)
    {
        $table .= "<td>{$row[$i]}</td>";
    }
    $table .= "</tr>";
}
$table .= "</tbody></table>";
echo $table;
?>
</body>
</html>
