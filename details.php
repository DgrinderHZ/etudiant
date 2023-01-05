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

 // Recuperer les donnees de GET
 if (isset($_GET['cin'])) {
    $cin = mysqli_real_escape_string($conn, $_GET['cin']);

    // enregistrer la requete dans une variable
    $sql = "SELECT * FROM etudiant WHERE cin = '$cin'";

    // executer la requetes
    $result = mysqli_query($conn, $sql);

    // Transformer en un tableau associative
    $etudiant = mysqli_fetch_assoc($result);

    // Liberer les resultats
    mysqli_free_result($result);

    // fermer la connexion
    mysqli_close($conn);
 }

?>

<?php include("template/header.php") ?>

<div class="container center">
    <h2>Details</h2>
    <?php if ($etudiant): ?>
       <h4> 
        <?php 
            echo htmlspecialchars($etudiant['nom']) . ' ' . htmlspecialchars($etudiant['prenom']);
        ?>
       </h4>
       <p>Né le: <?php echo htmlspecialchars($etudiant['date_naissance']); ?></p>
       <p>Email: <?php echo htmlspecialchars($etudiant['email']); ?></p>
    <?php else: ?>
        <p>no data</p>
    <?php endif; ?>
</div>

<?php include("template/footer.php") ?>