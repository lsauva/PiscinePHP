<?php
# si les champs sont remplis et que le nouveau mdp est deifferent de l'ancien
if (isset($_POST['login']) && isset($_POST['oldpw']) && isset($_POST['newpw']) && $_POST['newpw'] != $_POST['oldpw'] && isset($_POST['submit']))
{
    # on recupere le contenu du fichier passwd a partir d'une valeur linearisee
    $tab = unserialize(file_get_contents("../private/passwd"));
    # pour chaque element cle => valeur du tab
    foreach ($tab as $key => $elem)
    {
        # on teste si les champs dans le fichier et ceux saisi sont correspondants
        if ($elem['passwd'] == hash('whirlpool', $_POST['oldpw']) && $_POST['login'] == $elem['login'])
        {
            # on remplace le passwd par le hash du nouveau
            $tab[$key]['passwd'] = hash('whirlpool', $_POST['newpw']);
            $user_data_serialize = serialize($tab);
            # on ajoute le contenu serialise dans le fichier passwd
            file_put_contents("../private/passwd", $user_data_serialize);
            echo "OK\n";
        }
        else
            exit ("ERROR\n");
    }
}
else
    echo "ERROR\n";
?>
