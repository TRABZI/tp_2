<?php
$dbh = new PDO('mysql:host=db;dbname=mysql', 'root', 'passe');
foreach($dbh->query('SHOW MYTABLE') as $row) {
echo $row[0]. '<br/>';
}
