<?php

namespace Models\Core\App\Routes\Shell;

use Exception;
use Models\Auth\Input;
use Models\Core\App\Helpers\Formatter;
use Models\Core\App\Routes\Kernel\Config;
use Models\Core\App\Routes\Kernel\Handler;


/**
 * @author Peter Mwambi <calebmwambi@gmail.com>
 * @package Routes
 * @date Sat Dec 31 2022 08:36:58 GMT+0300 (East Africa Time)
 * @updated Sat Dec 31 2022 08:36:58 GMT+0300 (East Africa Time) 
 */
class Dispatch extends Register
{
    private $request;

    private $routes;

    private $route;


    public function verifyRoute()
    {
        $this->request = $this->GetRequest();
        $this->routes = $this->GetRoutes();
        if (Formatter::verifyArrayKey($this->request, (array) $this->routes)) {
            $request = $this->request;
            $this->setRouteParams($this->routes->$request);
            return true;
        } else {
            $this->setResponseCode(404);
            return false;
        }
    }

    public function verifyRequest()
    {
        $methods = $this->getRouteMethods();
        if (in_array($_SERVER["REQUEST_METHOD"], $methods)) {
            return true;
        } else {
            throw new Exception("Warning: Invalid request method");
        }
    }

    public function verifyParams(string $param, string $paramName)
    {
        $getParams = $this->getRouteRequestParams($paramName);
        foreach (Input::getParams($param) as $param) {
            if (!Formatter::verifyArrayKey($param, $getParams)) {
                $this->SetResponseCode(400);
                throw new Exception("Warning: {$param} does not exist");
            }
        }
    }


    public function processRoute()
    {
        $method = "Get" . $this->getRouteFunction();
        if (Formatter::verifyMethod($this, $method)) {
            return $this->$method();
        }
    }


    public function redirectTo404()
    {
        if ($this->GetResponseCode() === 404) {
            parent::Get404page();
        } else {
            throw new Exception("Warning: Call to an uncalled response" . $this->GetResponseCode());
        }
    }


    public function getRequest()
    {
        return parent::getRequest();
    }

    protected function getRoutes()
    {
        return parent::getRouteConfig();
    }


    /**
     * Summary of GetRouteParams
     * @return object
     */
    private function getRouteParams()
    {
        if (isset($this->route)) {
            return $this->route;
        } else {
            throw new Exception("Warning: Route has not been set");
        }
    }

    private function setRouteParams(mixed $route)
    {
        $this->route = $route;
    }


    private function getRouteMethods()
    {
        return $this->getRouteParams()->methods;
    }

    private function getRouteFunction()
    {
        return $this->getRouteParams()->function;
    }

    private function getRouteRequestParams(string $paramName)
    {
        return $this->getRouteParams()->$paramName;
    }
    private function setResponseCode(int $code)
    {
        return http_response_code($code);
    }

    private function getResponseCode()
    {
        return http_response_code();
    }

}