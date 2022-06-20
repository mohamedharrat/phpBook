<?php 
// session_start();
require_once 'connection2.php';

$req = "SELECT * FROM book where id>=1 ";
$execu = $pdo->query($req);
// $result = $execu->fetch();
// echo "<pre>";
// print_r($result);
//  echo "</pre>";

if(isset($_GET['id'])) {
    $delete = "DELETE from book where id = $_GET[id]";
    $execDelete = $pdo->query($delete);
    if($execDelete) {
        header('location:tableau.php');
    }
}

// $execu = null;
if(isset($_POST['search'])) {

  if(empty($_POST['inputsearch'])) 
  {
    echo '<div class="alert alert-danger text-center" role="alert">
    Saisissez votre recherche !
  </div>';
  } 
  else {
    if (strlen(trim($_POST['inputsearch'])) < 3) {
          echo '<div class="alert alert-danger text-center" role="alert">
      Saisissez minimum trois lettres svp!
    </div>';
      
  } else {

    $sch = $_POST['inputsearch'];

    require_once 'connection2.php';

    
    $search = "SELECT * from book where title='$sch' or author='$sch'" ;
    $execu = $pdo->query($search);
    // $ress = $execc->fetch();
    // echo "<pre>";
    // print_r($ress);
    // echo "</pre>";

    echo '<div class="alert alert-success text-center" role="alert">
    search validate !
  </div>';
    // header('location:tableau.php');
  }
  
  }
}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <title>bookstore</title>
  </head>
  <body>
    
    <nav class="navbar navbar-dark bg-dark">
      <p class="text-light fs-3">BookStore</p>
      <div >
        <a href="index2.php" class="text-light text-decoration-none " >Add Book</a>
        <a href="tableau.php" class="text-light m-3 text-decoration-none" >Book</a>
        </div>
    </nav>

    <?php 
  //   if(isset($_SESSION['message'])) {
  //     echo "<div class='alert alert-success text-center' role='alert'>
  //    ". $_SESSION['message']."
  // </div>";
  //   }?>
    <!-- <div class="m-4">
    <a href="search.php"  class="text-light text-decoration-none bg bg-dark p-1 rounded-1">Search Book</a>
    </div> -->

    <form class="d-flex m-2" role="search" method="post">
      <input class="form-control me-2" name="inputsearch" value="" type="search" placeholder="Search" aria-label="Search">
      <input type="submit" name="search" value="search" class="text-light bg bg-info border-0 rounded-1">
    </form>
   
    
<div class="container">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Description</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    
    while ($result = $execu->fetch()) : ?>
    <tr>
      <!-- <th scope="row">1</th> -->
      <td><?= $result['id']?></td>
      <td><?= $result['title']?></td>
      <td><?= $result['author']?></td>
      <td><?= $result['description']?></td>
      <td><?= $result['date']?></td>
      <td>
        <a href="tableau.php?id=<?=$result['id']?>"  class="text-light text-decoration-none bg bg-danger p-1 rounded-1">delete</a>
        <a href="edit2.php?id=<?=$result['id']?>"  class="text-light text-decoration-none bg bg-success p-1 rounded-1">edit</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>
</div>
<script src="https://use.fontawesome.com/b03bd27677.js%22%3E"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
