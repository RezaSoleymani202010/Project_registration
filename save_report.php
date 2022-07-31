<?php
require "_load.php";

$activities=get_activities();

$product_id=$_POST['product_id'];
$project_id=get_product($product_id)['project_id'];
$product=get_product($product_id)['name'];
$project=get_project($project_id);
$user_id=$_SESSION['user_id'];
if($_POST['save']) {
    foreach ($activities as $activity) {
        $normal_time=$_POST['normal_hours'][$activity['id']].":".$_POST['normal_minutes'][$activity['id']];
        $extra_time=$_POST['extra_hours'][$activity['id']].":".$_POST['extra_minutes'][$activity['id']];
        global $db;
        $time = time();
        $query = "insert into reports(user_id,project_id,product_id,activity_id,time,normal_time,extra_time) values (?,?,?,?,?,?,?)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $project_id);
        $stmt->bindParam(3, $product_id);
        $stmt->bindParam(4, $activity['id']);
        $stmt->bindParam(5, $time);
        $stmt->bindParam(6, $normal_time);
        $stmt->bindParam(7, $extra_time);
        $stmt->execute();
        $stmt->fetch();
    }
    echo"saved";
//    echo "<form method='post' action='panel.php'>
//<input type='hidden' name='report'/>
//</form>
//";
    redirect("panel.php");
}