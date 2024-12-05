<?php


if (!empty($error)) {
    echo $error . "<br/>";
}

if (!empty($_SESSION['user'])) {
    ?>
<div class='user-container'>
    <!-- Section 1 : Informations utilisateur -->
    <section class="user-info">
        <div class="profile">
            <img src="../View/images/Profil_pic/Default.jpg" alt="Photo de profil de l'utilisateur" class='profile-pic'>
            <h1>Nom : <span>Staline</span></h1>
            <h2>Prénom : <span>Joseph</span></h2>
        </div>
    </section>

    <!-- Section 2 : Options utilisateur -->
    <section class="user-options">
        <h2>Options</h2>
        <form method="post" action="update_user.php" class="options-form">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="Modifier le nom">
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" placeholder="Modifier le prénom">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Modifier le mot de passe">
            </div>
            <button type="submit" class="btn">Mettre à jour</button>
        </form>
        <a href="logout.php" class="logout-link">Déconnexion</a>
    </section>
<?php
} else {
    echo "Vous devez vous connecter";
}