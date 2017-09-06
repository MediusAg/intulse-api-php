<?php

namespace IntulseApiWrapper;

/**
 * Class Call
 * @package IntulseApiWrapper
 */
class Call extends SimpleClass
{
    //defines the endpoint for client information
    private $endpoint = 'call';

    /**
     * @param $extension string to originate the call from
     * @param $target string un-formatted number to call (eg 8444468857)
     *
     * @return mixed
     */
    function originate( $extension, $target )
    {
        $params = array(
            'extension' => $extension
            , 'target' => $target
        );

        return $this->curl->post_request( $this->endpoint . '/', $params );
    }
}