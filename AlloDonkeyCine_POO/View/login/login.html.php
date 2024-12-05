<?php


if (!empty($error)) {
    echo $error . "<br/>";
}

if (empty($_SESSION['user'])) {
?>
    <div class='login-container'>
        <form method="post" class='login-form'>
            <h1>Connexion</h1>
            <div class='form-group'>
                <label for='email'>
                    E-mail
                </label>
            </div>
            <div class='form-group'>
                <input type="text" name="email" id="email" placeholder="Entrez votre adresse email" required />
                <label for="password">
                    Mot de passe
                </label>
                <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe" required />
            </div>
            <br /><br />
            <input type="submit" value="Connexion" class="btn-submit" />
        </form>
        <p class="register-link">
            Si vous n'avez pas de compter, créer en un ici. <a href="/register">Inscription</a>
        </p>
        </form>
    </div>

<?php
} else {
    echo "Vous êtes déjà connecté";
}
