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
        <title>Demande</title>

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
                                <p>Bienvenue</p>
                                <p>Entrer Les Informations Nécessaire</p>
                            </div>

                            <?php
                               include 'ConnectDb.php';
                               if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $cin = $_POST["cin"];
                                $nb_jour = $_POST["nb_jour"];
                                $date_depart = $_POST["date_depart"];
                                $type= $_POST["type"];
                                
                                
                                $sql = "select * from demande where cin ='" . $cin . "' and nb_jours='" . $nb_jour . "' and date_depart ='" . $date_depart . "' and type='" . $type . "'";
                                $result = mysqli_query($data, $sql);
                                
                                $row = mysqli_fetch_array($result);
                                $num=mysqli_num_rows ( $result );
                                
                                
                                
                                if($num>0){
                                    if($row["etat"]=="valide"){
                                        echo ('
                                        <div class="alert alert-success" role="alert">
                                        Votre demande a été validée vous pourriez passer la prendre
                                      </div>
                                        ');
                                     
                                    }
                                    elseif ($row["etat"]=="refuse"){
                                        echo('  <div class="alert alert-danger" role="alert">
                                        Votre demande a été refusée
                                      </div> ');
                                    }
                                    else{
                                        echo('<div class="alert alert-warning" role="alert">
                                        Votre demande est en cours de traitement . . .
                                      </div>');
                                    }
                                }
                               else{
                                    $sql2 = "insert into  demande(cin,nb_jours,date_depart,type,date_prise) values
                                    ('" . $cin . "' ,'" . $cin . "','" . $date_depart . "' ,'" . $type . "' ,now())";
                                    $result2 = mysqli_query($data, $sql2);
                                    echo ('
                                            <div class="alert alert-success" role="alert">
                                            Votre demande a été Envoyée avec succes
                                        </div>
                                            ');
                               }

                            }

                            ?>
                            
                            <form method="POST">
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="CIN" name="cin" required>
                                        <label for="floatingInput">CIN</label>
                                      </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="floatingInput1" name="nb_jour" required >
                                        <label for="floatingInput">Nombre de jours</label>
                                      </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="floatingPassword" placeholder="Date de départ" name="date_depart" required>
                                        <label for="floatingPassword">Date de départ</label>
                                      </div>
                                </div>
                                
                                <div class="mb-3">
                                    <select class="form-select" aria-label="Default select example" style="height : 3.5rem" name="type" required >
                                        <option selected>Choisissez votre Demande</option>
                                        <option value="1">Demande de quitter le territoire</option>
                                        <option value="2">Demande de congé</option>
                                        <option value="3">Three</option>
                                      </select>
                                </div>
                                      


                                <div class="d-grid">
                                <button type="submit" class="btn btn-primary m-b-xs">Envoyer</button>
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