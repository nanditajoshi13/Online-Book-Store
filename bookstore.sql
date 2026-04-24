<?php
include("includes/header.php");
include("includes/config.php");

$query = "";
if (isset($_GET['query'])) {
    $query = mysqli_real_escape_string($conn, $_GET['query']);
}

$sql = "SELECT * FROM books 
        WHERE title LIKE '%$query%' 
           OR author LIKE '%$query%' 
        ORDER BY id DESC";

$result = mysqli_query($conn, $sql);
?>

<div class="container mt-4">
  <h2>Search Results for "<?php echo htmlspecialchars($query); ?>"</h2>
  <div class="row">
    <?php
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
      echo "<p>No books found matching your search.</p>";
    }
    ?>
  </div>
</div>

<?php include("includes/footer.php"); ?>
