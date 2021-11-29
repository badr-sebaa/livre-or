<?php 
    session_start();
    require_once 'config.php'; // ajout connexion bdd 
   // si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
        header('Location:../index.php');
        die();
    }

    // On récupere les données de l'utilisateur
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE id  = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
?>


<head>
    <title>Espace membre</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/profil.css">
  </head>

  <?php 
    if(isset($_GET['err'])){
      $err = htmlspecialchars($_GET['err']);
      switch($err){
                    case 'current_password':
                                            echo "<div class='alert alert-danger'>Le mot de passe actuel est incorrect</div>";
                    break;
                    
                    case 'login_size':
                                      echo "<div class='alert alert-success'>le login est trop long ! </div>";
                    break;

                    case 'success_password':
                                            echo "<div class='alert alert-success'>Le mot de passe a bien été modifié ! </div>";
                    break;
                    
                    
                  }
    }
?>


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
      </li>" ; }?>
      <li class="nav-item">
        <a class="nav-link" href="deconnexion.php">Deconnexion</a>
      </li>
    </ul>
    <span class="navbar-text">
    <?php echo $data['login'];?>
    </span>
  </div>
</nav>  


  <div class="formstyle">
  <h1>Modifier le profil!</h1>

<form action="profil_traitement.php" method="post">

  <fieldset class="fieldset">
      
      <div class="champs">
      <input type="text" name="login"  placeholder="<?php echo $data['login'] ?>" required="required" autocomplete="off">
      </div>

      <div class="champs">
      <input type="password" name="password"  placeholder="Password" required="required" autocomplete="off">
      </div>
      
      <div class="champs">
      <input type="password" name="newpassword"  placeholder="Type your New password" required="required" autocomplete="off">
      </div>

      <div class="champs">
      <input type="password" name="verify"  placeholder="Type your New password again" required="required" autocomplete="off">
      </div>

      <div class="champs">
      <input type="submit" name='submit' value="Modifier!">
      </div>
  </fieldset>
</div>
    
</form>