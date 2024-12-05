<?php

try {
    $dbh = new PDO(MYSQL_HOST, MYSQL_USER, MYSQL_PASS);
} catch (PDOException $e) {
    echo $e->getMessage();
    die;
}
