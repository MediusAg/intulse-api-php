<?php

/**
 * Autoloads the classes
 */
spl_autoload_register(function ( $class )
{
    $class = strtolower( $class );

    $class = substr( strrchr ( $class, '\\' ), 1 );

    // if the view file exists, require it
    $file = __DIR__ . '/classes/' . $class . '.class.php';
    if ( file_exists( $file ) )
    {
        require_once $file;
    }
});