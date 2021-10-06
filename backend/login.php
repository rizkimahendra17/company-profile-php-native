
<?php 

include 'config/koneksi.php';

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/backend/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-9 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6  d-lg-block bg-login">
                                <img src="../assets/backend/img/login.jpg" class="img-thumbnail">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Silahkan Login!</h1>
                                    </div>
                                    <form class="user" method="POST" action="">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="username"
                                                id="exampleInputEmail" aria-describedby="emailHelp" autocomplete="off"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                    
                                        <input type="submit" class="btn btn-primary btn-user btn-block" name="blogin">
                                          
                                        </input>
                                        
                            
                                    </form>
                            
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/backend/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/backend/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/backend/js/sb-admin-2.min.js"></script>

</body>

</html>


<?php 

if (isset($_POST['blogin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = mysqli_query($koneksi, "SELECT * FROM login_admin WHERE username='$username' and password='$password' ");
    
       $cek =  mysqli_num_rows($sql);
    
       $user = mysqli_fetch_array($sql);

    //    var_dump($user);

    //    die();

       if($cek == 1 ){
           session_start();

            $_SESSION['id_admin'] = $user['id_admin'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['nama'] = $user['nama'];
            

        echo "<script> alert('Anda Berhasil Login');window.location.href='index.php';</script>";
          
       }else{
           // href nya dari htaccess 
        echo "<script> alert('Username Dan Password Anda Salah');window.location.href='login';</script>";
       }
       
      
    }
?>