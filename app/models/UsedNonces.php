<?php

class UsedNonces extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    protected $nonce;

    /**
     * Method to set the value of field nonce
     *
     * @param string $nonce
     * @return $this
     */
    public function setNonce($nonce)
    {
        $this->nonce = $nonce;

        return $this;
    }

    /**
     * Returns the value of field nonce
     *
     * @return string
     */
    public function getNonce()
    {
        return $this->nonce;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'used_nonces';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return UsedNonces[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return UsedNonces
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
