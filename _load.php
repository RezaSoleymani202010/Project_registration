<?php
require "security.php";
session_start();
$dsn="mysql:host=".DBHOST.";dbname=".DBNAME;
try {
    $db= new PDO($dsn,DBUSERNAME,DBPASSWORD);
}catch (PDOException $e ){
    echo $e.getMessage();
}
function redirect($path){
    header("Location:".$path);
    exit();
}
function auth_check(){
    if (!isset($_SESSION['user_id']))
     redirect("login.php");
}
function user_register($user_name,$email,$password){
    global $db;
    $query="insert into user(user_name,email,password)values (:user_name,:email,:password)";
    $stmt=$db->prepare($query);
    $stmt->bindParam("user_name",$user_name);
    $stmt->bindParam("email",$email);
    $stmt->bindparam("password",$password);
    $stmt->execute();
    $query2="select id from user where user_name=:user_name";
    $stmt2=$db->prepare($query2);
    $stmt2->bindParam("user_name",$user_name);
    $stmt2->execute();
    $user_id=$stmt2->fetch(PDO::FETCH_ASSOC);
    return $user_id;
}
function get_user($id){
    global$db;
    $query="select * from user where id=?";
    $stmt=$db->prepare($query);
    $stmt->bindParam(1,$id);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return $result;

}
function get_reports($user_id){
    global $db;
    $time=time()-84600;
    $query="select user_id, project_id,product_id,activity_id ,normal_time,extra_time from reports where user_id=:user_id and time>:time ";
    $stmt=$db->prepare($query);
    $stmt->bindParam("user_id",$user_id);
    $stmt->bindParam("time",$time);
    $stmt->execute();
    $reports=$stmt->fetchAll(PDO::FETCH_ASSOC);
    return $reports;
}
function get_projects(){
   global $db;
    $query="select name,id from project  ";
    $stmt=$db->prepare($query);
    $stmt->execute();
    $projects=$stmt->fetchAll(PDO::FETCH_ASSOC);
    return $projects;
}
function get_project($id){
    global $db;
    $query="select * from project where id=?  ";
    $stmt=$db->prepare($query);
    $stmt->bindParam(1,$id);
    $stmt->execute();
    $project=$stmt->fetch(PDO::FETCH_ASSOC);
    return $project;
}
function get_products($id){
    global $db;
    $query="select name,id from product where project_id=?  ";
    $stmt=$db->prepare($query);
    $stmt->bindParam(1,$id);
    $stmt->execute();
    $products=$stmt->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}
function get_product($id){
    global $db;
    $query="select * from product where id=?  ";
    $stmt=$db->prepare($query);
    $stmt->bindParam(1,$id);
    $stmt->execute();
    $product=$stmt->fetch(PDO::FETCH_ASSOC);
    return $product;
}
function get_activities(){
    global $db;
    $query="select name,id from activity  ";
    $stmt=$db->prepare($query);
    $stmt->execute();
    $activities=$stmt->fetchAll(PDO::FETCH_ASSOC);
    return $activities;
}
if (isset($_SESSION['user_id'])) {
    $user = get_user($_SESSION['user_id']);
    $_SESSION['user'] = $user;
    if ($user === false) {
        unset($_SESSION['user_id']);
        redirect("login.php");
    }

}

if (isset($_SESSION['user_id'])){
    $user=get_user($_SESSION['user_id']);
    if($user==false){
        unset($_SESSION['user_id']);
        redirect("login.ph");
    }
}




?>