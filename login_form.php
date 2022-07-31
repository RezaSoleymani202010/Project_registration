
<section  class="vh-100 gradient-custom">
    <div  class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                            <p class="text-white-50 mb-5">Please enter your login and password!</p>
                            <form method="POST" action="login.php">
                                <div class="form-outline form-white mb-4">
                                    <input name="user_name" type="text" id="typeEmailX" class="form-control form-control-lg"  placeholder="User_name or Email"/>
                                    <label class="form-label" for="typeEmailX">Email</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input name="password" placeholder="password" type="text" id="typePasswordX" class="form-control form-control-lg" />
                                    <label class="form-label" for="typePasswordX">Password</label>
                                </div>

                                <!--                            <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>-->

                                <button name="submit"  class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                                <div name="errorMsg">
                                   <br> <p class="alert alert-danger"><?php
                                        if (isset($error)){
                                            echo $error;
                                        }
                                        ?></p>
                                </div>
                            </form>
                        </div>

                        <div>
                            <p class="mb-0">Don't have an account? <a href="user_registry.php" class="text-white-50 fw-bold">Sign Up</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
