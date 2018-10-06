<?php
function auth($login, $passwd) {
    if (file_exists("../private/passwd")) {
        # on recupere le contenu du fichier passwd a partir d'une valeur linearisee
        $tab = unserialize(file_get_contents("../private/passwd"));
        # pour chaque element cle => valeur du tab
        foreach ($tab as $key => $elem)
        {
            # on teste si les champs dans le fichier et ceux saisi sont correspondants
            if ($elem['passwd'] == hash('whirlpool', $passwd) && $elem['login'] == $login)
                return TRUE;
        }
    }
    return FALSE;
}
?>
