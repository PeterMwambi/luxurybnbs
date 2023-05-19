<?php


namespace Models\Components;

use Exception;
use Models\Auth\Token;
use Models\Core\App\Helpers\Formatter;
use Models\Core\App\Routes\Shell\Dispatch;
use Models\Core\App\Utilities\Session;
use Models\Core\App\Utilities\Url;

class PageComponent extends Dispatch
{

    /**
     * Summary of authPages
     * @var array
     */
    private $authPages = [];

    /**
     * Summary of hasAuth
     * @var bool
     */
    private $hasAuth = false;

    /**
     * Summary of authIdentifier
     * @var string
     */
    private $authIdentifier = "";

    /**
     * Summary of authTokenIdentifier
     * @var string
     */
    private $authTokenIdentifier = "";

    /**
     * Summary of redirectPage
     * @var string
     */
    private $redirectPage = "";
    /**
     * Summary of date
     * @var mixed
     */
    private $date;
    /**
     * Summary of action
     * @var string;
     */
    private $action;
    /**
     * Summary of meta
     * @var string
     */
    private $meta = "";

    /**
     * Summary of scripts
     * @var string
     */
    private $scripts = "";
    /**
     * Summary of pages
     * @var mixed
     */
    private $pages = array();
    /**
     * Summary of specialRequests
     * @var mixed
     */
    private $specialRequests = array();

    /**
     * Summary of pageHandlers
     * @var array
     */
    private $pageHandlers = array();
    /**
     * Summary of pageHandlerFunctions
     * @var array
     */

    /**
     * Summary of title
     * @return string
     */
    public function getTitle()
    {
        return ucfirst(str_replace("-", " ", parent::getRequest()));
    }
    /**
     * Summary of pages
     * @return mixed
     */
    protected function getPages()
    {
        return $this->pages;
    }

    /**
     * Summary of pages
     * @param mixed $pages Summary of pages
     * @return self
     */
    public function setPages(array $pages): self
    {
        $this->pages = $pages;
        return $this;
    }

    /**
     * Summary of specialRequests
     * @return mixed
     */
    protected function getSpecialRequests()
    {
        return $this->specialRequests;
    }

    /**
     * Summary of specialRequests
     * @param mixed $specialRequests Summary of specialRequests
     * @return self
     */
    public function setSpecialRequests($specialRequests): self
    {
        $this->specialRequests = $specialRequests;
        return $this;
    }

    /**
     * Summary of meta
     * @return string
     */
    protected function getMeta()
    {
        if (!empty($this->meta)) {
            return $this->meta;
        } else {
            throw new Exception("Warning: Meta link has not been defined");
        }
    }

    /**
     * Summary of meta
     * @param string $meta Summary of meta
     * @return self
     */
    public function setMeta(string $meta): self
    {
        $this->meta = $meta;
        return $this;
    }

    /**
     * Summary of scripts
     * @return string
     */
    protected function getScripts()
    {
        if (!empty($this->scripts)) {
            return $this->scripts;
        } else {
            throw new Exception("Warning: Scripts have not been defined");
        }
    }

    /**
     * Summary of scripts
     * @param string $scripts Summary of scripts
     * @return self
     */
    public function setScripts($scripts): self
    {
        $this->scripts = $scripts;
        return $this;
    }
    /**
     * Summary of pageHandlers
     * @return array
     */
    protected function getPageHandlers()
    {
        return $this->pageHandlers;
    }

    /**
     * Summary of pageHandlers
     * @param array $pageHandlers Summary of pageHandlers
     * @return self
     */
    public function setPageHandlers(array $pageHandlers): self
    {
        $this->pageHandlers = $pageHandlers;
        return $this;
    }

    /**
     * Summary of action
     * @return string
     */
    protected function getAction()
    {
        if (!empty($this->action)) {
            return $this->action;
        } else {
            throw new Exception("Warning: Action has not been defined");
        }
    }

    /**
     * Summary of action
     * @param string $action Summary of action
     * @return self
     */
    public function setAction(string $action): self
    {
        $this->action = $action;
        return $this;
    }
    /**
     * Summary of date
     * @return mixed
     */
    public function getDate()
    {
        if (!empty($this->date)) {
            return $this->date;
        } else {
            throw new Exception("Warning: Date has not been defined");
        }
    }

    /**
     * Summary of date
     * @return self
     */
    public function setDate(): self
    {
        $this->date = date("l, d/m/Y");
        return $this;
    }

    /**
     * Summary of authPages
     * @return array
     */
    private function getAuthPages()
    {
        if (count($this->authPages)) {
            return $this->authPages;
        } else {
            throw new Exception("Warning: Auth pages have not been defined");
        }
    }

