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

 // la partie suppression d'un etudiant
 if (isset($_POST['cin_delete'])) {
    $cin = mysqli_real_escape_string($conn, $_POST['cin_delete']);

    // enregistrer la requete dans une variable
    $sql = "DELETE FROM etudiant WHERE cin = '$cin'";

    // executer la requetes
   if(mysqli_query($conn, $sql)){
    // fermer la connexion
    mysqli_close($conn);
    // c'est supprimé, il allez à index.php
    header('Location: index.php');
   }else{
    echo "erreur";
   }
    // fermer la connexion
    mysqli_close($conn);
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
        <a href="#" class="btn brand z-depth-0">Modifier</a>
       <!-- DELETE form: formulaire de suppression -->
        <form action="details.php" method="post">
            <input hidden type="text" name="cin_delete" value="<?php echo htmlspecialchars($etudiant['cin']); ?>">
            <input type="submit" name="submit" value="Supprimer" class="btn brand z-depth-0">
        </form>
       <?php else: ?>
        <p>no data</p>
    <?php endif; ?>
</div>

<?php include("template/footer.php") ?>