<?php
 $dbname = 'oist2017';
 $host = '192.168.205.199';
 $user = 'kagisen';
 $password = 'Pi=3.1+4';

try {
    $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8mb4', $user , $password);
    if ($pdo == null) {
        print_r('error failed!!!!!!!!!').PHP_EOL;
    }
} catch(PDOException $e) {
    echo('Connection failed:'.$e->getMessage());
    die();
}
?>
