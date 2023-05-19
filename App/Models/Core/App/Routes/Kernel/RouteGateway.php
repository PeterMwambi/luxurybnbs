<?php

namespace Models\Core\App\Routes\Kernel;

use Controllers\Controller;



class RouteGateway extends Controller
{

    public function getRouteConfig()
    {
        parent::setRoutes();
        return parent::getRoutes();
    }

    public function getRoutePrefix()
    {
        parent::setRoutePrefix();
        return parent::getRoutePrefix();
    }
}