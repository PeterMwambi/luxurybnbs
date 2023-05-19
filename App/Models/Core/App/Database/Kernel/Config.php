<?php

namespace Models\Core\App\Database\Kernel;

use Controllers\Controller;

class Config extends Controller
{

    private function getDsn()
    {
        parent::setDatabaseConnection();
        return parent::getDatabaseConnection();
    }

    protected function host()
    {
        return $this->getDsn()->host;
    }
    protected function username()
    {
        return $this->getDsn()->username;
    }
    protected function password()
    {
        return $this->getDsn()->password;
    }

    protected function DBName()
    {
        return $this->getDsn()->name;
    }

}