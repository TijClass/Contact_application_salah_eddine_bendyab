<?php 
    $page="login";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page ?></title>
    <?php include('./components/header.php'); ?>
    <?php include_once('./components/style.php'); ?>
</head>
<body>

<!-- contant -->
    <div class="container">
        <div class="starter-template head text-center">
            <img src="<?= appConfig("path.logo") ?>" alt="logo" id="logo">
            <h1>WELCOME TITLE</h1>
        </div>
        <div class="row mainblock">
            <div class="col-5 left-side text-center" >
                <h2 class="mt-5">WELCOME sub_title</h2>
                <hr class="mainblock-hr">
                <p class="mx-5 my-5">lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <a href="#" class="btn btn-main">Read More</a>
            </div>
            <div class="col-7 right-side right-side-h2">
                <h2 class="mt-5 form-signin-title">Login :</h2>
                <form class="form-signin mt-5">
                    <div class="form-label-group mt-2 mx-3">
                        <label for="inputEmail" class="mb-3">Email address :</label>
                        <input type="email" id="inputEmail" class="form-control" placeholder="" required="" autofocus="">
                    </div>
                    <div class="form-label-group mt-4 mx-3">
                        <label for="inputPassword" class="mb-3" >Password :</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="" required="" autofocus="">
                    </div>
                    <div class="row">
                        <div class="col-8 checkbox mt-3 text-center">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>
                        <div class="col-4 btn-costem">
                            <button class="btn btn-primary" type="submit">Sign in</button>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- contant -->

<?php include_once('./components/script.php'); ?>
</body>
</html>