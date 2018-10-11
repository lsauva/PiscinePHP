<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   Exemple2.class.php                                 :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: lsauvage <lsauvage@student.42.fr>          +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/10/11 20:35:46 by lsauvage          #+#    #+#             */
/*   Updated: 2018/10/11 20:35:46 by lsauvage         ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

class AwesomeException extends Exception {

    public function __construct( $message = "", $code = 0, $previous = NULL ) {
        parent::__construct( $message, $code, $previous );
        print( 'AwesomeException constructed !' . PHP_EOL );
        return;
    }

    public function howIsThisException() {
        return 'Awesome';
    }
}

try {
    throw new AwesomeException("Message de l'exception", 42);
    print( "This line will never display" . PHP_EOL );
}
catch ( Exception $exc ) {
    print( 'Got an exception Ma\'am !' . PHP_EOL );
    print( '$exc->howIsThisException(): ' . $exc->howIsThisException() . PHP_EOL );
    print( '$exc->getMessage(): ' . $exc->getMessage() . PHP_EOL );
    print( '$exc->getCode(): ' . $exc->getCode() . PHP_EOL );
    print( '$exc->getFile(): ' . $exc->getFile() . PHP_EOL );
    print( '$exc->getLine(): ' . $exc->getLine() . PHP_EOL );
    print( '$exc: ' . $exc . PHP_EOL );
}

?>
