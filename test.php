<?php

    $db = new SQLite3("db.db");
    $date = 'сегодня в ' . date("H:i");
    $name = 'test';
    $message = 'Lorem ipsum dolor sit amet';
    $db->query($sql);
    $lastid = $db->lastInsertRowid();

    echo $lastid;
?>
