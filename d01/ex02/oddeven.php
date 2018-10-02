#!/usr/bin/php
<?php
    $handle = fopen("php://stdin", 'r');
    while ($handle && !feof($handle))
    {
        echo "Entrez un nombre: ";
        $input = fgets($handle);
        if ($input)
        {
            $input = str_replace("\n", "", "$input");
            if (is_numeric($input))
            {
                if ($input & 1)
                    echo "Le chiffre " .$input. " est Impair\n";
                else
                    echo "Le chiffre " .$input . " est Pair\n";
            }
            else
                echo " '$input'  n'est pas un chiffre\n";
        }
    }
    fclose($handle);
    echo"\n";
?>
