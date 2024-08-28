<?php
// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "med1";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    if (!empty($nom) && !empty($email)) {
        // Préparer la requête SQL
        $sql = "INSERT INTO testform (nom, email) VALUES ('$nom', '$email')";

        // Exécuter la requête SQL
        if ($conn->query($sql) === TRUE) {
            echo "Nouvel enregistrement ajouté avec succès";
            header("Location: index.html"); // Redirige vers index.html
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}

// Fermer la connexion
$conn->close();
?>



<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un utilisateur</title>
</head>
<body>
    <form action="tct.php" method="post">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        


       <button>Ajouter </button>
      <a href="tct.php"></a>
    </form>
</body>
</html>
