<?php 
include("includes/header.php"); 
include("includes/config.php"); 
?>

<form method="GET" action="search.php" class="form-inline mb-4">
  <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search books...">
  <button class="btn btn-outline-success" type="submit">Search</button>
</form>

<h2>New Arrivals</h2>
<div class="row">
  <?php
  $result = mysqli_query($conn, "SELECT * FROM books ORDER BY id DESC ");
  if ($result && mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      echo "<div class='col-md-3'>
              <div class='card mb-4'>
                <img src='".$row['image_url']."' class='card-img-top' alt='Book cover'>
                <div class='card-body'>
                  <h5 class='card-title'>".$row['title']."</h5>
                  <p class='card-text'>".$row['author']."</p>
                  <p class='card-text'>₹".$row['price']."</p>
                  <a href='".$row['description_url']."' target='_blank' class='btn btn-info btn-sm'>Details</a>
                  <a href='cart.php?add=".$row['id']."' class='btn btn-success btn-sm'>Add to Cart</a>
                </div>
              </div>
            </div>";
    }
  } else {
    echo "<p>No books found. Please add some sample data.</p>";
  }
  ?>
</div>

<!-- <h2 class="mt-5">Explore Categories</h2>
<div class="row">
  <div class="col-md-3"><a href="categories.php?cat=Fiction" class="btn btn-primary btn-block">Fiction</a></div>
  <div class="col-md-3"><a href="categories.php?cat=Non-Fiction" class="btn btn-primary btn-block">Non-Fiction</a></div>
  <div class="col-md-3"><a href="categories.php?cat=Academic" class="btn btn-primary btn-block">Academic</a></div>
  <div class="col-md-3"><a href="categories.php?cat=BestSeller" class="btn btn-primary btn-block">Best Sellers</a></div>
</div> -->

<?php include("includes/footer.php"); ?>
