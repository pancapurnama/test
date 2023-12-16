<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit;
}

include "header.php";

$handle = fopen("krs_mhs.csv", "r");
echo "<table border='1'>";
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    echo "<tr>";
    foreach ($data as $cell) {
        echo "<td>$cell</td>";
    }
    echo "</tr>";
}
echo "</table>";

fclose($handle);

include "footer.php";