  
 <!-- Head -->
<head>
    <meta charset="utf-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/connexion.css">
</head>


<!-- Main -->

<main>

<div class="formstyle">
    
<?php 
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe incorrect
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte non existant
                            </div>
                        <?php
                        break;
                    }
                }
                ?> 

  <h1>Connexion !</h1>

  <form action="connexion_traitement.php" method="post">

    <fieldset class="fieldset">
        
        <div class="champs">
        <input type="text" name="login"  placeholder="Login" required="required" autocomplete="off">
        </div>

        <div class="champs">
        <input type="password" name="password"  placeholder="Password" required="required" autocomplete="off">
        </div>

        <div class="champs">
        <input type="submit" value="Envoyer">
        </div>
    </fieldset>

  </form>
</div>
</main>
