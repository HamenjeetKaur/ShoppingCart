<?php 
 session_start();

if (isset($_POST['add'])){
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

  if (isset($_POST['rem'])){
      $_SESSION['p_counter']=$_SESSION['p_counter']-1;

      unset($_SESSION['p_name'][$_POST['pos_p']]);
      unset($_SESSION['price'][$_POST['pos_p']]);
      unset($_SESSION['image'][$_POST['pos_p']]);
  
      $_SESSION['p_name']=$_SESSION['p_name'];
      $_SESSION['price']=$_SESSION['price'];
      $_SESSION['image']=$_SESSION['image'];
   }


?>

<?php
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
      <nav class="navbar navbar-expand-lg navbar-light">
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
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="contact.php">Contact</a>
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
              <form action="" method="POST">
               <button type="submit" name="del" class="btn-info">Clear Cart</button>
              </form>
            </ul>
          </div>
        </div>
      </nav>
    </div>

    
    <table class="table">
      <thead>

        <tr>
         <th scope="col">Item No.</th>
          <th scope="col">Image</th>
          <th scope="col">Product</th>
          <th scope="col">Price</th>
          <th scope="col">Quantity</th>
          <th scope="col">Total</th>
        </tr>
      </thead>
      <tbody>
<?php
    if(isset($_SESSION['p_name'])){

    $filtered_array=array_unique($_SESSION['p_name']);
    $sub_total=0;
    $number=1;
    foreach($filtered_array as $row){
   
    $item_repeated=array_count_values($_SESSION['p_name']);
    $find_position_in_array=array_search($row,$_SESSION['p_name']);
   
    $quan=$item_repeated[$row];
    $price=$_SESSION['price'][$find_position_in_array];
    $total=$quan * $price;
    $sub_total += $total;

    ?>
<tr>
          <td><?php echo $number; ?></td>
          <td><img class= "c-img" src="<?php echo $_SESSION['image'][$find_position_in_array]?>" alt=""></td>
          <td><?php echo $row ?></td>
          <td><?php echo $_SESSION['price'][$find_position_in_array]?> CAD</td>
          <form action="" method="POST">
            <input type="hidden" name="pos_p" value="<?=$find_position_in_array?>">
            <input type="hidden" name="p_name" value="<?=$row?>">
            <input type="hidden" name="price" value="<?=$_SESSION['price'][$find_position_in_array]?>">
            <input type="hidden" name="image" value="<?=$_SESSION['image'][$find_position_in_array]?>">
          <td>  <button type="submit" name="rem" class="btn-info"> - </button>
          <?php echo $item_repeated[$row] ?>
          <button type="submit" name="add" class="btn-info"> + </button>
          </td>
          </form>
          <td><?php echo $total ?> CAD</td>
</tr>

    <?php 
    $number++;
    }
    }
?>

<tr>
    <td colspan="4" class="text-end"><strong>Grand Total:</strong></td>
    <td><strong><?php if(isset($_SESSION['p_name'])){ echo $sub_total; } else {echo "0";}?> CAD </strong></td>
</tr>

        
        

</tbody>
    </table>

    <div class="footer mt-4">
        <div class="row">
            <div class="text-center">
                <p>Developed by Hamenjeet Kaur &copy; 2024</p>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js" ></script>

  </body>
</html>    