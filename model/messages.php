<?php

include_once('model/db.php');

function messagesAll() : array{
    $sql = "SELECT * FROM messages ORDER BY dt_add DESC";
    $query = dbQuery($sql);
    return $query->fetchAll();
}

function messagesAdd(array $fields) : bool{
    $sql = "INSERT messages (name, text) VALUES (:name, :text)";
    dbQuery($sql, $fields);
    return true;
}

// can return array or null
function messagesOne(int $id) : ?array{
    $sql = "SELECT * FROM messages WHERE id_message=:id";
    $query = dbQuery($sql, ['id' => $id]);
    $res = $query->fetch(); // from docs, arr || bool
    return $res === false ? null : $res;
}