<p>Vous avez effectué une reservation pour:</p>

<?php

foreach ($reservations as $reservation) {
    echo '<p>' . $reservation['film_titre'] . ' la séance est le ' . $reservation['seance_date'] . ' à ' . $reservation['seance_horaire'] . '<br>
    Vous avez pris ' . $reservation['nbPlaces'] . ' place(s) pour ce film </p>';
}
