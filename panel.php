<?php
require "_load.php";
auth_check();
global $user;
var_dump($_GET);
if(isset($_GET['project'])) {
    $project_flag = 1;
$products=get_products($_GET['project']);
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
<body><div style="padding: 25px">
<div dir=rtl name="navbar">

    <nav class="nav">
        <a class="nav-link active " style="background-color: aquamarine;border-radius: 10px" href="#"><?= $user['user_name'] ?> is Active</a>

    </nav>
</div>


<?php
if (isset($Smessage)){ ?>
<div>
<br> <p class="alert alert-danger">
      <?php  echo $Smessage; ?>
    }
   </p>
</div>
<?php } ?>
<br>
<div dir="rtl" name=" select_project" style="padding-right: 200px">

<?php
if (!isset($project_flag))
include "select_project.php";
else
    include "select_product.php";

?>
<!---->


</div>

</div>
</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>


