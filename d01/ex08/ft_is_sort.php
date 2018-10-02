<?php
    function ft_is_sort($array) {
        $array2 = $array;
        sort($array2);
        return ($array2 == $array);
    }
?>
