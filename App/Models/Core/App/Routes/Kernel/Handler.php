<?php

namespace Models\Core\App\Routes\Kernel;

use Controllers\Controller;
use Exception;
use Models\Auth\Sanitize;
use Models\Core\App\Helpers\Formatter;

class Handler extends RouteGateway
{

    private $url;

    private $prefix;

    private $request;


    public function __construct()
    {
        $this->setUrl();
        $this->setPrefix();
    }

    /**
     * Summary of getPrefix
     * @throws Exception
     * @return mixed
     */
    private function getPrefix()
    {
        if (isset($this->prefix)) {
            return $this->prefix;
        } else {
            throw new Exception("Warning: URI prefix has not been set");
        }
    }

    private function setPrefix()
    {
        $this->prefix = parent::getRoutePrefix();
        return $this;
    }

    protected function getRequest()
    {
        $this->setRequest();
        return Sanitize::String(trim($this->request));
    }

    private function setRequest()
    {
        $url = $this->getUrl();
        $this->request = str_replace(Formatter::formatToArray($this->getPrefix()), "", $url["path"]);
        return;
    }

    private function getUrl()
    {
        if (count((array) $this->url)) {
            return $this->url;
        } else {
            throw new Exception("Warning: URI has not been set");
        }
    }

    private function setUrl()
    {
        $this->url = parse_url($_SERVER["REQUEST_URI"]);
        return;
    }



}