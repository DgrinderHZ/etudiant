<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "etti_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// enregistrer la requete dans une variable
$sql = 'SELECT * FROM etudiant';

// executer la requetes
$results = mysqli_query($conn, $sql);

// Transformer en un tableau associative
$etudiants = mysqli_fetch_all($results, MYSQLI_ASSOC);

// Liberer les resultats
mysqli_free_result($results);

// fermer la connexion
mysqli_close($conn);
?>

<?php include("template/header.php"); ?>


<div class="container">
    <div class="row">
        <?php foreach($etudiants as $etudiant): ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6>
                            <?php echo htmlspecialchars($etudiant['nom']) . ' ' . htmlspecialchars($etudiant['prenom']); ?>
                        </h6>
                        
                        <p> <?php echo htmlspecialchars($etudiant['email']); ?></p>
                    </div>
                    <div class="card-action right-align">
                        <a href="#" class="brand-text">Plus d'informations...</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>    


<?php include("template/footer.php"); ?>
