<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location:../index.php');
}?>
<?php
require_once "../modele/CategoryBD.php";
$categorydb = new CategoryDB;
$categories = $categorydb->readAll();


?>
<?php
include './layouts/sidebar.php';
include './layouts/navbar.php';
?>           <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">list category</h1>
                        
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
                                                <th>Name</th>
                                                <th>description</th>
                                               
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                          if ($categories != null  && (sizeof($categories)!=0)) {
                                            $i=1;
                                            foreach($categories as $cat){
                                     $delete='../controllers/categoryControllers.php?action=delete&id=' . $cat->id;
                                       $update='update.php?id=' . $cat->id;  
                                          
                                          
                                          ?>
                                         
                                         
                                         
                                           
        
                                          
                                            <tr>
                                                <td><?php echo $i++ ;?></td>
                                                <td> <?php echo $cat->libelle ;?></td>
                                                <td> <?php echo $cat->description; ?></td>
                                               
                                                <td><div class="text-center" ><a href="#" class="btn btn-success btn-circle" style="align-items:center" 
                                                onclick= "document.location.href='<?php echo $update ;?>'"
                                                >
                                                    <i class="fas fa-pen" ></i>
                                                </a>
                                                <a href="#" class="btn btn-warning btn-circle">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger btn-circle" onclick="document.location.href='<?php echo $delete ; ?>'">
                                                    <i class="fas fa-trash"></i>
                                                </a></div></td>
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
                <?php
         include './layouts/footer.php';
         ?>    