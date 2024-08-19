
<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location:../index.php');
}?>
<?php
require_once "../modele/productDB.php";
require_once "../modele/CategoryBD.php";
$categorydb = new CategoryDB;
$productdb = new productDB;
$products = $productdb->readAll();


?>

<?php
include './layouts/sidebar.php';
include './layouts/navbar.php';
?>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">list product</h1>
    <button onclick="exportToExcel()" class="btn btn-primary">export to excel</button>
    <button onclick="exportTofpdf()"  class="btn btn-primary">print</button>
       
    </div>
 
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>N</th>
                                <th>nom</th>
                                <th>price</th>
                                <th>quantity</th>
                                <th>image</th>
                                <th>categoryId</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($products != null  && (sizeof($products) != 0)) {
                                $i = 1;
                                foreach ($products as $prod) {
                                    $delete = '../controllers/productControllers.php?action=delete&id=' . $prod->id;
                                    $update = 'update1.php?id=' . $prod->id;
                                    $category = $categorydb->read($prod->categoryId);

                            ?>






                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td> <?php echo $prod->nom; ?></td>
                                        <td> <?php echo $prod->price; ?></td>
                                        <td> <?php echo $prod->quantity; ?></td>
                                        <td> <img src="image/<?php echo $prod->image;?>" alt="image du produit" widht="50" height="50"/></td>
                                        <td> <?php echo $category->libelle; ?></td>

                                        <td>
                                            <div class="text-center"><a href="#" class="btn btn-success btn-circle" onclick="document.location.href='<?php echo $update; ?>'">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <a href="#" class="btn btn-warning btn-circle">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                              
                                                <a href="#" class="btn btn-danger btn-circle"  onclick="document.location.href='<?php echo $delete; ?>'">
                                                    <i class="fas fa-trash" ></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                            <?php

                                }
                            }

                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

<?php
include './layouts/footer.php';
?>