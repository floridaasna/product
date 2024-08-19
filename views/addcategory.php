<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location:../index.php');
}?>
<?php
include './layouts/sidebar.php';
include './layouts/navbar.php';
?>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add category</h1>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="col-md-8 offset-2 ">
      <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
          <h6 class="m-0 font-weight-bold text-primary">Tap to add a category</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
          <div class="card-body">
            <form method="POST" action="../controllers/categoryControllers.php?action=create">

              <div class="mb-3">
                <label for="text" class="form-label">category name</label>
                <input type="text" name="libelle" class="form-control" id="text" aria-describedby="number">

              </div>

              <div class="mb-3">
                <label for="text" class="form-label">category description</label>
                <input type="text" name="description" class="form-control" id="examplenumber">
              </div>


              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div>
              <button type="submit" class="btn btn-primary" id="ff">Submit</button>
            </form>
          </div>
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