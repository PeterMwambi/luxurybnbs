<?php

namespace Models\Auth;

use Exception;
use Models\Core\App\Utilities\Session;

class Token
{


    /**
     * Summary of instance
     * @var Token
     */
    private static $instance = null;

    /**
     * Summary of tokenName
     * @var string
     */
    private $tokenName = "";

    /**
     * Summary of token
     * @var string
     */
    private $token = "";

    /**
     * Summary of privateKey
     * @var string
     */
    private $privateKey = "";

    /**
     * Summary of user token
     * @var string
     */
    private $userToken = "";


    /**
     * Summary of tokenName
     * @return string
     */
    protected function getTokenName()
    {
        if (!empty($this->tokenName)) {
            return $this->tokenName;
        } else {
            throw new Exception("Warning: Token name has not been defined");
        }
    }

    /**
     * Summary of tokenName
     * @param string $tokenName Summary of tokenName
     * @return self
     */
    protected function setTokenName($tokenName): self
    {
        $this->tokenName = $tokenName;
        return $this;
    }

    /**
     * Summary of token
     * @return string
     */
    protected function getToken()
    {
        if (!empty($this->token)) {
            return $this->token;
        } else {
            throw new Exception("Warning: Token has not been defined");
        }
    }

    /**
     * Summary of token
     * @param string $token Summary of token
     * @return self
     */
    protected function setToken($token): self
    {
        $this->token = $token;
        return $this;
    }

    /**
     * Summary of privateKey
     * @return string
     */
    protected function getPrivateKey()
    {
        if (!empty($this->privateKey)) {
            return $this->privateKey;
        } else {
            throw new Exception("Warning: Private key has not yet been defined");
        }
    }

    /**
     * Summary of privateKey
     * @param string $privateKey Summary of privateKey
     * @return self
     */
    protected function setPrivateKey($privateKey): self
    {
        $this->privateKey = $privateKey;
        return $this;
    }

    /**
     * Summary of user token
     * @return string
     */
    protected function getUserToken()
    {
        if (!empty($this->userToken)) {
            return $this->userToken;
        } else {
            throw new Exception("Warning: User token has not been defined");
        }
    }

    /**
     * Summary of user token
     * @param string $userToken Summary of user token
     * @return self
     */
    protected function setUserToken($userToken): self
    {
        $this->userToken = $userToken;
        return $this;
    }

    protected function generateToken()
    {
        $this->setPrivateKey($this->getTokenName() . session_id());
        $this->setToken(hash_hmac("sha256", bin2hex(random_bytes(128)), $this->getPrivateKey()));
        $this->storeToken();
    }

    protected function storeToken()
    {
        Session::set($this->getTokenName(), $this->getToken());
        return;
    }

    protected function verifyToken()
    {
        if (Session::exists($this->getTokenName())) {
            $knownToken = Session::get($this->getTokenName());
            if (hash_equals($knownToken, $this->getUserToken())) {
                return true;
            } else {
                return false;
            }
        }
    }

    public static function run()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Token;
        }
        return self::$instance;
    }


    public static function generate(string $tokenName)
    {
        self::$instance->setTokenName($tokenName);
        self::$instance->generateToken();
        return self::$instance->getToken();
    }

    public static function verify(string $userToken, string $knownToken)
    {
        self::$instance->setUserToken($userToken);
        self::$instance->setTokenName($knownToken);
        if (self::$instance->verifyToken()) {
            return true;
        } else {
            return false;
        }
    }




}