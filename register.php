<html>
<?php
include('config.php');
session_start();
?>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/login.css">
</head>
<?php
if (isset($_POST['daftar'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $check = $dbh->prepare("SELECT * FROM `user` WHERE `username` ='$username'");
    $check -> execute();
    $hasil = $check->fetchAll();

    if (count($hasil)!=0) {
        echo "<script>
        alert('Akun Telah Tersedia Silahkan Login')
        </script>";
    }else{
        $placeholder = $dbh->prepare("INSERT INTO `user` (`username`, `name`, `email`, `password`, `id`) VALUES ('$username', '$name', '$email', '$password', NULL);");
        $placeholder ->execute();
        header('location:index.php?msg=Berhasil');

    }


    }?>
<body>
    <!-- daftar Menu -->
    <div class="container ">
        <div class="jumbotron jumbotron-fluid"
         style="margin:5em; margin-left:30%; margin-right:30%">
            <h2 class="text-center ">Silahkan Daftar</h2>
            <?php
            if(isset($_SESSION['flash'])){
                foreach ($_SESSION['flash'] as $key => $value) {
                   echo '<p class="alert alert-danger">'.$value.'</p></br>';
                }
                 unset($_SESSION['flash']);
            }
            ?>
            <div class="login-form" >
                <form action="" method="post">

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Full Name" required="required" name="name">

                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Username" required="required" name="username">

                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email" required="required" name="email">

                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" required="required" name="password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" name="daftar">Daftar</button>
                    </div>
                    <div class="clearfix">
                        <a href="index.php" class="pull-right">Sudah Punya akun?</a>
                    </div>
                </form>
                <p class="text-center"><a href="#">Create an Account</a></p>
            </div>

        </div>

    </div>

    <!--Javascript-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
