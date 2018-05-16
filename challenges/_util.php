<?php
/**
 * @param SQLite3 $db
 * @param string $query
 * @return string
 */
function query2table(SQLite3 $db, $query)
{
    if ($query === '')
    {
        return "";
    }
    $table = "<table border='1'><thead><tr>";
    $res = $db->query($query);
    for ($i=0;$i<$res->numColumns();$i++)
    {
        $table .= "<th>{$res->columnName($i)}</th>";
    }

    $table .= "</tr></thead><tbody>";
    while ($row = $res->fetchArray(SQLITE3_NUM))
    {
        $table .= "<tr>";
        for ($i=0;$i<$res->numColumns();$i++)
        {
            $table .= "<td>{$row[$i]}</td>";
        }
        $table .= "</tr>";
    }
    $table .= "</tbody></table>";
    return $table;
}