<?php
// Connexion à la base de données et inclusion des fichiers nécessaires
include "../config.php";
include "../dao/daoCategory.php";

// Vérification si le formulaire a été soumis
if (($_SERVER["REQUEST_METHOD"] == "POST")&& isset($_POST['submit'])) {
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $montant = $_POST['montant'];

    // Création de l'objet Category
    $category = new rania($nom, $montant);

    // Instanciation du DaoCategory
    $daoCategory = new DaoCategory($pdo);

    // Enregistrement de la catégorie dans la base de données
    $daoCategory->save($category);
    session_start();
    $_SESSION['category']=$category;

    // Redirection vers une autre page (par exemple, la liste des catégories)
    header('Location: ../view/chooseSpending.php');
    exit();
}
?>
