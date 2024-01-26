<?php
session_start();

if(isset($_POST['submit'])){

    if(isset($_SESSION['p_counter'])){
        $_SESSION['p_counter']=$_SESSION['p_counter']+1;
       
      
    }else{
        $_SESSION['p_counter']=1;
        $_SESSION['p_name']=array();
        $_SESSION['price']=array();
        $_SESSION['image']=array();
    }

    $_SESSION['p_name'][$_SESSION['p_counter']]=$_POST['p_name'];
    $_SESSION['price'][$_SESSION['p_counter']]=$_POST['price'];
    $_SESSION['image'][$_SESSION['p_counter']]=$_POST['image'];
    
}

if(isset($_POST['del'])){
session_destroy();
}
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
    <div class="col-md-12">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="#">Farm Shop</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Contact</a>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>  
            </form>
            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="cart.php">Cart <span class="badge bg-secondary"><?php  if(isset($_SESSION['p_counter'])){  echo $_SESSION['p_counter']; }else{ echo "0"; } ?></span></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>

    <div class="hero-area">
      <div class="container">
      <div class="row">
      <div class="col-md-6 text-center hero-txt">
      <h2>Welcome to Farm Shop</h2>
      <h4>A place to get all your needs.</h4>
      <form action="" method="POST">
         <button type="submit" name="del" class="btn-info">Clear Cart</button>
      
      </form>
      </div>
      <div class="hero-img col-md-6">
        <img src="img/1.jpg" class="img-fluid" alt="">
      </div>
      </div>

      <div class="product-area text-center">
        <div class="container">
        <h1>Grocery Items</h1>
        <div class="row">

        <div class="item col-md-4">
          <form action ="" method="POST">
          <input type="hidden" name="image" value="img/p1.jpg">
         <img src="img/p1.jpg" class="item-img img-fluid" alt="">
          <input type="hidden" name="p_name" value="Table Salt">
          <input type="hidden" name="price" value="CAD $4.50">
          <BUTTON TYPE="Submit" class="btn-info" name="submit">Add to Cart</button>
          </form>
        </div>

        <div class="item col-md-4">
          <form action="" method="POST">
          <input type="hidden" name="image" value="img/p2.jpg">
          <img src="img/p2.jpg" class="item-img img-fluid" alt="">
          <input type="hidden" name="p_name" value="Granuled Cane Sugar">
          <input type="hidden" name="price" value="CAD $5.99">
          <BUTTON TYPE="Submit" class="btn-info" name="submit">Add to Cart</button>
          </form>


        <div class="item col-md-4">
          <form action ="" method="POST">
          <input type="hidden" name="image" value="img/p2.jpg">
          <img src="img/p2.jpg" class="item-img img-fluid" alt="">
          <input type="hidden" name="p_name" value="Large Size Eggs">
          <input type="hidden" name="price" value="CAD $4.78">
          <BUTTON TYPE="Submit" class="btn-info" name="submit">Add to Cart</button>
          </form>
        </div>
      </div>
    </div>
    </div>
    </div>

    <div class="footer">
        <div class="row">
          <div class="text-center">
            <p>Developed by Hamenjeet Kaur &copy; 2024</p>
          </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js" ></script>

  </body>
</html>