<?php include("template/header.php"); ?>

    <h2>Ajouter un etudiant</h2>
    <form action="#">
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
    </form>
<?php include("template/footer.php"); ?>
