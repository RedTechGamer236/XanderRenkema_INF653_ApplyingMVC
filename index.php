<?php
require('model/database.php');
require('model/item_db.php');
require('model/category_db.php');

$item_id = filter_input(INPUT_POST, 'item_id', FILTER_VALIDATE_INT);
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if(!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if(!$action) {
        $action = 'list_items';
    }
}

switch($action) {
    case "show_add_form":
        $categories = get_categories();
        include 'view/add_item_form.php';
        break;
    case "add_item":
        $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
        $title = filter_input(INPUT_POST, 'title');
        $description = filter_input(INPUT_POST, 'description');
        if(!empty($title) && !empty($description)) {
            add_item($title, $description, $category_id);
            header("Location: .?action=list_items");
        } else {
            $error = "Invalid item data. Check all fields and try again.";
            include 'view/error.php';
        }
        break;
    case "delete_item":
        if($item_id) {
            delete_item($item_id);
            header("Location: .?action=list_items");
        } else {
            $error = "Missing or incorrect item id.";
            include 'view/error.php';
        }
        break;
    case "list_categories":
        $categories = get_categories();
        include 'view/category_list.php';
        break;
    case "add_category":
        $category_name = filter_input(INPUT_POST, 'category_name');
        if(!empty($category_name)) {
            add_category($category_name);
            header("Location: .?action=list_categories");
        } else {
            $error = "Invalid category data. Check all fields and try again.";
            include 'view/error.php';
        }
        break;
    case "delete_category":
        $category_id = filter_input(INPUT_POST, 'category_id');
        if($category_id) {
            delete_item($category_id);
            header("Location: .?action=list_items");
        } else {
            $error = "Missing or incorrect category id.";
            include 'view/error.php';
        }
        break;
    default:
        $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
        if($category_id == NULL || $category_id == FALSE) $category_id = 0;
        $categories = get_categories();
        if($category_id > 0) {
            $category_name = get_category_name($category_id);
            $items = get_items_by_category($category_id);
        } else {
            $items = get_items();
        }
        include 'view/item_list.php';
}