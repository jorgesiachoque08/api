<?php

class OauthAccessTokens extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $access_token;

    /**
     *
     * @var string
     */
    public $client_id;

    /**
     *
     * @var string
     */
    public $user_id;

    /**
     *
     * @var string
     */
    public $expires;

    /**
     *
     * @var string
     */
    public $scope;

    /**
     *
     * @var string
     */
    public $date_create;

    /**
     * Method to set the value of field access_token
     *
     * @param string $access_token
     * @return $this
     */
    public function setAccessToken($access_token)
    {
        $this->access_token = $access_token;

        return $this;
    }

    /**
     * Method to set the value of field client_id
     *
     * @param string $client_id
     * @return $this
     */
    public function setClientId($client_id)
    {
        $this->client_id = $client_id;

        return $this;
    }

    /**
     * Method to set the value of field user_id
     *
     * @param string $user_id
     * @return $this
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Method to set the value of field expires
     *
     * @param string $expires
     * @return $this
     */
    public function setExpires($expires)
    {
        $this->expires = $expires;

        return $this;
    }

    /**
     * Method to set the value of field scope
     *
     * @param string $scope
     * @return $this
     */
    public function setScope($scope)
    {
        $this->scope = $scope;

        return $this;
    }

    /**
     * Returns the value of field access_token
     *
     * @return string
     */
    public function getAccessToken()
    {
        return $this->access_token;
    }

    /**
     * Returns the value of field client_id
     *
     * @return string
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * Returns the value of field user_id
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Returns the value of field expires
     *
     * @return string
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * Returns the value of field scope
     *
     * @return string
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return OauthAccessTokens[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return OauthAccessTokens
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setReadConnectionService("db_read");
        $this->setWriteConnectionService("db");
        
        $this->belongsTo('user_id', 'TblUsers', 'id', array('alias' => 'OauthUsers'));
        $this->belongsTo('client_id', 'OauthClients', 'client_id', array('alias' => 'OauthClients'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'oauth_access_tokens';
    }

}
