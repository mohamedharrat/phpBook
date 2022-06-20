<?php 
$execc = null;
if(isset($_POST['search'])) {

  if(empty($_POST['inputsearch'])) 
  {
    echo "Saisissez votre recherche !";
  } 
  else {
    if (strlen(trim($_POST['inputsearch'])) < 3) {
      echo "Saisissez minimum trois lettres svp!";
  } else {

    $sch = $_POST['inputsearch'];

    require_once 'connection2.php';

    
    $search = "SELECT * from book where title='$sch' or author='$sch'" ;
    $execc = $pdo->query($search);
    // $ress = $execc->fetch();
    // echo "<pre>";
    // print_r($ress);
    // echo "</pre>";


    // header('location:tableau.php');
  }
  
  }
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
      <p class="text-light fs-3">BookStore</p>
      <div >
        <a href="index2.php" class="text-light text-decoration-none " >Add Book</a>
        <a href="tableau.php" class="text-light m-3 text-decoration-none" >Book</a>
        </div>
    </nav>
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
    if($execc != null) {
      ?>
    <?php 
    
    while ($ress = $execc->fetch()) : ?>
    <tr>
      <!-- <th scope="row">1</th> -->
      <td><?= $ress['id']?></td>
      <td><?= $ress['title']?></td>
      <td><?= $ress['author']?></td>
      <td><?= $ress['description']?></td>
      <td><?= $ress['date']?></td>
      <td>
        <a href="tableau.php?id=<?=$ress['id']?>"  class="text-light text-decoration-none bg bg-danger p-1 rounded-1">delete</a>
        <a href="edit2.php?id=<?=$ress['id']?>"  class="text-light text-decoration-none bg bg-success p-1 rounded-1">edit</a>
      </td>
    </tr>
    <?php endwhile; ?>
    <?php } ?>

  </tbody>
      </table>
    </div>

</body>
</html>