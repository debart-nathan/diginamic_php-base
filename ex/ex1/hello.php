<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hello</title>
</head>

<body>
    <?php include_once __DIR__ . "/template/header.php" ?>
    <a href="./helloGet.php/?firstname=bob&lastname=dylan">hello get</a>
    <form action="./helloPost.php/" method="POST">
        FirstName :<input type="text" name="firstname">
        LastName :<input type="text" name="lastname">
        <input type="submit" value="Submit" />
    </form>

</body>

</html>