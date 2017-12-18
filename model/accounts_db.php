<?php 
function get_id($email, $password) {
    global $db;
    $query = 'SELECT * FROM accounts
              WHERE email = :email AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":password", $password);
    $statement->execute();
    $account = $statement->fetch();
    $statement->closeCursor();
    $id = $account['id'];
    return $id;
}

function get_fname($email, $password) {
    global $db;
    $query = 'SELECT * FROM accounts
              WHERE email = :email AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":password", $password);
    $statement->execute();
    $account = $statement->fetch();
    $statement->closeCursor();
    $fname = $account['fname'];
    return $fname;
}

function get_lname($email, $password) {
    global $db;
    $query = 'SELECT * FROM accounts
              WHERE email = :email AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":password", $password);
    $statement->execute();
    $account = $statement->fetch();
    $statement->closeCursor();
    $lname = $account['lname'];
    return $lname;
}



 ?>