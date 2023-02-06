<?php
require_once('config/db_connect.php');
require_once('auth/login_required.php');

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