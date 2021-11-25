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

  <div class="formstyle">
  <h1>Modifier le profil!</h1>

<form action="profil_traitement.php" method="post">

  <fieldset class="fieldset">
      
      <div class="champs">
      <input type="text" name="login"  placeholder="<?php echo $data['login'] ?>" required="required" autocomplete="off">
      </div>

      <div class="champs">
      <input type="text" name="firstname"  placeholder="<?php echo $data['prenom'] ?>" required="required" autocomplete="off">
      </div>

      <div class="champs">
      <input type="text" name="name"  placeholder="<?php echo $data['nom'] ?>" required="required" autocomplete="off">
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