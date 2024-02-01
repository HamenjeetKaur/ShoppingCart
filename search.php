<?php
session_start();
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="style/style.css" rel="stylesheet" >
  </head>
  <body>
  <a id="cart-section"></a>
    <div class="col-md-12">
      <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container">
          <a class="navbar-brand" href="#">Farm Shop</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>

<h4>Results:</h4>

<table id="users">
  <tr>
    <th>Name</th>
    <th>Price</th>
  </tr>

  
<?php
if(isset($_POST['srch'])){

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shoping_cart";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    $sql= "SELECT `name`, `price` FROM `products` WHERE 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
  
  
        while($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>".$row["name"]."</td>";
          echo "<td>".$row["price"]."</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='2'>0 results</td></tr>";
      }
      $conn->close();
}

?>
</table>
<div class="footer mt-4">
        <div class="row">
            <div class="text-center">
                <p>Developed by Hamenjeet Kaur and Mehak Rajrana &copy; 2024</p>
            </div>
        </div>
    </div>
    
    <script src="js/bootstrap.bundle.min.js" ></script>


</body>
</html>