    /**
     * Summary of authPages
     * @param array $authPages Summary of authPages
     * @return self
     */
    public function setAuthPages(array $authPages): self
    {
        $this->authPages = $authPages;
        return $this;
    }

    /**
     * Summary of hasAuth
     * @return bool
     */
    public function hasAuth()
    {
        return $this->hasAuth;
    }

    /**
     * Summary of hasAuth
     * @param bool $hasAuth Summary of hasAuth
     * @return self
     */
    public function setHasAuth(bool $hasAuth): self
    {
        $this->hasAuth = $hasAuth;
        return $this;
    }

    /**
     * Summary of authIdentifier
     * @return string
     */
    private function getAuthIdentifier()
    {
        if (!empty($this->authIdentifier)) {
            return $this->authIdentifier;
        } else {
            throw new Exception("Warning: Auth identifier has not been defined");
        }
    }

    /**
     * Summary of authIdentifier
     * @param string $authIdentifier Summary of authIdentifier
     * @return self
     */
    public function setAuthIdentifier(string $authIdentifier): self
    {
        $this->authIdentifier = $authIdentifier;
        return $this;
    }

    /**
     * Summary of authTokenIdentifier
     * @return string
     */
    private function getAuthTokenIdentifier()
    {
        if (!empty($this->authTokenIdentifier)) {
            return $this->authTokenIdentifier;
        } else {
            throw new Exception("Warning: Auth token identifeir has not been defined");
        }
    }

    /**
     * Summary of authTokenIdentifier
     * @param string $authTokenIdentifier Summary of authTokenIdentifier
     * @return self
     */
    public function setAuthTokenIdentifier(string $authTokenIdentifier): self
    {
        $this->authTokenIdentifier = $authTokenIdentifier;
        return $this;
    }

    /**
     * Summary of redirectPage
     * @return string
     */
    public function getRedirectPage()
    {
        if (!empty($this->redirectPage)) {
            return $this->redirectPage;
        } else {
            throw new Exception("Warning; Redirect page has not been  defined");
        }
    }

    /**
     * Summary of redirectPage
     * @param string $redirectPage Summary of redirectPage
     * @return self
     */
    public function setRedirectPage(string $redirectPage): self
    {
        $this->redirectPage = $redirectPage;
        return $this;
    }


    private function getHeadWithMeta()
    {
        echo "<head>";
        require_once(Url::getPath($this->getMeta()));
        echo "</head>";
    }

    private function getPageScripts()
    {
        require_once(Url::getPath($this->getScripts()));
    }

    private function getPageFromRequest()
    {
        switch (parent::getRequest()) {
            case parent::getRequest():
                if (Formatter::verifyArrayKey(parent::getRequest(), $this->getPages())):
                    require_once(Url::getPath($this->getPages()[parent::getRequest()]));
                endif;
                return;
        }
        return $this;
    }

    private function runUnloadFunctionOnSpecialRequests()
    {
        if (Formatter::verifyInArray(parent::getRequest(), $this->getSpecialRequests())):
            echo "
             <script>
    $(document).ready(function() {
        $(window).bind('beforeunload', function() {
            return 'Are you sure you want to leave?';
        });
    })
    </script>
            ";
        endif;
    }

    private function runPageHandlerSetup()
    {
        if (count($this->getPageHandlers())) {
            if (Formatter::verifyArrayKey(parent::getRequest(), $this->getPageHandlers())):
                $function = $this->getPageHandlers()[parent::getRequest()];
                if (Formatter::verifyFunction($function)) {
                    return $function();
                }
            endif;
        }
        return;
    }

    private function runPageSetup()
    {
        echo '
            <!DOCTYPE html>
                <html lang="en">
        ';
        $this->getHeadWithMeta();
        echo '<body>';
        $this->getPageFromRequest();
        $this->getPageScripts();
        $this->runUnloadFunctionOnSpecialRequests();
        echo '</body>';
        echo '</html>';
    }

    protected function render()
    {
        switch ($this->getAction()) {
            case "page":
                $this->runPageSetup();
                return;
            case "handler":
                $this->runPageHandlerSetup();
                return;
        }
    }

    public function verifyUser()
    {
        if (!Session::exists($this->getAuthIdentifier())) {
            if (in_array($this->getRequest(), $this->getAuthPages())) {
                $this->setHasAuth(false);
                return;
            }
        } else {
            if (!Token::run()::verify(Session::get($this->getAuthIdentifier()), $this->getAuthTokenIdentifier())) {
                if (in_array($this->getRequest(), $this->getAuthPages())) {
                    $this->setHasAuth(false);
                    return;
                }
            }
        }
        $this->setHasAuth(true);
        return;
    }
}