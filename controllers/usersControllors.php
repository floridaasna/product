<?php
require_once "./controller.php";
$action = $_GET["action"];
if ($action == "create") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $user = $userdb->readCompte($login, $password);
    if ($user == false) {
        $usersdb->create($nom, $prenom, $telephone, $email, $login, $password, $role);
        // header("location:../users/add-users.php?error-");
    } else {
        // header("location:../users/users.php?error");
    }
}
if ($action == "update") {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $usersdb->update($id, $nom, $prenom, $telephone, $email, $login, $password, $role);
    // header("location:../views/listproduct.php?update_success=true");
}
if ($action == "delete") {
    $id = $_GET['id'];
    $usersdb->delete($id);
    // header("location:../views/listproduct.php?delete_success=true");
}
