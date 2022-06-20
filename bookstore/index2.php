<?php
// session_start();
if(isset($_POST['save'])) {
if (empty($_POST['title'])  || empty($_POST['author']) || empty($_POST['description'] || empty($_POST['date']))) {
  echo '<div class="alert alert-danger text-center" role="alert">
    Saisissez votre recherche !
  </div>';} else {
    if (strlen(trim($_POST['title'])) < 3) {
      echo '<div class="alert alert-danger text-center" role="alert">
      Saisissez minimum trois lettres svp!
    </div>';    } else {
        $title=$_POST['title'];
        $author=$_POST['author'];
        $description=$_POST['description'];
        $date=$_POST['date'];

    require_once 'connection2.php';

    $requete = "INSERT INTO book (title,author,description,date) VALUES('$title','$author','$description','$date')";
    $exec = $pdo->query($requete);

    if($exec) {
         echo '<div class="alert alert-success text-center" role="alert">
    add validate !
  </div>';
    }
 
      // $_SESSION['message'] = 'add validate !';
    // header("location:tableau.php");

 
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
    <div class="container">
<form action="" method="post">
    <div class="card m-4">
      <div class="card-header text-center">Add New Book</div>
      <div class="card-body">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label"
            >Title</label
          >
          <input
            type="text"
            class="form-control"
            id="exampleFormControlInput1"
            name="title"
          />
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label"
            >Author</label
          >
          <input
            type="text"
            class="form-control"
            id="exampleFormControlInput1"
            name="author"
          />
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label"
            >Description</label
          >
          <textarea
            class="form-control"
            id="exampleFormControlTextarea1"
            rows="3"
            name="description"
          ></textarea>
        </div>
        <div class="mb-3">
          <input type="date" class="form-control" name="date"/>
        </div>
        <div>
         <input type="submit" name="save" class="bg bg-dark text-light border rounded-1 p-2" value="Save">
        </div>
      </div>
    </div>
    </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
