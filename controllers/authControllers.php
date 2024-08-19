<?php
require_once './controller.php';
$action = $_GET['action'];
if($action == 'login'){
    session_start();
    $login =$_POST['login'];
    $password =$_POST['password'];
    $user = $userdb->readCompte($login, $password);
            if($user != null){ 
$_SESSION['user'] =$user;
if($user->role == 'administrateur'){
    header('location: ../views/index.php');

}else{
    header('location: ../views/index.php');
}

            }else{
                header('location: ../index.php');
            }
}
if($action == 'logout'){
    session_start();
    $user =$_SESSION['user'];
    session_destroy();
    if($user->role == 'administrateur'){
        header('location: ../index.php');
    }else{
        header('location: ../index.php');
    }
}
?>