<?php

namespace Models\Core\App\Routes\Shell;


class Api
{

    public static function runService()
    {
        $route = new Dispatch;
        if ($route->VerifyRoute() && $route->VerifyRequest()) {
            $route->ProcessRoute();
            return;
        } else {
            $route->RedirectTo404();
            return;
        }
    }
}