<?php
include"_load.php";
if(!isset($_POST['product'])){
    redirect("panel.php");
}
$product_id=$_POST['product'];
$product=get_product($product_id)['name'];
$project_id=get_product($product_id)['project_id'];
$project=get_project($project_id)['name'];
$activities=get_activities();
echo "proje:".$project."<br>";
echo "product:".$product."<br>";
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
<p style="font-weight: bold;font-family: Algerian;font-size: large"> insert your activities for project : <?=$project?> product : <?=$product?> .</p>
<div class="activity_div">
<!--    <span>a</span>-->
<!--    <span>a</span>-->
<!--    <span>a</span>-->
    <form method="post" action="report.php">
        <input name="product_id" type="hidden" value="<?=$product_id ?>">
    <table class="activity_table">
        <tr>
            <th>Normal Time</th>
            <th>activity</th>
            <th>Extra_time</th>
        </tr>
        <?php foreach ($activities as $activity){ ?>

        <tr>
            <td>
                <select name="normal_hours[<?=$activity['id']?>]" id="">
                   <?php for ($i=0;$i<9;$i++){ ?>
                    <option value="<?=$i ?>"><?=$i."h"?></option>
               <?php } ?>
                </select>
                <select name="normal_minutes[<?=$activity['id']?>]" id="">
                    <?php for ($i=0;$i<60;$i+=10){ ?>
                        <option value="<?=$i ?>"><?=$i."m"?></option>
                    <?php } ?>
                </select>
            </td>
            <td><?=$activity['name'] ?></td>
            <td>

                <select name="extra_hours[<?=$activity['id']?>]" id="">
                    <?php for ($i=0;$i<9;$i++){ ?>
                        <option value="<?=$i ?>"><?=$i."h"?></option>
                    <?php } ?>
                </select>
                <select name="extra_minutes[<?=$activity['id']?>]" id="">
                    <?php for ($i=0;$i<60;$i+=10){ ?>
                        <option value="<?=$i ?>"><?=$i."m"?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
  <?php } ?>
    </table>
        <input value="Save" type="submit" class="sub_btn">
    </form>
</div>
</label>

</body>
</html>
