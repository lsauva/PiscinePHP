<?php
# affiche les variables passees dans l'url
foreach ($_GET as $key => $value) {
    echo("$key: $value\n");
}
?>
