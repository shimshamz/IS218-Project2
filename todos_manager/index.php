<?php
session_set_cookie_params (0, "/~sm2292/IS218-Project2/", "web.njit.edu");
session_start();

require('../model/database.php');
require('../model/accounts_db.php');
require('../model/todos_db.php');
include('myfunctions.php');

gatekeeper();

$email = $_SESSION["email"];
$password = $_SESSION["password"]; 

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_todos';
    }
}

if ($action == 'list_todos') {
    $ownerID = get_id($email, $password);
    $fname = get_fname($email, $password);
    $lname = get_lname($email, $password);
    $todos = get_todos($ownerID);
    include('todo_list.php');
} else if ($action == 'delete_todo') {
    $id = filter_input(INPUT_POST, 'todo_id', 
            FILTER_VALIDATE_INT);
    delete_todo($id);
    if ($id == NULL || $id == FALSE) {
        $error = "Missing or incorrect to-do id.";
        include('../errors/error.php');
    } else { 
        delete_todo($id);
        header("Location: .?action=list_todos");
    }
} else if ($action == 'edit_todo_form') {
	$id = filter_input(INPUT_POST, 'todo_id', 
            FILTER_VALIDATE_INT);
	$duedate = filter_input(INPUT_POST, 'todo_duedate');
	$message = filter_input(INPUT_POST, 'todo_message');
	include('todo_edit_form.php');       
} else if ($action == 'save_todo') {
    $id = filter_input(INPUT_POST, 'todo_id', 
            FILTER_VALIDATE_INT);
	$duedate = filter_input(INPUT_POST, 'duedate');
	$message = filter_input(INPUT_POST, 'message');
	update_todo($id, $duedate, $message);
	header("Location: .?action=list_todos");
} else if ($action == 'add_todo_form') {
    include('todo_add.php')
} else if ($action == 'add_todo') {
	$ownerID = get_id($email, $password);
    $duedate = filter_input(INPUT_POST, 'duedate');
	$message = filter_input(INPUT_POST, 'message');
	if ($duedate == NULL || $duedate == FALSE ||
		$message == NULL || $message == FALSE) {
        $error = "Invalid data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        new_todo($email, $ownerID, $duedate, $message);
        header("Location: .?action=list_todos");
    }
} else if ($action == 'complete_todo') {
    complete_todo();
    header("Location: .?action=list_todos");
} 
?>