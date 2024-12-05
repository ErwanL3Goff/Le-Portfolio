<div class="Pablo">
    <div class="film-container2">
    <p>
    <h3>Titre: <?= $film['titre'] ?></h3>
    </p>
    <img src="../../view/images/<?= $film['picture'] ?> " class='film-image2' />
    <p>Description: <?= $film['description'] ?></p>

    <?php foreach ($seances as $seance) { ?>
        <form method="post">
            <button name='seanceId' type='submit' value="<?= $seance['id'] ?>">Reserver
                <p>Seance: <?= $seance['date'] ?> à <?= $seance['heureDebut'] ?></p>
            </button>
        </form>




    <?php } ?>
    </div>
</div>