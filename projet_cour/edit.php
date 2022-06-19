<?php 

    require_once 'connexion.php';

    if (isset($_GET['id'])) {

        $req = "SELECT * FROM client WHERE id_client=$_GET[id]";
        $result = $obj_pdo->query($req);
        $client = $result->fetch();
        // print_r($client);


    }
    if (isset($_POST['submit'])) {
        
        if (empty($_POST['firstname'])  || empty($_POST['lastname']) || empty($_POST['email'])) {
            echo 'Saisissez tous les champs svp!';
        }else{
            if (strlen(trim($_POST['firstname'])) < 3) {
                echo "Saisissez minimum trois lettres svp!";
            }
            else{
                
                $id = $_GET['id'];
                $nom = $_POST['firstname'];
                $prenom = $_POST['lastname'];
                $email = $_POST['email'];
        
                require_once 'connexion.php';
        
        
               $requete = "UPDATE client SET nom = '$nom', prenom = '$prenom', email = '$email'  WHERE id_client=$id";
                $result = $obj_pdo->query($requete);
                if ($result) {
                 header('location:element.php');
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
    <title>update</title>
</head>
<body>
    <form  method="post">
        <input type="hidden" name="firstname" value="<?=$client['id_client'] ?>" style="margin-bottom: 10px;"><br> 

        <label for="terms">First name<sup style="color:red;">*</sup>:</label><br>
        <input type="text" name="firstname" value="<?=$client['nom'] ?>" style="margin-bottom: 10px;"><br> 

        <label for="terms">Last name<sup style="color:red;">*</sup>:</label><br>
        <input type="text" name="lastname" value="<?=$client['prenom'] ?>" style="margin-bottom: 10px;"><br>

        <label for="terms">Email<sup style="color:red;">*</sup>:</label><br>
        <input type="text" name="email" value="<?=$client['email'] ?>" style="margin-bottom: 10px;"><br>
   
        <input type="submit" name="submit" value="Edit">
        
    </form>
    



    
</body>
</html>