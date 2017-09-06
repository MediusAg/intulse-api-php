<?php

namespace IntulseApiWrapper;

/**
 * Class SimpleClass
 * @package IntulseApiWrapper
 */
abstract class SimpleClass
{
    //curl object
    protected $curl;

    /**
     * __construct
     * @param $api_key
     *
     * Sets the curl variable to a new instance of the curl object
     */
    function __construct( $api_key )
    {
        $this->curl = new Curl( $api_key );
    }
}