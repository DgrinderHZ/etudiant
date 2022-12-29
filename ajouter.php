<?php include("template/header.php"); ?>
<section class="container grey-text">
    <h2 class="center">Ajouter un etudiant</h2>
    <form action="ajouter.php" class="white" method="POST">
        <div>
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom">
        </div>
        <div>
            <label for="prenom">Prenom:</label>
            <input type="text" name="prenom" id="prenom">
        </div>
        <div>
            <label for="date_naissance">Date naissance:</label>
            <input type="date" name="date_naissance" id="date_naissance">
        </div>
        <div>
            <label for="cin">CIN:</label>
            <input type="text" name="cin" id="cin">
        </div>
        <div>
            <label for="password">Mot de passe:</label>
            <input type="password" name="password" id="password">
        </div>
        <div class="center">
            <input type="submit" value="submit" name="submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>
<?php include("template/footer.php"); ?>
