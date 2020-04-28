<?php
define('dbhost','localhost');
define('dbuser','root');
define('dbpass','');
define('dbname','pabw');


$data = "mysqli:dbname=".dbname.";host".dbhost;
try {
  $dbh = new PDO("mysql:host=".dbhost.";dbname=".dbname,dbuser, dbpass);
} catch (PDOException $e) {
  echo "Koneksi Gagal !". $e ->getMessage();
}
