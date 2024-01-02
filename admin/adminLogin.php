<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include_once "./includes/adminHead.include.php";
    ?>
    <title>Login Admin</title>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 text-black">

                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                        <form style="width: 23rem;">
                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>
                            <div class="col-12">
                                <div id="errorDetails" class="alert alert-success d-none" role="alert">
                                    
                                </div>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="email" id="adminEmail" class="form-control form-control-lg" />
                                <label class="form-label" for="adminEmail">Email address</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="adminPassword" class="form-control form-control-lg" />
                                <label class="form-label" for="adminPassword">Password</label>
                            </div>

                            <div class="pt-1 mb-4">
                                <button class="btn btn-info btn-lg btn-block" type="button" onclick="validateAdmin();">Login</button>
                            </div>

                            <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
                            <p>Don't have an account? <a href="#!" class="link-info">Register here</a></p>
                        </form>

                    </div>

                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="./assets/images/AdminLoginPage.jpg" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>

    <?php
    include_once "./includes/adminBody.include.php";
    ?>
</body>

</html>