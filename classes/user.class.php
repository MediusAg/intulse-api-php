<?php

namespace IntulseApiWrapper;

/**
 * Class User
 * @package IntulseApiWrapper
 */
class User extends SimpleClass
{
    //defines the endpoint for client information
    private $endpoint = 'user';

    /**
     * get_all
     *
     * Gets all of the users
     *
     * @return mixed
     */
    function get_all()
    {
        return $this->curl->get_request( $this->endpoint . '/' );
    }

    /**
     * @param $user_id
     *
     * Gets a user by id
     *
     * @return mixed
     */
    function get_by_id( $user_id )
    {
        return $this->curl->get_request( $this->endpoint . '/' . $user_id . '/' );
    }

    /**
     * search
     *
     * @param null $first_name
     * @param null $last_name
     * @param null $email
     * @param null $mobile
     *
     * Searches users by any of the available fields
     *
     * @return mixed
     */
    function search( $first_name=null, $last_name=null, $email=null, $mobile=null )
    {
        $params = array
        (
            'firstName' => $first_name
            , 'lastName' => $last_name
            , 'email' => $email
            , 'mobile' => $mobile
        );
        return $this->curl->get_request( $this->endpoint . '/search/', $params );
    }
}