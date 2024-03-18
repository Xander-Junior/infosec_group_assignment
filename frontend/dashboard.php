
<?php
session_start(); // Start the session at the very beginning

// Access control: Check if the user is logged in and has the 'Administrator' role
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'Administrator') {
    // Not an administrator, redirect to the login page
    header('Location: index.php');
    exit; // Important: prevent further script execution
}

// Your form processing logic here (if you're handling form submission on this page)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process your form data here
    // Example: Insert a new post into the database
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - QuickShop</title>
    
    <link rel="stylesheet" href="dashboard.css"> <!-- Adjust path as necessary -->
</head>
<body>
<header role="banner">
  <h1>Admin Panel</h1>
  <ul class="utilities">
    <br>
    <li class="users"><a href="#">My Account</a></li>
    <li class="logout warn"><a href="">Log Out</a></li>
  </ul>
</header>

<nav role='navigation'>
  <ul class="main">
    <li class="dashboard"><a href="dashboard.php">Dashboard</a></li>
    <li class="users"><a href="./manage_users.php">Manage Users</a></li>
    <li class="products"><a href="./manage_products.php"> Manage Products</a></li>
    <li class="orders"><a href="./manage_orders.php">Manage Orders</a></li>

  </ul>
</nav

<main role="main">
  
  <section class="panel important">
    <h2>Write Some News</h2>
    <ul>
      <li>Information Panel</li>
    </ul>
  </section>
  
  <section class="panel important">
    <h2>Write a post</h2>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="twothirds">
          Blog title:<br/>
          <input type="text" name="title" size="40"/><br/><br/>
          Content:<br/>    
          <textarea name="newstext" rows="15" cols="67"></textarea><br/>  
        </div>
        <div>
          <input type="submit" name="submit" value="Save" />
        </div>
        </div>
      </form>
  </section>

</main>



</body>
</html>

