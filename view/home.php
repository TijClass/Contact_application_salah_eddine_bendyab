<?php
    $page="index";
    include('./components/header.php');

    if (getSession('login') === false) {
        header("location:login");
        die;
    }
    include('./core/init.php');

/* -------------------------------------------------------------------------- */
/*                                 add person                                 */
/* -------------------------------------------------------------------------- */
    $error=[];
    if (isset($_POST['add'])) {
        if (!isset($_POST['f_name'])) {
            $error['f_name']="this filed is required";
        }else if (!isset($_POST['l_name'])) {
            $error['l_name']="this filed is required";
        }else if (!isset($_POST['email'])) {
            $error['email']="this filed is required";
        }else if (!isset($_POST['address'])) {
            $error['address']="this filed is required";
        }else if (!isset($_POST['phone'])) {
            $error['phone']="this filed is required";
        }else if (!isset($_POST['group'])) {
            $error['group']="this filed is required";
        }else if (!isset($_POST['notes'])) {
            $error['notes']="this filed is required";
        }else{
            foreach ($_POST as $key => $value) {
                $_POST[$key]=htmlentities($_POST[$key]);
            }
            $query="INSERT INTO `contacts` (`id`, `first_name`, `last_name` , `email` , `address` , `phone`, `group` , `notes` ,`date_added`) 
                    VALUES (NULL, '".$_POST["f_name"]."' , '".$_POST["l_name"]."' , '".$_POST["email"]."', '".$_POST["address"]."' , '".$_POST["phone"]."' , '".$_POST["group"]."' , '".$_POST["notes"]."' , current_timestamp())";
            $result=mysqli_query($connect,$query);
            if(! $result){
                die("Error:".$query. mysqli_connect_error());
            }else{
                header("location:home");
            }
        }

    }

/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                                delete person                               */
/* -------------------------------------------------------------------------- */
    if (isset($_GET['idOfPerson'])) {
        $queryDelete="DELETE FROM `contacts` WHERE `contacts`.`id` = ".$_GET['idOfPerson']."";
        $resultDelete=mysqli_query($connect,$queryDelete);
        if(! $resultDelete){
            die("Error:".$queryDelete. mysqli_connect_error());
        }else{
            header("location:home");
        }
    }
/* -------------------------------------------------------------------------- */

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
                <a class="btn btn-logout" href="/loguot" type="submit">Logout</a>
        </a>
    </nav>
    <div class="container my-5" style="color: red;">
    <div class="row">
        <div class="col-8">
            <h2 class="">Contact List : <?=getSession('user')['name']?> </h2>
        </div>
        <div class="col-4 form-group">
            <input type="text" class="form-control w-50 mr-2" onkeyup="myFunction()" placeholder="Search for First name ..." name="" id="search">
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal">Add A Person</button>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Groupe</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody id="myTable">
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
                            <td><a href="#"><i class="far fa-edit"></i></a> <a href="/home?idOfPerson='.$data['id'].'"><i class="far fa-trash-alt"></i></a></td>
                        </tr>
                    ';
                }
            ?>
        </tbody>
    </table>
    <?php include('./view/add_person.php'); ?>
    </div>
<!-- contant -->
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("search");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<?php include_once('./components/script.php'); ?>
</body>
</html>