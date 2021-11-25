<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/admin.css">
</head>

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
        <th scope="col">Prenom</th>
        <th scope="col">Nom</th>
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
                echo "<TH> $donnees[prenom] </TH>";
                echo "<TH> $donnees[nom] </TH>";
                echo "<TH> $donnees[password] </TH>";
                echo "</TR>";
            }
        ?>  
    </tbody>    
    </table>
    
    </body>