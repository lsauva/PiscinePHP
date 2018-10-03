#!/usr/bin/php
<?php
# pour chaque parametre du prog
foreach ($argv as $value ) {
    # sauf le nom du prog lui-meme
    if ($value != $argv[0]) {
        # on retire tous les espaces
        $tab = explode(' ', $value);
        # chaque valeur de tab est ajoutee au tableau tab2
        foreach ($tab as $value) {
            $tab2[] = $value;
        }
    }
}
# si tab2 existe (verif 0 param !)
if ($tab2) {
    # on trie le tableau
    sort($tab2);
    # chaque vakeur de tab2 est affichee sur la sortie
    foreach ($tab2 as $value) {
        echo("$value\n");
    }
}
# si on appelle ssap.php sans param
else
    echo("\r");
?>
