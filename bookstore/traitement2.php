<?php

if (empty($_POST['title'])  || empty($_POST['author']) || empty($_POST['description'] || empty($_POST['date']))) {
    echo 'Saisissez tous les champs svp!';
} else {
    if (strlen(trim($_POST['title'])) < 3) {
        echo "Saisissez minimum trois lettres svp!";
    } else {
        $title=$_POST['title'];
        $author=$_POST['author'];
        $description=$_POST['description'];
        $date=$_POST['date'];

    require_once 'connection2.php';

    $requete = "INSERT INTO book (title,author,description,date) VALUES('$title','$author','$description','$date')";
    $exec = $pdo->query($requete);

    header("location:tableau.php");
    }
}





?>