<?php
require_once "./Controller.php";
$action = $_GET["action"];
if ($action == "create") {
    $libelle = $_POST['libelle'];
    $description = $_POST['description'];

    $CategoryDB->create($libelle, $description);
    header("location:../views/listcategory.php?createsucces=true");
}
if ($action == "update") {
    $id = $_POST['id'];
    $libelle = $_POST['libelle'];
    $description = $_POST['description'];

    $CategoryDB->update($id, $libelle, $description);
    header("location:../views/listcategory.php?updatesuccess=true");
}
if ($action == "delete") {
    $id = $_GET['id'];
    $CategoryDB->delete($id);
    header("location:../views/listcategory.php?deletesuccess=true");
}
