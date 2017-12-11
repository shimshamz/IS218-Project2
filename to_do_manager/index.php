<?php
require('../model/database.php');
require('../model/accounts_db.php');
require('../model/todos_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_todos';
    }
}
?>