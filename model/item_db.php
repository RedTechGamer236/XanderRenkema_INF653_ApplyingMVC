<?php
function get_items_by_category($category_id) {
    global $db;
    $query = 'SELECT * FROM todoitems WHERE categoryID = :category_id ORDER BY ItemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}

function get_items() {
    global $db;
    $query = 'SELECT * FROM todoitems ORDER BY ItemNum';
    $statement = $db -> prepare($query);
    $statement -> execute();
    $items = $statement -> fetchAll();
    $statement -> closeCursor();
    return $items;
}

function delete_item($item_id) {
    global $db;
    $query = 'DELETE FROM todoitems WHERE ItemNum = :itemID';
    $statement = $db -> prepare($query);
    $statement -> bindValue(':itemID', $item_id);
    $statement -> execute();
    $statement -> closeCursor();
}

function add_item($title, $description, $category_id) {
    global $db;
    $query = 'INSERT INTO todoitems (Title, Description, categoryID) VALUES (:item, :descr, :category_id)';
    $statement = $db -> prepare($query);
    $statement -> bindValue(':item', $title);
    $statement -> bindValue(':descr', $description);
    $statement -> bindValue(':category_id', $category_id);
    $statement -> execute();
    $statement -> closeCursor();
}