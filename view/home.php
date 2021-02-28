<?php
    $page="index";
    include('./components/header.php');

    if (!getSession('login')) {
        header("location:login");
        die;
    }
    include('./core/init.php');
    $query="select * from contacts";
	$result=mysqli_query($connect,$query);
    if(! $result){
	    die("Error:".$query. mysqli_connect_error());
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page ?></title>
    <?php include_once('./components/style.php'); ?>
</head>
<body>
<!-- contant -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand text-light " href="#">
            <img src="<?= appConfig("app.path.logo") ?>" width="50" height="50" class="d-inline-block align-top mr-3" alt="">
                <?= appConfig("app.info.name") ?>
                <a class="btn btn-logout" href="#" type="submit">Logout</a>
        </a>
    </nav>
    <div class="container my-5" style="color: red;">
    <div class="row">
        <div class="col-8">
            <h2 class="">Contact List : <?=getSession('user')['name']?> </h2>
        </div>
        <div class="col-4 form-group">
            <input type="search" class="form-control w-50 mr-2" placeholder="Search ..." name="" id="search">
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal">Add A Person</button>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Groupe</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($data=mysqli_fetch_assoc($result) ) {
                    echo'
                        <tr>
                            <td>'.$data['id'].'</td>
                            <td>'.$data['first_name'].'</td>
                            <td>'.$data['last_name'].'</td>
                            <td>'.$data['email'].'</td>
                            <td>'.$data['address'].'</td>
                            <td>'.$data['phone'].'</td>
                            <td>'.$data['group'].'</td>
                            <td><a href="#"><i class="far fa-edit"></i></a> <a href="#"><i class="far fa-trash-alt"></i></a></td>
                        </tr>
                    ';
                }
            ?>
        </tbody>
    </table>
    <?php include('./view/add_person.php'); ?>
    </div>
<!-- contant -->

<?php include_once('./components/script.php'); ?>
</body>
</html>