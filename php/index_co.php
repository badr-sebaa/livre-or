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

<!-- Head -->

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/index2.css">
</head>


 <!-- Body -->
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
    
        <h2 id="titre_con"> Bienvenu <?php echo $data['login'] ?> </h2>
        <img src="../img/profil_type.png" class="profil" width= "25%" height= "auto" >
        <p id="text-img"></br></br></br>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos nostrum, officia natus </br>eaque cum esse aspernatur autem quisquam fugiat temporibus necessitatibus molestiae</br> tempora qui libero veniam obcaecati voluptatum numquam ipsam velit laborum culpa fugit </br>consectetur distinctio? Cum officia, consequuntur, maiores incidunt ut expedita vel</br> enim fuga ad culpa placeat nam quis saepe. Odio fugit inventore quasi blanditiis itaque odit deleniti </br>a dignissimos dicta est, possimus quia molestiae sapiente, facilis</br>saepe laborum Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam ab ex ducimus animi rem</br>, reprehenderit eaque beatae distinctio assumenda mollitia.</p>
    

    </main>
    <!-- Footer -->
    <footer>
    
    <a href="https://github.com/badr-sebaa/module-connexion"> <img alt="Qries" src="../img/github.svg" width="150" height="70"></a>

    </footer>

</body>