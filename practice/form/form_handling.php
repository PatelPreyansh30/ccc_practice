<!DOCTYPE html>
<html lang="en">

<head>
    <title>Demo</title>
</head>

<body>
    <form action="form_handling.php" method="post">
        Name: <input type="text" name="name" /><br />
        E-mail: <input type="text" name="email" /><br />
        <input type="submit" />
    </form>

    <?php

    // echo "Name: " . $_GET["name"] . "<br>";
    // echo "Email: " . $_GET["email"] . "<br>";

    echo "Name: " . $_POST["name"] . "<br>";
    echo "Email: " . $_POST["email"] . "<br>";
    ?>
</body>

</html>