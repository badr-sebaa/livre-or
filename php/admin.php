
<?php 
    session_start();
    require_once 'config.php'; // ajout connexion bdd 

      // si la session existe pas soit si l'on est pas connecté on redirige
      if(!isset($_SESSION['user'])){
        header('Location:../index.php');
        die();
       }

     // On récupere les données de l'utilisateur
     $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');
     $req->execute(array($_SESSION['user']));
     $data = $req->fetch();
?>



<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin.css">
</head>


<!-- HEADER -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Livre d'or </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index_co.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profil.php">Profil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="livre-or.php">Livre d'or</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="deconnexion.php">Deconnexion</a>
      </li>
    </ul>
    <span class="navbar-text">
    <?php echo $data['login'];?>
    </span>
  </div>
</nav>  

<body>

        <!-- CONNECTION ET SELECTION DE LA DB-->
    <?php
        session_start();
        require_once 'config.php'; // ajout connexion bdd 

        // On récupere les données de l'utilisateur
        $req = $bdd->query('SELECT * FROM utilisateurs ');
    ?>

        <!-- CREATION DU TABLEAU -->

        <table>
            <!-- entete du tableau -->
    <thead>
    <tr> 
        <th scope="col">id</th>
        <th scope="col">login</th>
        <th scope="col">password</th>
    </tr>
    </thead>
            <!-- corps du tableau -->
    <tbody>
        <?php
            while ($donnees = $req->fetch())
            {
                //On affiche l'id et le nom du client en cours
                echo "</TR>";
                echo "<TH> $donnees[id] </TH>";
                echo "<TH> $donnees[login] </TH>";
                echo "<TH> $donnees[password] </TH>";
                echo "</TR>";
            }
        ?>  
    </tbody>    
    </table>
    
    </body>