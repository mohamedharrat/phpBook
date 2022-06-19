<?php 

require_once 'connection2.php';

if(isset($_GET['id'])) {
    $requ = "SELECT * FROM book where id=$_GET[id]";
    $exxec = $pdo->query($requ);
    $book = $exxec->fetch();
    //  echo "<pre>";
    // print_r($book);
    // echo "</pre>";
}


if(isset($_POST['submit'])) {

    if (empty($_POST['title'])  || empty($_POST['author']) || empty($_POST['description'] || empty($_POST['date']))) {
        echo 'Saisissez tous les champs svp!';
    } else {
        if (strlen(trim($_POST['title'])) < 3) {
            echo "Saisissez minimum trois lettres svp!";
        } else {
            $id=$_GET['id'];
            $title=$_POST['title'];
            $author=$_POST['author'];
            $description=$_POST['description'];
            $date=$_POST['date'];
    
        require_once 'connection2.php';
    
        $modif = "UPDATE book set title='$title', author='$author', description='$description', date='$date'  where id=$id";
        $exemodif = $pdo->query($modif);
        if($exemodif){

            header("location:tableau.php");
        }
        
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
</head>
<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
<body>
<nav class="navbar navbar-dark bg-dark">
      <p class="text-light fs-3">BookStore</p>
      <div >
        <a href="index2.php" class="text-light text-decoration-none " >Add Book</a>
        <a href="tableau.php" class="text-light m-3 text-decoration-none" >Book</a>
        </div>
    </nav>
    <div class="container">
<form  method="post">
    <div class="card m-4">
      <div class="card-header text-center">Edit Book</div>
      <div class="card-body">
      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label"
            >ID Book</label
          >
          <input
            type="hidden"
            class="form-control"
            id="exampleFormControlInput1"
            name="id"
            value="<?=$book['id']?>"
          />
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label"
            >Edit Title</label
          >
          <input
            type="text"
            class="form-control"
            id="exampleFormControlInput1"
            name="title"
            value="<?=$book['title']?>"
          />
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label"
            >Edit Author</label
          >
          <input
            type="text"
            class="form-control"
            id="exampleFormControlInput1"
            name="author"
            value="<?=$book['author']?>"
          />
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label"
            >Edit Description</label
          >
          <textarea
            class="form-control"
            id="exampleFormControlTextarea1"
            rows="3"
            name="description"
            value=""
          ><?=$book['description']?></textarea>
        </div>
        <div class="mb-3">
          <input type="date" class="form-control" name="date" value="<?=$book['date']?>"/>
        </div>
        <div>
         <input type="submit" name="submit" class="bg bg-dark text-light border rounded-1 p-2" value="Edit">
        </div>
      </div>
    </div>
    </form>
    </div>

</body>
</html>