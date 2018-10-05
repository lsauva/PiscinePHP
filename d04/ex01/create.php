<?php
# si les 3 champs du formulaire sont remplis
if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] === 'OK') {
    # si le rep private n'existe pas
    if (!file_exists('../private'))
        # on le cree
        mkdir('../private', 0777, true);
    # si le fichier /private/passwd n'existe pas
    if (!file_exists('../private/passwd'))
        # on le cree
        touch('../private/passwd');
    # on recupere le contenu du fichier passwd a partir d'une valeur linearisee
    $content = unserialize(file_get_contents('../private/passwd'));
    # si le fichier contient qqch
    if ($content) {
        # pour chaque element cle => valeur
        foreach ($content as $k => $v) {
            # si le login trouve correspond a celui envoye via le form
            if ($v['login'] === $_POST['login'])
                # on renvoie une erreur
                exit("ERROR\n");
        }
    }
    # si le fichier ne contient rien ou si le login est different
    # on ajoute le login recupere dans le tableau
    $tab['login'] = $_POST['login'];
    # on stocke aussi le hash du mdp
    $tab['passwd'] = hash('whirlpool', $_POST['passwd']);
    $account[] = $tab;
    # on ajoute le contenu serialise dans le fichier passwd
    file_put_contents('../private/passwd', serialize($account));
    echo "OK\n";
}
# si l'un des 3 champs n'est pas valide
else
    echo "ERROR\n";

?>
