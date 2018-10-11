<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   Exemple.class.php                                  :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: lsauvage <lsauvage@student.42.fr>          +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/10/11 20:26:49 by lsauvage          #+#    #+#             */
/*   Updated: 2018/10/11 20:26:49 by lsauvage         ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

try {
    throw new Exception("Message de l'exception", 42);
    print( "This line will never display" . PHP_EOL );
}
catch ( Exception $exc ) {
    print( 'Got an exception Ma\'am !' . PHP_EOL );
    print( '$exc->getMessage(): ' . $exc->getMessage() . PHP_EOL );
    print( '$exc->getCode(): ' . $exc->getCode() . PHP_EOL );
    print( '$exc->getFile(): ' . $exc->getFile() . PHP_EOL );
    print( '$exc->getLine(): ' . $exc->getLine() . PHP_EOL );
    print( '$exc: ' . $exc . PHP_EOL );
}


?>
