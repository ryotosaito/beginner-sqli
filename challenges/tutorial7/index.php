<?php
$db = new PDO('mysql:host='.getenv('DB7_HOST').';port='.getenv('DB7_PORT', 3306).';dbname='.getenv('DB7_DATABASE').';', getenv('DB7_USERNAME'), getenv('DB7_PASSWORD'));
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
$table = "<table border='1'>";
if (!empty($res))
{
    $table .= "<thead><tr>";
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
    $table .= "</tbody>";
}
$table .= "</table>";
echo $table;
?>
</body>
</html>
