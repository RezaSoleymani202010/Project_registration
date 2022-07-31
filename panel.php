<?php
require "_load.php";
auth_check();
global $user;
$activities=get_activities();
$reports=get_reports($_SESSION['user_id']);
$sum_ex_h=0;
$sum_ex_m=0;
foreach ($reports as $report){
  $ex_time=explode( ":",$report['extra_time']);
  $ex_h=intval($ex_time[0]);
  $ex_m=intval($ex_time[1]);
  $sum_ex_h+=$ex_h;
  $sum_ex_m+=$ex_m;
}
$sum_EX_H=$sum_ex_h+($sum_ex_m/60);
$sum_EX_H=intval($sum_EX_H);
$sum_EX_M=$sum_ex_m%60;
$sum_EX_M=intval($sum_EX_M);
$a=array($sum_EX_H,$sum_EX_M);
$sum_time=implode(":",$a);
var_dump($sum_time);
if(isset($_GET['project'])) {
    $project_flag = 1;
$products=get_products($_GET['project']);
if (get_project($_GET['project'])==null){
    redirect("panel.php");
}else{
    if ($products==null){

        redirect("panel.php");
    }
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





    <table class="activity_table">
        <tr>
            <th>Project</th>
            <th>Product</th>
            <th>activity</th>
            <th>Normal Time</th>
            <th>Extra_time</th>
        </tr>




        <?php foreach ($reports as $report){ ?>

            <tr>
                <td>
                    <?=$report['project_id']?>
                </td>
                <td><?=$report['product_id']?></td>
                <td>
                    <?=$report['activity_id'] ?>

                </td>
                <td>
                    <?=$report['normal_time']?>

                </td>   <td>
                    <?=$report['extra_time'] ?>

                </td>
            </tr>
        <?php } ?>
    </table>
    <input name="save" value="Save" type="submit" class="sub_btn">













<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>


