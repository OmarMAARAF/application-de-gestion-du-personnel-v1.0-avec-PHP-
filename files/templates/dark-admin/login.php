<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Title -->
        <title>Connexion</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
        <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
        <link href="../../assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">

      
        <!-- Theme Styles -->
        <link href="../../assets/css/main.min.css" rel="stylesheet">
        <link href="../../assets/css/dark-theme.css" rel="stylesheet">
        <link href="../../assets/css/custom.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="login-page">
        <div class='loader'>
            <div class='spinner-grow text-primary' role='status'>
              <span class='sr-only'>Loading...</span>
            </div>
          </div>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-12 col-lg-4">
                    <div class="card login-box-container">
                        <div class="card-body">
                            <div class="authent-logo">
                                <img src="../../assets/images/logo@2x.png" alt="">
                            </div>
                            <div class="authent-text">
                                <p>Connexion</p>
                                <p>Accéder à votre compte.</p>
                            </div>
                            <?php
                            ini_set('display_errors', 1);
                            ini_set('display_startup_errors', 1);
                            error_reporting(E_ALL);
                                include 'ConnectDb.php';

                                session_start();
                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    $id = $_POST["id"];
                                    $password = $_POST["password"];

                                    $sql = "select * from login 
                                            where id ='" . $id . "' 
                                            AND  password='" . $password . "'";

                                    $result = mysqli_query($data, $sql);
                                    $row = mysqli_fetch_array($result);
                                    if ($row["usertype"] == "user") {
                                        $_SESSION["id"] = $id;
                                        $_SESSION["password"] = $password;
                                        $_SESSION["last_con"]=$row["last_con"];
                                        $_SESSION["usertype"]=$row["usertype"];
                                        $sql = "update login set last_con= now() where id= '$id'";

                                    $result = mysqli_query($data, $sql);
                                    header("location:liste_demande.php");
                                    } elseif ($row["usertype"] == "admin") {
                                        
                                        $_SESSION["id"] = $id;
                                        $_SESSION["password"] = $password;
                                        $_SESSION["last_con"]=$row["last_con"];
                                        $_SESSION["usertype"]=$row["usertype"];
                                        echo $id;
                                        $sql = "update login set last_con= now() where id= '$id'";

                                        $result = mysqli_query($data, $sql);
                                        
                                        header("location:liste_demande.php");
                                        
                                    } else {
                                        echo "<div class=\"alert alert-danger\" role=\"alert\">
                                          Identifiant ou Mot de passe incorrect
                                        </div>";
                                    }
                                }?>
                            <form name="login" action="login.php" method="POST">
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="Identifiant" name="id" required>
                                        <label for="floatingInput">Identifiant</label>
                                      </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe" name="password" required>
                                        <label for="floatingPassword">Mot de passe</label>
                                      </div>
                                </div>
                                
                                <div class="d-grid">
                                <button type="submit" class="btn btn-info m-b-xs">Connexion</button>
                            </div>
                              </form>
                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
         
        
        <!-- Javascripts -->
        <script src="../../assets/plugins/jquery/jquery-3.4.1.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="../../assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
        <script src="../../assets/js/main.min.js"></script>
    </body>
</html>