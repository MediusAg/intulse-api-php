<?php

namespace IntulseApiWrapper;

class Curl
{
    //defines the url for the api before the endpoint
    const BASE_URL = 'https://dashboard.intulse.com/api';

    //defines the api key for authentication
    private $api_key;

    /**
     * __construct
     *
     * @param $api_key
     *
     * Sets the api key for authentication
     */
    function __construct( $api_key )
    {
        $this->api_key = $api_key;
    }

    /**
     * get_request
     *
     * @param $endpoint
     * @param array $data
     *
     * Makes a get request using curl for getting information from the api
     *
     * @return mixed
     */
    function get_request( $endpoint, $data=array() )
    {
        return $this->make_request( 'GET', $endpoint, $data );
    }

    /**
     * post_request
     *
     * @param $endpoint
     * @param array $data
     *
     * Makes a post request using curl for adding information through the api
     *
     * @return mixed
     */
    function post_request( $endpoint, $data=array() )
    {
        return $this->make_request( 'POST', $endpoint, $data );
    }

    /**
     * put_request
     *
     * @param $endpoint
     * @param array $data
     *
     * Makes a put request using curl for updating information through the api
     *
     * @return mixed
     */
    function put_request( $endpoint, $data=array() )
    {
        return $this->make_request( 'PUT', $endpoint, $data );
    }

    /**
     * delete_request
     *
     * @param $endpoint
     * @param array $data
     *
     * Makes a delete request using curl for deleting information through the api
     *
     * @return mixed
     */
    function delete_request( $endpoint, $data=array() )
    {
        return $this->make_request( 'DELETE', $endpoint, $data );
    }

    /**
     * make_request
     *
     * @param $request_type
     * @param $endpoint
     * @param array $data
     *
     * Makes a request of the defined type to the api using curl
     *
     * @return mixed
     */
    private function make_request( $request_type, $endpoint, $data=array() )
    {
        $query_string = '';
        if ( count( $data ) )
        {
            $query_string = '?' . http_build_query( $data );
        }

        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, self::BASE_URL . '/' . $endpoint . $query_string );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_USERPWD, 'api:' . $this->api_key );
        curl_setopt( $ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );

        if ( $request_type != 'GET' )
        {
            curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, $request_type );
            curl_setopt( $ch, CURLOPT_POST, true );
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $query_string );
        }

        $output = curl_exec( $ch );

        curl_close($ch);

        return $output;
    }
}