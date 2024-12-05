<div class="search-container">
  <input type="text" id="searchBar" placeholder="Rechercher un film...">
</div>

<div id="filmList">
  <?php foreach ($films as $film): ?>
    <div class="film" data-title="<?= strtolower($film['titre']); ?>">
      <img src="<?= htmlspecialchars($film['picture']); ?>" alt="<?= htmlspecialchars($film['titre']); ?>">
      <div class="film-details">
        <div class="film-title"><?= htmlspecialchars($film['titre']); ?></div>
        <div class="film-description"><?= htmlspecialchars($film['description']); ?></div>
        <div class="film-duration">Durée : <?= htmlspecialchars($film['duree']); ?></div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<script>
  // Récupérer la barre de recherche et la liste des films
  const searchBar = document.getElementById('searchBar');
  const films = document.querySelectorAll('.film');

  // Ajouter un écouteur d'événements pour la saisie utilisateur
  searchBar.addEventListener('input', function() {
    const searchText = searchBar.value.toLowerCase();

    films.forEach(function(film) {
      const filmTitle = film.getAttribute('data-title');

      if (filmTitle.includes(searchText)) {
        film.style.display = 'flex'; // Affiche le film
      } else {
        film.style.display = 'none'; // Cache le film
      }
    });
  });
</script>