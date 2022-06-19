<?php


require_once 'connection.php';

$requete = "SELECT * FROM client WHERE id_client >= 1";

$exec = $obj_pdo->query($requete);
// $result = $exec->fetch();

// echo "<pre>";
// print_r($result);
//  echo "</pre>";
if (isset($_GET['id'])) {
    $requete = "DELETE FROM client WHERE id_client=$_GET[id]";
    $exelent = $obj_pdo->query($requete);
    if ($exelent) {
        header('location:element.php');
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

<body>

    <table border="collapse">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMS</th>
                <th>PRENOMS</th>
                <th>EMAILS</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($result = $exec->fetch(PDO::FETCH_ASSOC)) : ?>
                <tr>
                    <td>
                        <?= $result['id_client'] ?>
                    </td>

                    <td>
                        <?= $result['nom'] ?>
                    </td>

                    <td>
                        <?= $result['prenom'] ?>
                    </td>

                    <td>
                        <?= $result['email'] ?>
                    </td>
                    <td>
                        <a href="element.php?id=<?= $result["id_client"] ?>">Delete</a>
                        <a href="edit.php?id=<?= $result["id_client"] ?>">Update</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>

    </table>

</body>

</html>