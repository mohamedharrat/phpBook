<?php
// echo 'Bonjour ' . htmlspecialchars($_REQUEST["nom"]) . " ". htmlspecialchars($_REQUEST["prenom"]) . ' !' .'</br>';
// // echo  htmlspecialchars($_REQUEST["prenom"]) .'</br>';
// echo  'email : ' .htmlspecialchars($_REQUEST["email"]) .'</br>';
// echo 'je choisis : ' . htmlspecialchars($_REQUEST["choix"]) .'</br>';
// echo  htmlspecialchars($_REQUEST["diplome"]).'</br>';
// echo  htmlspecialchars($_REQUEST["marie"]);
// echo "Full Name : " .htmlspecialchars($_REQUEST["full-name"]). "</br>";
// echo "Email : " .htmlspecialchars($_REQUEST["email"]). "</br>";
// echo "date d'arrivé : ".htmlspecialchars($_REQUEST["date"]). "</br>";
// echo "nombre de personne : " .htmlspecialchars($_REQUEST["nombre"]). "</br>";
// $avail = $_REQUEST["avail"];
// foreach($avail as $avails) {
//     echo $avails . "</br>";
// }
// echo "Promo code : " .htmlspecialchars($_REQUEST["code"]). "</br>";
// echo $_REQUEST["agree"]. "</br>";
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";

// $uploadedFile = "upload/";
// $chemin = $uploadedFile.basename($_FILES["idscan"]["name"]);
// echo $chemin;

// if(move_uploaded_file(($_FILES["idscan"]["tmp_name"]), $chemin)){
//         echo 'file uploaded';

// }

// $inputDateDebut = $_REQUEST["date-debut"];
// $inputDateFin = $_REQUEST["date-fin"];

// $dateDebut = date_create($inputDateDebut);
// $dateFin = date_create($inputDateFin);
// $difference = date_diff($dateDebut, $dateFin);

// echo $difference -> format("%a");
// $host = "localhost";
// $db = "vente";
// $user = "root";
// $password = "";
// $charset = "utf8";
// // $option = [];
// try {

//     $pdo = new PDO("mysql:host=$host; dbname=$db", $user, $password);
//     echo "connexion établie";
// } catch (PDOException $e) {
//     print "erreur" . $e->getMessage() . "<br/>";
//     die();
// }
// $sql = "INSERT INTO client(nom, prenom, email) VALUES ('$_POST[nom]', '$_POST[prenom]','$_POST[email]')";

// $res = $pdo->query($sql);
// $res->fetchAll();
// print_r($res);
// print_r($_POST);

//modifier dans la data base

// $modif = "UPDATE client set nom = 'abdoulaye' where id_client=1";
// // $pdoexe = $pdo->exec($modif);

//delete dans la data base

// $delete = "DELETE from client where nom = 'abdoulaye'  ";
// $pdoexe = $pdo->exec($delete);

// recherche dans la base de donnee

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";


if (empty($_POST['firstname'])  || empty($_POST['lastname']) || empty($_POST['email'])) {
    echo 'Saisissez tous les champs svp!';
} else {

    if (strlen(trim($_POST['firstname'])) < 3) {
        echo "Saisissez minimum trois lettres svp!";
    } else {

        $nom = $_POST['firstname'];
        $prenom = $_POST['lastname'];
        $email = $_POST['email'];

        require_once 'connection.php';


        $requete = "INSERT INTO client (nom, prenom, email) VALUES('$nom', '$prenom', '$email')";
        // echo $requete;
        $execute = $obj_pdo->query($requete);


        header('location:element.php');
    }
}
