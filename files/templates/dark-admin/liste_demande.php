<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
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
                  <li>
                    <a href="index.php"><i data-feather="home"></i>Dashboard</a>
                  </li>
                  <li >
                    <a href="adduser.php"><i data-feather="plus-circle"></i>Add user</a>
                  </li>
                  <li class="active-page">
                    <a href="liste_demande.php"><i data-feather="edit"></i>Demandes</a>
                  </li>
                </ul>
            </div>
            <div class="page-content">
                <div class="main-wrapper">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8">
                                            <h2>Liste Des Demandes</h2>
                                        </div>
                                    </div>
                                  
                                    <div class="row">
                                      <div class="table-responsive">
                                        <table class="table invoice-table">
                                            <thead>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Date de prise</th>
                                                <th scope="col">Cin</th>
                                                <th scope="col">Nombre de jours</th>
                                                <th scope="col">Date de depart</th>
                                                <th scope="col">Etat</th>
                                                
                                                <th>Action</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <?php
                                              
                                                 
                                                 
                                                 //les demandes en attente
                                                 $sql = "select * from demande where etat ='En attente'";
                                                 $result = mysqli_query($data, $sql);
                                                $i=0;
                                                 // $row = mysqli_fetch_array($result);
                                                 if (mysqli_num_rows($result) > 0) {
                                                  while ($row = mysqli_fetch_assoc($result)) {
                                                  
                                                  
                                                  
                                                  
                                                  echo '
                                                  <tr>
                                                  <th scope="row"> ' . $row["id"]  .' </th>
                                                  <td>' .$row["date_prise"] .'</td>
                                                  <td>' . $row["cin"] .'</td>
                                                  <td>' . $row["nb_jours"] .'</td>
                                                  <td>' . $row["date_depart"] .'</td>
                                                  <td><span class="badge bg-warning">En attente</span></td>';
                                                  if($_SESSION["usertype"]=="admin"){
                                                    echo'
                                                  <td>

                                                  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalCenter'.$i.'">
                                                    Validée
                                                  </button>
                                                  <div class="modal fade" id="exampleModalCenter'.$i.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalCenterTitle">Validée La Demande</h5>
                                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        êtes-vous sûr de vouloir valider cette Demande
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermée</button>
                                                          <button type="button" class="btn btn-success"> <a href="valider.php?id=' . $row['id'] . '" style ="color: white ;"><i data-feather="check-square" style ="color: white ;"> </i>  Validée</a></button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>

                                                  <div class="modal fade" id="exampleModalCenter2'.$i.'" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalCenterTitle">Refusée La Demade</h5>
                                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        êtes-vous sûr de vouloir refuser cette Demande
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermée</button>
                                                          <button type="button" class="btn btn-primary" style="background-color: #fc7878; "><a href="refuser.php?id=' . $row['id'] . '" style ="color: white ;"><i data-feather="x-circle" style ="color: white ;"></i>  Refusée</a></button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter2'.$i.'" style="background-color: #fc7878;">
                                                    Refusée
                                                  </button>


                                                    
                                                   
                                                  </td>
                                                  </tr>
                                                  ';}
                                                  else{
                                                    echo"<td>--</td> </tr>";
                                                  }
                                                  
                                                  $i++;
                                                  }
                                                }

                                                //Les demandes validées
                                                
                                                $sql = "select * from demande where etat ='valide'";
                                                 $result = mysqli_query($data, $sql);
                                                $j=0;
                                                 // $row = mysqli_fetch_array($result);
                                                 if (mysqli_num_rows($result) > 0) {
                                                  while ($row = mysqli_fetch_assoc($result)) {
                                                    $sql2="select employe.nom,employe.prenom,grade.type_grade from employe,emploi,grade where employe.num_carte='".$row["cin"]."' and employe.num_carte=emploi.cin and emploi.id=grade.id_emploi;";
                                                    $result2 = mysqli_query($data, $sql2);
                                                    $row2 = mysqli_fetch_array($result2);
                                                    $fullname =" " .$row2["nom"]." " .$row2["prenom"]."";
                                                    $grade =$row2["type_grade"];
                                                  
                                                  
                                                  
                                                  echo '
                                                  <tr>
                                                  <th scope="row"> ' . $row["id"]  .' </th>
                                                  <td>' .$row["date_prise"] .'</td>
                                                  <td>' . $row["cin"] .'</td>
                                                  <td>' . $row["nb_jours"] .'</td>
                                                  <td>' . $row["date_depart"] .'</td>
                                                  <td><span class="badge bg-success">Validée</span></td>';
                                                  if($_SESSION["usertype"]=="admin"){
                                                    echo '
                                                  <td>
                                                  
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter2'.$j.'" style="background-color: #fc7878;" >
                                                  Refusée
                                                </button>

                                                <div class="modal fade" id="exampleModalCenter2'.$j.'" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalCenterTitle">Refusée La Demade</h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    êtes-vous sûr de vouloir refuser cette Demande
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermée</button>
                                                      <button type="button" class="btn btn-primary" style="background-color: #fc7878; "><a href="refuser.php?id=' . $row['id'] . '" style ="color: white ;"><i data-feather="x-circle" style ="color: white ;"></i>  Refusée</a></button>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>

                                                
                                                <button type="button" class="btn btn-primary" onclick="genPDF(\'' . $row["type"] .'\',\'' . $row["nb_jours"] .'\',\'' . $fullname .'\',\'' . $grade .'\',\'' . $row["cin"] .'\',\'' . $row["date_depart"] .'\',)">
                                                  Extraire
                                                </button>
                                                

                                                  </td>
                                                  </tr>';
                                                  }
                                                  else{
                                                    echo'
                                                    <td>
                                                    
                                                    <button type="button" class="btn btn-primary" onclick="genpdf()">
                                                      Extraire
                                                    </button>
                                                    </td>
                                                    </tr>';
                                                  }
                                                  
                                                  $j++;
                                                  }
                                                }

                                                //les demandes refusées
                                                $sql = "select * from demande where etat ='refuse'";
                                                 $result = mysqli_query($data, $sql);
                                                 $r=0;

                                                 // $row = mysqli_fetch_array($result);
                                                 if (mysqli_num_rows($result) > 0) {
                                                  while ($row = mysqli_fetch_assoc($result)) {
                                                  
                                                  
                                                  
                                                  
                                                  echo '
                                                  <tr>
                                                  <th scope="row"> ' . $row["id"]  .' </th>
                                                  <td>' .$row["date_prise"] .'</td>
                                                  <td>' . $row["cin"] .'</td>
                                                  <td>' . $row["nb_jours"] .'</td>
                                                  <td>' . $row["date_depart"] .'</td>
                                                  <td><span class="badge bg-danger" style="background-color: #fc7878;">Refusée</span></td>';
                                                  if($_SESSION["usertype"]=="admin"){
                                                    echo '

                                                  <td>
                                                  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalCenter'.$r.'">
                                                  Validée
                                                  </button>
                                                  <div class="modal fade" id="exampleModalCenter'.$r.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalCenterTitle">Validée La Demande </h5>
                                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        êtes-vous sûr de vouloir valider cette Demande
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermée</button>
                                                          <button type="button" class="btn btn-success"> <a href="valider.php?id=' . $row['id'] . '"><i data-feather="check-square"> </i>   Validée</a></button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                    </td>
                                                    
                                                  </tr>
                                                  ';
                                                  }else{
                                                    echo"<td>--</td> </tr>";
                                                  }
                                                  $r++;
                                                  }
                                                }
                                              
                                              
  
                                                
                                                
                                                  
                                                  

                                              ?>
                                              
                                              
                                            </tbody>
                                          </table>
                                          </div>
                                    </div>
                                    
                            </div>
                        </div>
                    </div>
                </div>
                                  
                </div>
              
            </div>
        
        <!-- Javascripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
        <script>
          function genPDF(type,jr, nom, grade, cin,depart) {
  
  console.log(type,jr, nom, grade, cin);
  if(type==2){
  let doc = new jsPDF();
  let img = new Image();
  img.src = "conge_p1.png";
  let img2 = new Image();
  img2.src = "conge_p2.png";
  console.log(img2)
  img.onload = () => {
    doc.addImage(img, "png", 0, 0, 220, 150);
    doc.addImage(img2, "png", 0, 160, 210, 80);
    doc.text(50, 171, ""+jr);
    doc.text(90, 185, ""+nom);
    doc.text(90, 198, ""+grade);
    doc.text(160, 212, ""+cin);
  doc.save("myPDF.pdf");
  }
  }else{
      let doc = new jsPDF();
        let img = new Image()
        img.src = 'aut_p1.png'
        let img2 = new Image()
        img2.src = 'aut_p2.png'
        img.onload=()=>{
        doc.addImage(img,"png",0, 0,200,150)
        doc.addImage(img2,"png",0, 160,220,90);
        doc.text(100,135,""+nom)
        doc.text(100,145,""+grade)
        doc.text(80,168,""+cin)
        doc.text(80,180,jr+"jours")
        doc.text(78,194,depart)
        doc.save('myPDF.pdf');
  }
}
          }
        </script>
        <script src="../../assets/plugins/jquery/jquery-3.4.1.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="../../assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
        <script src="../../assets/js/main.min.js"></script>
    </body>
</html>