<?php
include "_load.php";
echo "this is registry";
if (isset($_POST['user_name'],$_POST['email'],$_POST['password'])) {
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_id = user_register($user_name, $email, $password);
    $_SESSION['user_id'] = $user_id['id'];
    redirect("index.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                            <h2 class="fw-bold mb-2 text-uppercase">Registry</h2>
                            <p class="text-white-50 mb-5">Please enter your information to registry</p>
                            <form method="POST" action="">
                                <div class="form-outline form-white mb-4">
                                    <input name="user_name" type="text" id="typeEmailX"
                                           class="form-control form-control-lg" placeholder="User_name "/>
                                    <label class="form-label" for="typeEmailX">Email</label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input name="email" type="text" id="typeEmailX" class="form-control form-control-lg"
                                           placeholder=" Email"/>
                                    <label class="form-label" for="typeEmailX">Email</label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input name="password" placeholder="password" type="text" id="typePasswordX"
                                           class="form-control form-control-lg"/>
                                    <label class="form-label" for="typePasswordX">Password</label>
                                </div>

                                <!--                            <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>-->

                                <button name="submit" class="btn btn-outline-light btn-lg px-5" type="submit">Save
                                </button>
                                <div name="errorMsg">
                                    <br>
                                    <p class="alert alert-danger"><?php
                                        if (isset($Smessage)) {
                                            echo $Smessage;
                                            unset($error);
                                        }
                                        ?></p>
                                </div>
                                <div name="successfullyMsg">
                                    <br>
                                    <p class="alert alert-danger"><?php
                                        if (isset($error)) {
                                            echo $error;
                                        }
                                        ?></p>
                                </div>
                            </form>
                        </div>

                        <div>
                            <p class="mb-0">Don't have an account? <a href="user_registry.php"
                                                                      class="text-white-50 fw-bold">Sign Up</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>
