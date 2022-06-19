<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire</title>
</head>

<body>
    <form action="traitement.php" , method="post">
        <label for="terms">First name<sup style="color:red;">*</sup>:</label><br>
        <input type="text" name="firstname" style="margin-bottom: 10px;"><br>

        <label for="terms">Last name<sup style="color:red;">*</sup>:</label><br>
        <input type="text" name="lastname" style="margin-bottom: 10px;"><br>

        <label for="terms">Email<sup style="color:red;">*</sup>:</label><br>
        <input type="text" name="email" style="margin-bottom: 10px;"><br>

        <input type="submit" value="Sumit">

    </form>

</body>

</html>