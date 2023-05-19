<?php

namespace Models\Core\App\Utilities;

use Exception;

/**
 * @author Peter Mwambi
 * @time Thu Sep 24 2020 09:56:28 GMT+0300 (East Africa Time)
 * @updated Tue Dec 20 2022 11:18:02 GMT+0300 (East Africa Time)
 * @content session handling
 */

class Session
{

    public static function set(string $name, mixed $value, string $type = "string"): mixed
    {
        switch ($type) {
            case 'string':
                return $_SESSION[$name] = $value;
            case 'array':
                return $_SESSION[$name][] = $value;
            default:
                return false;
        }
    }

    public static function exists(string $name): bool
    {
        if (isset($_SESSION[$name])) {
            return true;
        } else {
            return false;
        }
    }

    public static function get(string $name): mixed
    {
        if (self::Exists($name)) {
            return $_SESSION[$name];
        } else {
            return false;
        }
    }

    /**
     * @param string $name the session name
     * @return void
     *
     * Checks if a session is set, returns true and unsets the session
     * otherwise returns false if session does not exist
     */
    public static function destroy(string $name)
    {
        if (isset($_SESSION[$name])) {
            unset($_SESSION[$name]);
        }
        return;
    }

    public static function start()
    {
        if (empty(session_id())) {
            return session_start();
        }
    }

    public static function end()
    {
        return session_destroy();
    }
}