<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location:../index.php');
}?>
<?php
require_once "../modele/CategoryBD.php";
$categoryBD = new categoryDB();
$category = null;
if (isset($_GET['id'])){
    $category = $categoryBD->read($_GET['id']);
}else{
    header("location:listcategory.php");
}



?>



<?php
include './layouts/sidebar.php';
include './layouts/navbar.php';
?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-center mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Update category</h1>
                    </div>

                    <!-- Content Row -->
                 <div class="row">
                    <div class="col-md-8 offset-2 ">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Accordion -->
                            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                                role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                <h6 class="m-0 font-weight-bold text-primary">Tap to add a category</h6>
                            </a>
                            <!-- Card Content - Collapse -->
                            <div class="collapse show" id="collapseCardExample">
<?php 
if ($category != null){




?>



                                <div class="card-body">
                                   
                                
                                <form method="POST" action="../controllers/categoryControllers.php?action=update">
                                        <div class="mb-3">
                                        <input type="hidden" class="form-control" name="id" value= "<?php echo $category->id;?>">
                                        </div>
                                
                                <div class="mb-3">
                                            <label for="text" class="form-label">category name</label>
                                            <input type="text" class="form-control" id="libelle" aria-describedby="number" name="libelle" value="<?php echo $category->libelle;?>">
                                          
                                          </div>
                                        <div class="mb-3">
                                          <label for="name" class="form-label">category description</label>
                                          <input type="name" class="form-control" id="description " aria-describedby="text" name="description" value="<?php echo $category->description;?>">
                                         
                                        </div>
                                       

                                         
                                        <div class="mb-3 form-check">
                                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                          <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                      </form>
                                </div>
<?php
}


?>

                            </div>
                        </div>


                    </div>
                 </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                      
                    </div>
                </div>
                <!-- /.container-fluid -->
                <?php
        
        include './layouts/footer.php';
         ?>