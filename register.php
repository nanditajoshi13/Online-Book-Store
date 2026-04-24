<?php
include("includes/header.php");
include("includes/config.php");
session_start();

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Insert new user with plain password
    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    if (mysqli_query($conn, $sql)) {
        $success = "Registration successful! You can now <a href='login.php'>login</a>.";
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<div class="container mt-5" style="max-width: 400px;">
  <h2 class="text-center mb-4">Register</h2>
  <?php 
    if ($error != "") echo "<div class='alert alert-danger'>$error</div>"; 
    if ($success != "") echo "<div class='alert alert-success'>$success</div>"; 
  ?>
  
  <form method="POST" action="register.php">
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" name="username" id="username" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success btn-block">Register</button>
  </form>

  <p class="mt-3 text-center">
    Already have an account? <a href="login.php">Login here</a>
  </p>
</div>

<?php include("includes/footer.php"); ?>
