<?php

namespace IntulseApiWrapper;

/**
 * Class Intulse
 * @package IntulseApiWrapper
 */
class Intulse
{
    //api key for authentication
    private $api_key;

    /**
     * __construct
     *
     * @param $api_key
     *
     * Sets the private authentication api_key variable
     */
    function __construct( $api_key )
    {
        $this->api_key = $api_key;
    }

    /**
     * call
     *
     * Gets a new instance of the class that handles the call endpoint
     *
     * @return Call
     */
    function call()
    {
        return new Call( $this->api_key );
    }

    /**
     * user
     *
     * Gets a new instance of the class that handles the user endpoint
     *
     * @return User
     */
    function user()
    {
        return new User( $this->api_key );
    }
}