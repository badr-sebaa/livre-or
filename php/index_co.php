<?php 
    session_start();
    require_once 'config.php'; // ajout connexion bdd 

      // si la session existe pas soit si l'on est pas connecté on redirige
      if(!isset($_SESSION['user'])){
        header('Location:index.php');
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
    <link rel="stylesheet" href="../css/index2.css">
</head>


 <!-- Body -->
<body>
    <!-- Header -->
    <header>
    
        <h1 id= "titre">Module de connexion !</h1>

        <div class = "connect">
            <a href="profil.php"> <img alt="Qries" src="../img/modif.png" width="50px" height="auto"></a>
           <?php if($data['login']== 'admin'){ echo "<a href= \"admin.php \"> <img alt= \"Qries \" src= \"../img/admin.png \" width= \"50px \" height= \"auto \"></a>" ; }?>
            <a href="deconnexion.php"> <img alt="Qries" src="../img/deco.png" width="33%" height="auto"></a>
        </div>

    </header>
    <!-- Main -->     
    <main>
    
        <h2 id="titre_con"> Bienvenu <?php echo $data['login'] ?> </h2>
        <img src="../img/profil_type.png" class="profil" width= "25%" height= "auto" >
        <p id="text-img"></br></br></br>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea fuga architecto </br>
            vel unde! Libero laboriosam molestias ipsa est minima soluta numquam labore, </br>
            aliquid quaerat a dignissimos nihil eveniet vel fuga.</p>
    

    </main>
    <!-- Footer -->
    <footer>
    
    <a href="https://github.com/badr-sebaa/module-connexion"> <img alt="Qries" src="../img/github.svg" width="150" height="70"></a>

    </footer>

</body>