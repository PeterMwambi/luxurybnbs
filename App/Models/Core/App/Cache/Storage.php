<?php


namespace Models\Core\App\Cache;

use Models\Core\App\Utilities\Session;

/**
 * @author Peter Mwambi <calebmwambi@gmail.com>
 * @date Mon Jan 09 2023 17:25:46 GMT+0300 (East Africa Time)
 * @updated Mon Jan 09 2023 17:25:46 GMT+0300 (East Africa Time)
 * 
 * @content - 
 */

class Storage
{

    public function storeToCache(array $data)
    {
        Session::start();
        Session::set("CACHE_DATA", $data, "array");
        return;
    }


    public static function getFromCache()
    {
        if (empty($_SESSION)) {
            Session::start();
        }
        return Session::get("CACHE_DATA");
    }

    public static function clearCache()
    {
        Session::Start();
        if (Session::exists("CACHE_DATA")) {
            Session::destroy("CACHE_DATA");
        }
        return;
    }
}