<?php
require_once "./controller.php";
require_once "../modele/Upload.php";
$action = $_GET["action"];
if ($action == "create") {
    $nom = $_POST['nom'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    // $image = $_POST['image'];
    $image= $Upload->upload_image($_FILES['image'], 'image', '800','700','../views/image/');
    $categoryId = $_POST['categoryId'];
    $productDB->create($nom, $price, $quantity,$image, $categoryId);
    header("location:../views/listproduct.php?create_succes=true");
}
if ($action == "update") {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    // $image = $_POST['image'];
    $image= $Upload->upload_image($_FILES['image'], 'image', '800','700','../views/image/');
    $categoryId = $_POST['categoryId'];
   
    $productDB->update($id, $nom, $price, $quantity, $image, $categoryId);
    header("location:../views/listproduct.php?update_success=true");
}
if ($action == "delete") {
    $id = $_GET['id'];
    $productDB->delete($id);
    header("location:../views/listproduct.php?delete_success=true");
}
