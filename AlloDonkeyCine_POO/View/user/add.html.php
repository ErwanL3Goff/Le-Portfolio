<?php

if (isset($confirmation)) {
    echo $confirmation;
} else {
    if (isset($error)) {
        echo $error . "<br/>";
    }
    ?>
<form method="post">
    <input name="email">
</form>
<?php
}