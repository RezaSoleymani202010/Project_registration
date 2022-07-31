<?php
require "_load.php";
global $user;
$activities=get_activities();
$product_id=$_POST['product_id'];
$product=get_product($product_id)['name'];
$project_id=get_product($product_id)['project_id'];
$project=get_project($project_id)['name'];
$normal_hours=$_POST['normal_hours'];
$normal_minutes=$_POST['normal_minutes'];
$extra_hours=$_POST["extra_hours"];
$extra_minutes=$_POST["extra_minutes"];
$user_id=$user['id'];
$normal_time=[];
$extra_time=[];

foreach ($activities as $activity) {
    $normal_time[$activity['id']] = $normal_hours[$activity['id']] . ":" . $normal_minutes[$activity['id']];
    $extra_time[$activity['id']] = $extra_hours[$activity['id']] . ":" . $extra_minutes[$activity['id']];
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="asset/css/cssfile.css">
</head>
<body>
<label style="text-align: center;">
<div class="activity_div">
    <!--    <span>a</span>-->
    <!--    <span>a</span>-->
    <!--    <span>a</span>-->
    <form method="post" action="save_report.php">
        <input name="product_id" type="hidden" value="<?=$product_id ?>">
        <table class="activity_table">
            <tr>
                <th>Project</th>
                <th>Product</th>
                <th>activity</th>
                <th>Normal Time</th>
                <th>Extra_time</th>
            </tr>




            <?php foreach ($activities as $activity){ ?>
                <input name="normal_time[<?=$activity['id']?>]" type="hidden" value="<?= $normal_time[$activity['id']] ?>"/>
                <input name="extra_time[<?=$activity['id']?>]" type="hidden" value="<?= $extra_time[$activity['id']] ?>"/>
                <tr>
                    <td>
<?=$project?>
                    </td>
                    <td><?=$product?></td>
                    <td>
                        <?=$activity['name'] ?>

                    </td>
                    <td>
                        <?=$normal_time[$activity['id']]?>

                    </td>   <td>
                        <?=$extra_time[$activity['id']] ?>

                    </td>
                </tr>
            <?php } ?>
        </table>
        <input name="save" value="Save" type="submit" class="sub_btn">
    </form>
</div>
</label>

</body>
</html>