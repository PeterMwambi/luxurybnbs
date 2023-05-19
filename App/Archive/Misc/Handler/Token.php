<?php

use Models\Auth\Hashing;
use Models\Core\App\Utilities\Session;

/**
 * @author Peter Mwambi
 * @date Wed Sep 23 2020 21:49:59 GMT+0300 (East Africa Time)
 * @content CSRF protection class
 * Generates CSRF protection tokens
 * Ability to view all current generated sessions in the database
 */
class Token
{

    private $token_id = null;

    /**
     * @var string $tokenName
     * 
     * The token name
     */
    private static $tokenName = null;

    /**
     * @var string $token
     * 
     * The token generated
     */
    private static $token = null;

    /**
     * @var string $_instance
     * 
     * Instance of the token class
     */

    private static $instance = null;

    /**
     * Token Instance
     * @param string $tokenName
     * @return string/false 
     * 
     * Checks the token name, if the token is not a string it returns false.
     * This function also sets the token name and returns the token class
     * as an instance
     */
    private $user_agent;


    private $ip_address;


    private $token_data;

    private static $privateKey;



    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Token();
            return self::$instance;
        }
        return false;
    }

    public function create(string $tokenName)
    {
        if (false !== $this->generate($tokenName)) {
            return $this->generate($tokenName);
        }
        return false;
    }

    /**
     * Token GUI display
     * @param null
     * @return string/false
     * 
     * Checks if the token variable is set, stores the 
     * contents of the token variable in a session and returns
     * the generated token as a string. If the token variable is not
     * set it returns false.
     */
    private static function generate(string $tokenName)
    {
        if (!empty($tokenName)) {
            self::$tokenName = $tokenName;
            self::$privateKey = self::$tokenName . session_id() . uniqid() . rand(1000, 10000);
            self::$token = hash_hmac("sha256", bin2hex(random_bytes(128)), self::$privateKey);
            $encryptedToken = Hashing::encrypt(self::$token);
            self::$token_id = uniqid() . rand(10000, 100000);
            if (self::processStorage()) {
                return $encryptedToken;
            }
            return false;
        }
        return false;
    }

    public function showContents()
    {
        if (isset(self::$tokenName)) {
            return Hashing::decrypt(Session::get(self::$tokenName));
        }
    }

    private static function processStorage()
    {
        if (isset(self::$tokenName) && isset(self::$token)) {
            Session::set(self::$tokenName, Hashing::encrypt(self::$token), "array");
            return true;
        }
        return false;
    }




    public function validate(string $tokenName, string $token_value)
    {
        if ($this->processValidation($tokenName, $token_value)) {
            return true;
        }
        // trigger_error("Validation procedure failed please check field");
        return false;
    }
    /**
     * Token Validator
     * @param string $token the token to validate
     * @return bool
     * 
     * Gets the set token value and checks wheter it is a string. The function
     * compares it with the value stored in the token name 
     * Session. If the value is correct it returns true otherwise false
     * 
     */

    private function processValidation(string $tokenName, string $token_value)
    {
        if (!empty($tokenName)) {
            $tokenName = Hashing::decrypt($tokenName);
            die($tokenName);
            if (Session::exists($tokenName)) {
                $known_token = Hashing::decrypt(Session::get($tokenName));
                $user_token = Hashing::decrypt($token_value);
                if ($this->compare($known_token, $user_token)) {
                    return true;
                }
                return false;
            }
            // trigger_error("session does not exist");
            return false;
        }

        return false;
    }

    public function destroy($tokenName)
    {
        if (isset($tokenName)) {
            return false;
        }
        $tokenName = Hashing::decrypt($tokenName);
        if (Session::exists($tokenName)) {
            Session::destroy($tokenName);
            return true;
        }
        return false;
    }

    public static function compare($known_string, $user_string)
    {
        if (!empty($known_string) && !empty($user_string)) {
            if (!hash_equals($known_string, $user_string)) {
                return false;
            }
            return true;
        }
        return false;
    }
}