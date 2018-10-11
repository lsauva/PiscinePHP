<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   Problem.class.php                                  :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: lsauvage <lsauvage@student.42.fr>          +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/10/11 18:00:49 by lsauvage          #+#    #+#             */
/*   Updated: 2018/10/11 18:00:49 by lsauvage         ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

class ExempleA {

    public function __construct( array $kwargs ) {
        print( 'Constructor of class ExempeA called' . PHP_EOL );
        $this->dumpJson( $kwargs );
        $this->dumpHTML( $kwargs );
        return;
    }

    public function __destruct() {
        print( 'Destructor of class ExempleA called' . PHP_EOL );
        return;
    }

    public function dumpJson( array $dict ) {
        end( $dict );
        $last = key( $dict );
        print( '{' . PHP_EOL );
        foreach( $dict as $k => $v ) {
            if ( $k !== $last )
                printf( "\t\"%s\": \"%s\",%s", $k, $v, PHP_EOL );
            else
                printf( "\t\"%s\": \"%s\"%s", $k, $v, PHP_EOL );
        }
        print( '}' . PHP_EOL );
        return;
    }

    public function dumpHTML( array $dict ) {
        echo <<<END
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Dump HTML</title>
    </head>
    <body>
        <dl>
END;
        foreach ($dict as $k => $v) {
            echo "\t\t\t<dt>$k</dt>" . PHP_EOL;
            echo "\t\t\t<dt>$v</dt>" . PHP_EOL;
        }

        echo <<<END
        </dl>
    </body>
</html>

END;
        return;
    }
}

class ExempleB {
    public function __construct( array $kwargs ) {
        print( 'Constructor of class ExempeB called' . PHP_EOL );
        $this->dumpJson( $kwargs );
        $this->dumpHTML( $kwargs );
        return;
    }

    public function __destruct() {
        print( 'Destructor of class ExempleB called' . PHP_EOL );
        return;
    }

    public function dumpJson( array $dict ) {
        end( $dict );
        $last = key( $dict );
        print( '{' . PHP_EOL );
        foreach( $dict as $k => $v ) {
            if ( $k !== $last )
                printf( "\t\"%s\": \"%s\",%s", $k, $v, PHP_EOL );
            else
                printf( "\t\"%s\": \"%s\"%s", $k, $v, PHP_EOL );
        }
        print( '}' . PHP_EOL );
        return;
    }

    public function dumpHTML( array $dict ) {
        echo <<<END
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Dump HTML</title>
    </head>
    <body>
        <dl>
END;
        foreach ($dict as $k => $v) {
            echo "\t\t\t<dt>$k</dt>" . PHP_EOL;
            echo "\t\t\t<dt>$v</dt>" . PHP_EOL;
        }

        echo <<<END
        </dl>
    </body>
</html>

END;
        return;
    }
}

?>
