<?php
require __DIR__ . '/../vendor/autoload.php';
// $db = new \PDO('mysql:dbname=nerdzly;host=localhost;charset=utf8mb4', 'root', 'Qzectbum1');
// or
// $db = new \PDO('pgsql:dbname=my-database;host=localhost;port=5432', 'my-username', 'my-password');
// or
// $db = new \PDO('sqlite:../Databases/my-database.sqlite');

// or

 $db = new \Delight\Db\PdoDsn('mysql:dbname=nerdzly;host=localhost;port=3306;charset=utf8mb4', 'root', 'Qzectbum1');
// or
//$db = new \Delight\Db\PdoDsn('pgsql:dbname=my-database;host=localhost;port=5432', 'my-username', 'my-password');
// or
// $db = new \Delight\Db\PdoDsn('sqlite:../Databases/my-database.sqlite');

$auth = new \Delight\Auth\Auth($db);
