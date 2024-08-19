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
?>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add product</h1>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="col-md-8 offset-2 ">
      <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
          <h6 class="m-0 font-weight-bold text-primary">Tap to add a product</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
          <div class="card-body">
            <form method="POST" action="../controllers/productControllers.php?action=create" enctype="multipart/form-data">


              <div class="mb-3">
                <label for="name" class="form-label">product name</label>
                <input type="name" class="form-control" id="nom" name="nom" aria-describedby="emailHelp">

              </div>
              <div class="mb-3">
                <label for="number" class="form-label">product price</label>
                <input type="number" class="form-control" id="price" name="price">
              </div>


              <div class="mb-3">
                <label for="number" class="form-label">product quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required >
           
              </div>
    

              <div class="mb-3">
                <label for="formFile" class="form-label">image</label>
                <input class="form-control" type="file" id="image" name="image">
              </div>
              <div class="mb-3">
                <label for="category" class="form-label"> product categoryId</label>
                <select class="form-control" name="categoryId" id="category_Id">
                  <?php
                  foreach ($categories as $cat) { ?>
                    <option value="<?php echo $cat->id; ?>">
                      <?php echo $cat->libelle; ?></option>


                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div>
              <button type="submit" class="btn btn-primary"id="ajout">Submit</button>
            </form>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>



</div>
</div>

<!-- <script>
  const champ = document.getElementById('quantity');
  champ.addEventListener('input',() =>{
    if(champ.validity.typeMismatch){
      champ.setCustomValidity('vous devez entrez un nombre');
    }else{
      champ.setCustomValidity('');
    }
  });
</script> -->
<?php
include './layouts/footer.php';
?>