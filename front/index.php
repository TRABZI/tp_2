<?php
$dbh = new PDO('mysql:host=db;dbname=mysql', 'amine', 'amine');
foreach($dbh->query('SHOW MYTABLE') as $row) {
echo $row[0]. '<br/>';
}
