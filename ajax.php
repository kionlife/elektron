<?php

if ($_GET['action'] == 'add') {
    $name = $_POST['name'];
    $message = $_POST['message'];
    add($name, $message);
}

if ($_GET['action'] == 'del') {
    $id = $_POST['id'];
    del($id);
}

if ($_GET['action'] == 'load') {
    load();
}

function add($name, $message) {
    $db = new SQLite3("db.db");
    $date = 'сегодня в ' . date("H:i");
    $sql = "INSERT INTO comments (name, message, datetime) VALUES ('$name', '$message', '$date')";
    $db->query($sql);
    $lastid = $db->lastInsertRowid();
    echo '<div class="post it'.$lastid.'"><button onclick="del('.$lastid.');" class="btnDel"><img src="./img/delete.png" alt=""></button><div class="rowTop"><div class="avatarPost"><img src="./img/deadpool.png" alt=""></div><div class="namePost"><p class="nameTitle">'.$name.'</p><p class="date">'.$date.'</p></div></div> <div class="rowBottom"><p>'.$message.'</p></div></div>';
}

function del($id) {
    $db = new SQLite3("db.db");
    $sql = "DELETE FROM comments WHERE id = '$id'";
    $db->query($sql);
}

?>
