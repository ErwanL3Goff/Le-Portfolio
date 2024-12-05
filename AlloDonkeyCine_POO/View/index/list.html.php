<div class='container'>

    <!--Barre de recherche-->
    <div class="search-container">
  <input type="text" id="searchBar" placeholder="Rechercher un film...">
  <div class="dropdown" id="dropdown">
    <?php foreach ($films as $film): ?>
      <div class="dropdown-item" data-title="<?= htmlspecialchars($film['titre']); ?>">
        <a href='film/show/{$film['film_id']}' class='film-link'>
        <?= htmlspecialchars($film['titre']); ?>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<script>
  const searchBar = document.getElementById('searchBar');
  const dropdown = document.getElementById('dropdown');
  const dropdownItems = document.querySelectorAll('.dropdown-item');
  const films = document.querySelectorAll('.film');

  // Afficher la liste déroulante lors du focus
  searchBar.addEventListener('focus', function() {
    dropdown.classList.add('show');
  });

  // Masquer la liste déroulante lorsqu'on clique en dehors de la barre de recherche
  document.addEventListener('click', function(e) {
    if (!searchBar.contains(e.target) && !dropdown.contains(e.target)) {
      dropdown.classList.remove('show');
    }
  });

/*On dirait que ça fonctionne*/






  // Filtrer la liste déroulante et les films en tapant dans la barre de recherche
  searchBar.addEventListener('input', function() {
    const searchText = searchBar.value.toLowerCase();

    // Filtrer les éléments dans la liste déroulante
    dropdownItems.forEach(function(item) {
      if (item.textContent.toLowerCase().includes(searchText)) {
        item.style.display = '';
      } else {
        item.style.display = 'none';
      }
    });

    // Filtrer les films affichés
    films.forEach(function(film) {
      const filmTitle = film.getAttribute('data-title');
      if (filmTitle.includes(searchText)) {
        film.style.display = 'flex';
      } else {
        film.style.display = 'none';
      }
    });
  });

  // Ajouter un événement lorsque l'utilisateur clique sur un élément de la liste déroulante
  dropdownItems.forEach(function(item) {
    item.addEventListener('click', function() {
      searchBar.value = item.textContent;
      dropdown.classList.remove('show');

      // Filtrer la liste des films selon le titre sélectionné
      const searchText = item.textContent.toLowerCase();
      films.forEach(function(film) {
        const filmTitle = film.getAttribute('data-title');
        if (filmTitle.includes(searchText)) {
          film.style.display = 'flex';
        } else {
          film.style.display = 'none';
        }
      });
    });
  });
</script>

    <!-- Films en cours de diffusion -->
    <h2 class="title">Films en cours de diffusion</h2>
    <div class="grid">
        <?php
        foreach ($currentFilms as $film) {
            echo "
        <div class='film-card'>
            <a href='film/show/{$film['film_id']}' class='film-link'>
                <img src='view/images/{$film['film_picture']}' alt='{$film['film_titre']}'class='film-image'>
                <h3 class='film-title'>{$film['film_titre']}</h3>
            <div class='film-details'>
                </a>
                <p class='film-description'>{$film['film_description']}</p>
                <p class='film-duration'><strong>Durée:</strong> {$film['film_duree']}</p>
                <p><button type='form' >Reserver</p>
            </div>
        </div>";
        }
        ?>
    </div>

    <!-- Liste de films -->
    <h2 class="title">Liste de films</h2>
    <div class="grid">
        <?php
        foreach ($films as $film) {
            echo "
        <div class='film-card'>
            <a href='film/show/{$film['id']}' class='film-link'>
                <img src='view/images/{$film['picture']}' alt='{$film['titre']}'class='film-image'>
                <h3 class='film-title'>{$film['titre']}</h3>
            <div class='film-details'>
                </a>
                <p class='film-description'>{$film['description']}</p>
                <p class='film-duration'><strong>Durée:</strong> {$film['duree']}</p>
            </div>
        </div>";
        }
        ?>
    </div>
</div>