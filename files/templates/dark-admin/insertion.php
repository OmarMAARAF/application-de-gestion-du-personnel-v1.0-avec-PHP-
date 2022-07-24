<?php
session_start();
include 'ConnectDb.php';
?>
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
        <title>Liste Des demandes</title>

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
    <body>
      <div class='loader'>
        <div class='spinner-grow text-primary' role='status'>
          <span class='sr-only'>Loading...</span>
        </div>
      </div>

        <div class="page-container">
          <div class="page-header">
            <nav class="navbar navbar-expand-lg d-flex justify-content-between">
              <div class="" id="navbarNav">
                <ul class="navbar-nav" id="leftNav">
                  <li class="nav-item">
                    <a class="nav-link" id="sidebar-toggle" href="#"><i data-feather="arrow-left"></i></a>
                  </li>
                  
                </ul>
                </div>
                <div class="logo">
                  <a class="navbar-brand" href="index.html"></a>
                </div>
                <div class="" id="headerNav">
                  <ul class="navbar-nav">
                   
                    <li class="nav-item dropdown">
                      <a class="nav-link notifications-dropdown" href="#" id="notificationsDropDown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php
                          $sql = "select * from demande where etat ='En attente'";
                          $result = mysqli_query($data, $sql);
                          $num=mysqli_num_rows($result);
                          echo $num;
                        ?>


                      </a>
                      <div class="dropdown-menu dropdown-menu-end notif-drop-menu" aria-labelledby="notificationsDropDown">
                        <h6 class="dropdown-header">Notifications</h6>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                          while ($row = mysqli_fetch_assoc($result)) {
                            echo'
                        <a href="liste_demande.php">
                          <div class="header-notif">
                            <div class="notif-image">
                              <span class="notification-badge bg-info text-white">
                                <i class="fas fa-bullhorn"></i>
                              </span>
                            </div>
                            <div class="notif-text">
                              <p class="bold-notif-text">demande de cin= ' . $row["cin"] .'</p>
                              <small>' . $row["date_depart"] .'</small>
                            </div>
                          </div>
                        </a>';
                          }
                        }
                        ?>
                        
                      </div>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link profile-dropdown" href="#" id="profileDropDown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="../../assets/images/avatars/profile-image.png" alt=""></a>
                      <div class="dropdown-menu dropdown-menu-end profile-drop-menu" aria-labelledby="profileDropDown">
                        
                        <a class="dropdown-item" href="login.php"><i data-feather="log-out"></i>Déconnecter</a>
                      </div>
                    </li>
                  </ul>
              </div>
            </nav>
        </div>
        <div class="page-sidebar">
                <ul class="list-unstyled accordion-menu">
                  <li class="sidebar-title">
                    Main
                  </li>
                  <li >
                    <a href="liste_demande.php"><i data-feather="edit"></i>Demandes</a>
                  </li>
                  <li >
                    <a href="adduser.php"><i data-feather="plus-circle"></i>Add user</a>
                  </li>
                  
                  <li class="active-page">
                    <a href="insertion.php"><i data-feather="share"></i>Insertion</a>
                  </li>
                  <li >
                    <a href="search.php"><i data-feather="search"></i>Recherche</a>
                  </li>
                </ul>
            </div>
            <div class="page-content">
                <div class="main-wrapper">
                    <!-- put here your main wrapper -->






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