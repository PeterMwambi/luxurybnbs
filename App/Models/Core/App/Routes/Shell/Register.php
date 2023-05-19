<?php

namespace Models\Core\App\Routes\Shell;

use Exception;
use Models\Auth\Input;
use Models\Core\App\Routes\Kernel\Handler;
use Models\Core\App\Utilities\Url;
use Models\Core\Services\Ajax\Shell\Handler\Api as AjaxApi;

class Register extends Handler
{



    public function getHomepage()
    {
        if (file_exists($this->getClientPage())) {
            require_once($this->getClientPage());
            return;
        }
        throw new Exception("Warning: Requested file was not found");
    }

    public function get404page()
    {
        require_once(Url::getPath("app/views/pages/global/404.php"));
    }


    public function getSandbox()
    {
        require_once(Url::getPath("app/views/pages/global/sandbox.php"));
    }


    private function setFormPrimitives(string $url, string $identifier)
    {
        if (file_exists($url)) {
            if (Input::get($identifier)) {
                AjaxApi::run()->formService(Input::get($identifier));
                return;
            }
            require_once($url);
            return;
        }
        throw new Exception("Warning: Requested file was not found");
    }


    private function getClientPage()
    {
        return Url::getPath("app/views/pages/client/controller.php");
    }

    private function getStaffPage()
    {
        return Url::GetPath("app/views/pages/admin/controller.php");
    }

    public function getClientViews()
    {
        $url = $this->getClientPage();
        if (file_exists($url)) {
            require_once($url);
            return;
        }
    }

    public function getStaffViews()
    {
        $url = $this->getStaffPage();
        if (file_exists($url)) {
            require_once($url);
            return;
        }
    }

    public function getStaffForms()
    {
        $url = $this->getStaffPage();
        $identifier = "form-identifier";
        $this->setFormPrimitives($url, $identifier);
    }
    public function getClientForms()
    {
        $url = $this->getClientPage();
        $identifier = "form-identifier";
        $this->setFormPrimitives($url, $identifier);
    }

    public function getLogout()
    {
        $url = Url::getPath("app/views/pages/global/logout.php");
        if (file_exists($url)) {
            require_once($url);
        } else {
            die("false");
        }
    }



}