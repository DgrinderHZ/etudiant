<?php
$errors = array("nom"=>'', "prenom"=>'', "date_naissance"=>'',
                "cin"=>'', "password"=>'');
                
if(isset($_POST["submit"])){
   //var_dump($_POST);
    if(empty($_POST["nom"])){
        $errors['nom'] = "Le nom ne doit pas etre vide!";
    }else{
        $nom = $_POST["nom"];
        echo htmlspecialchars($nom) . "<br>";
    }
    if(empty($_POST["prenom"])){
        $errors['prenom'] = "Le prenom ne doit pas etre vide!";
    }else{
        $prenom = $_POST["prenom"];
        echo $prenom . "<br>";
    }
    if(empty($_POST["date_naissance"])){
        $errors['date_naissance'] = "La date de naissance ne doit pas etre vide!";
    }else{
        $date_naissance = $_POST["date_naissance"];
        echo $date_naissance . "<br>";
    }
    if(empty($_POST["cin"])){
        $errors['cin'] = "Le CIN ne doit pas etre vide!";
    }else{
        $cin = $_POST["cin"];
        echo $cin . "<br>";
    }
    if(empty($_POST["password"])){
        $errors['password'] =  "Le mot de passe ne doit pas etre vide!";
    }else{
        $password = $_POST["password"];
        echo $password . "<br>";
    }
}
?>

<?php include("template/header.php"); ?>
<section class="container grey-text">
    <h2 class="center">Ajouter un etudiant</h2>
    <form action="ajouter.php" class="white" method="POST">
        <div>
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom">
            <div class="red-text"> <?php echo $errors['nom']; ?></div>
        </div>
        <div>
            <label for="prenom">Prenom:</label>
            <input type="text" name="prenom" id="prenom">
            <div class="red-text"> <?php echo $errors['prenom']; ?></div>
        </div>
        <div>
            <label for="date_naissance">Date naissance:</label>
            <input type="date" name="date_naissance" id="date_naissance">
            <div class="red-text"> <?php echo $errors['date_naissance']; ?></div>
        </div>
        <div>
            <label for="cin">CIN:</label>
            <input type="text" name="cin" id="cin">
            <div class="red-text"> <?php echo $errors['cin']; ?></div>
        </div>
        <div>
            <label for="password">Mot de passe:</label>
            <input type="password" name="password" id="password">
            <div class="red-text"> <?php echo $errors['password']; ?></div>
        </div>
        <div class="center">
            <input type="submit" value="submit" name="submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>
<?php include("template/footer.php"); ?>
