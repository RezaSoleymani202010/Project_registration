<?php 
require "_load.php";
if (isset($_POST['user_name'], $_POST['email'], $_POST['password'])) {
    global $db;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_name = $_POST['user_name'];
    $query = "insert into user (user_name,email,password) VALUES (?,?,?)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $user_name);
    $stmt->bindParam(2, $email);
    $stmt->bindParam(3, $password);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result === true) {
        $q = "select id from user where user_name=?";
        $s = $db->prepare($q);
        $s->bindParam(1, $user_name);
        $s->execute();
        $_SESSION['user_id'] = $s->fetch(PDO::FETCH_ASSOC)['id'];
//    var_dump($_SESSION['user_id']);
    }

}

if($_SESSION['user_id']){
    redirect("panel.php");
}
else
    redirect("login.php");


?>
