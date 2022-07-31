<?php
require "_load.php";
global $db;

if (isset($_POST['user_name'],$_POST['password'],$_POST['submit'])) {
    $password=$_POST['password'];
    $user_name=$_POST["user_name"];
    $email=$_POST['user_name'];
    $query = "select id from user where (password=:password) and (email=:email or user_name=:user_name)";
    $stmt = $db->prepare($query);
    $stmt->bindParam("password", $password);
    $stmt->bindParam("email", $email);
    $stmt->bindParam("user_name", $user_name);
    $stmt->execute();
    $user_id = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user_id === false) {
        $error = "کاربر یافت نشد";
    } else {
        $_SESSION['user_id'] = $user_id['id'];
        redirect("index.php");
    }


}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>
<?php include "login_form.php";?>





</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>