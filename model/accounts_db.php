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

function add_account($email, $fname, $lname, $phone, $birthday, $gender, $password) {
    global $db;
    $query = 'INSERT INTO accounts (email, fname, lname, phone, birthday, gender, password)
                VALUES (:email, :fname, :lname, :phone, :birthday, :gender, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":fname", $fname);
    $statement->bindValue(":lname", $lname);
    $statement->bindValue(":phone", $phone);
    $statement->bindValue(":birthday", $birthday);
    $statement->bindValue(":gender", $gender);
    $statement->bindValue(":password", $password);
    $statement->execute();
    $statement->closeCursor();
}

 ?>