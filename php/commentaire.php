<?php 
    session_start();
    require_once 'config.php'; // ajout connexion bdd 


    // si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
        header('Location:livre-or.php');
        die();
    }

     // On récupere les données de l'utilisateur
     $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');
     $req->execute(array($_SESSION['user']));
     $data = $req->fetch();
?>


<!-- Head -->

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/inscription.css">
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
      <?php if($data['login']== 'admin'){ echo "<li class=\"nav-item\">
        <a class=\"nav-link\" href=\"admin.php\">Admin</a>
      </li>" ;}
      ?>
      <li class="nav-item">
        <a class="nav-link" href="deconnexion.php">Deconnexion</a>
      </li>
    </ul>
    <span class="navbar-text">
    <?php echo $data['login'];?>
    </span>
  </div>
</nav>  



<!-- Main -->

<main>

<div class="formstyle">

                <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> inscription réussie !
                                <?php header('Location: connexion.php'); die(); ?>
                            </div>
                        <?php
                        break;
                
                        case 'short':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> Message trop court ! (au moins 5 caractere)
                            </div>
                        <?php
                        case 'nocom':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> veuillez entrer un message
                            </div>
                        <?php 

                    }
                }
                ?>

    <h1><?php echo $data['login']?> laissé(e) un commentaire !</h1>

  <form action="commentaire_traitement.php" method="post">

    <fieldset class="fieldset">
        
        <div class="champs">
        <textarea name="com"  placeholder="Message" required="required" autocomplete="off"></textarea>
        </div>

        <div class="champs">
        <input type="submit" name='submit' value="Commenter !">
        </div>
    </fieldset>

  </form>
</div>
</main>