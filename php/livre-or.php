<?php 
    session_start();
    require_once 'config.php'; // ajout connexion bdd 


     // On récupere les données de l'utilisateur
     $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');
     $req->execute(array($_SESSION['user']));
     $data = $req->fetch();
?>



<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/livre-or.css">
</head>

<body>

<!-- HEADER -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Livre d'or </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href=<?php if(isset($_SESSION['user'])){echo "index_co.php";}else{echo "../index.php";} ?>>Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profil.php">Profil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="commentaire.php">Commenter !</a>
      </li>
      <?php 
      if($data['login']== 'admin'){ echo "<li class=\"nav-item\">
        <a class=\"nav-link\" href=\"admin.php\">Admin</a>
      </li>" ;}
      if(isset($_SESSION['user'])){
       echo "<li class=\"nav-item\">
        <a class=\"nav-link\" href=\"deconnexion.php\">Deconnexion</a>
      </li>";
      }
      else{echo  "<li class=\"nav-item\">
        <a class=\"nav-link\" href=\"connexion.php\">Connexion</a>
      </li> 
      <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"inscription.php\">Inscription</a>
      </li>";}
    ?>
    </ul>
    <span class="navbar-text">
     <?php $data['login'] ?>
    </span>
  </div>
</nav>  


        <!--SELECTION DE LA DB-->
    <?php

        // On récupere les données de l'utilisateur
        $req = $bdd->query('SELECT commentaires.commentaire,utilisateurs.login,commentaires.date FROM commentaires LEFT JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id');


    ?>

    <main>

    <?php
            while ($donnees = $req->fetch())
            {
                //On affiche les commentaires des utilisateurs 
                echo "<ul><li class=\"him\">".$donnees['login']." LE ".$donnees['date']."</li><li class= \"me\">".$donnees['commentaire']."</li>";
            }
        ?>  

    </main>