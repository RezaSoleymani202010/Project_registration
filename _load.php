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
function get_user($id){
    global$db;
    $query="select * from user where id=?";
    $stmt=$db->prepare($query);
    $stmt->bindParam(1,$id);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return $result;

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
        redirect("login.ph");
    }
}




?>