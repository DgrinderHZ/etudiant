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

$errors = array("nom"=>'', "prenom"=>'', "date_naissance"=>'',
                "cin"=>'', "password"=>'', "email"=>'');
$nom = '';
$prenom = '';
$email = '';
$date_naissance = '';
$cin = '';
$password = '';


if(isset($_POST["submit"])){
   //var_dump($_POST);
    if(empty($_POST["nom"])){
        $errors['nom'] = "Le nom ne doit pas etre vide!";
    }else{
        $nom = $_POST["nom"];
        if(!preg_match("/^[a-zA-Z-' ]*$/",$nom)){
            $errors['nom'] = "Veuillez utiliser des lettres et des espaces!";
        }
    }
    if(empty($_POST["prenom"])){
        $errors['prenom'] = "Le prenom ne doit pas etre vide!";
    }else{
        $prenom = $_POST["prenom"];
        if(!preg_match("/^[a-zA-Z-' ]*$/",$prenom)){
            $errors['nom'] = "Veuillez utiliser des lettres et des espaces!";
        }
    }
    if(empty($_POST["email"])){
        $errors['email'] = "Le email ne doit pas etre vide!";
    }else{
        $email = $_POST["email"];
        // verifier le format d'email est valid
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = "Email n'est pas valid!";
        }
    }
    if(empty($_POST["date_naissance"])){
        $errors['date_naissance'] = "La date de naissance ne doit pas etre vide!";
    }else{
        $date_naissance = $_POST["date_naissance"];
        if(!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date_naissance)){
             $errors['date_naissance'] = "Le formt de la date n'est pas valid";
        }
    }
    if(empty($_POST["cin"])){
        $errors['cin'] = "Le CIN ne doit pas etre vide!";
    }else{
        $cin = $_POST["cin"];
    }
    if(empty($_POST["password"])){
        $errors['password'] =  "Le mot de passe ne doit pas etre vide!";
    }else{
        $password = $_POST["password"];
        if(!preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/", $password)){
            $errors['password'] =  "doit avoir majuscule, miniscule et nombres!"; 
        }
    }

    if (array_filter($errors)) {
        //echo "il y a des errors...";
    }else{
        //echo "c'est bien...";

        // ajouter l'etudiant à la base de donnée
        $password = md5($password);
        $sql = "INSERT INTO etudiant 
                VALUES ('$cin', '$nom', '$prenom', '$date_naissance', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        // redirect
        header('Location: index.php');
    }
}
?>

<?php include("template/header.php"); ?>
<section class="container grey-text">
    <h2 class="center">Ajouter un etudiant</h2>
    <form action="ajouter.php" class="white" method="POST">
        <div>
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" value="<?php echo htmlspecialchars($nom);?>">
            <div class="red-text"> <?php echo $errors['nom']; ?></div>
        </div>
        <div>
            <label for="prenom">Prenom:</label>
            <input type="text" name="prenom" id="prenom" value="<?php echo htmlspecialchars($prenom);?>">
            <div class="red-text"> <?php echo $errors['prenom']; ?></div>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($email);?>">
            <div class="red-text"> <?php echo $errors['email']; ?></div>
        </div>
        <div>
            <label for="date_naissance">Date naissance:</label>
            <input type="date" name="date_naissance" id="date_naissance" value="<?php echo htmlspecialchars($date_naissance); ?>">
            <div class="red-text"> <?php echo $errors['date_naissance']; ?></div>
        </div>
        <div>
            <label for="cin">CIN:</label>
            <input type="text" name="cin" id="cin" value="<?php echo htmlspecialchars($cin); ?>">
            <div class="red-text"> <?php echo $errors['cin']; ?></div>
        </div>
        <div>
            <label for="password">Mot de passe:</label>
            <input type="password" name="password" id="password" value="<?php echo htmlspecialchars($password); ?>">
            <div class="red-text"> <?php echo $errors['password']; ?></div>
        </div>
        <div class="center">
            <input type="submit" value="submit" name="submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>
<?php include("template/footer.php"); ?>
