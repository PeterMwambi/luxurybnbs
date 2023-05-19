<?php


namespace Models\Core\App\Database\Queries\Validator;

use Models\Core\App\Database\Queries\Handler\Service;
use Models\Core\App\Helpers\Formatter;

class Validate extends Service
{


    /**
     * Summary of status
     * @var bool
     */
    private $status = false;

    /**
     * Summary of statusMessage
     * @var array
     */
    private $statusMessage = array();

    /**
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status 
     * @return self
     */
    private function setStatus(bool $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Summary of statusMessage
     * @return array
     */
    public function getStatusMessage()
    {
        return $this->statusMessage;
    }

    /**
     * Summary of statusMessage
     * @param array $statusMessage Summary of statusMessage
     * @return self
     */
    private function setStatusMessage(array $statusMessage): self
    {
        $this->statusMessage = $statusMessage;
        return $this;
    }

    private function validateWithCount(array $data)
    {
        $data["count"] = true;
        $data["with-results"] = false;
        $data["fetch-control"] = false;
        parent::setSourceData($data);
        parent::select();
    }


    private function validateWithResults(array $data)
    {
        $data["count"] = false;
        $data["with-results"] = true;
        $data["fetch-control"] = "object";
        parent::setSourceData($data);
        parent::select();
    }

    /**
     * Summary of nationalId
     * @param array $data
     * @return void
     */
    public function nationalId(array $data)
    {
        $this->validateWithCount($data);
    }


    /**
     * Summary of phoneNumber
     * @param array $data
     * @return void
     */

    public function phoneNumber(array $data)
    {
        $this->validateWithCount($data);
    }

    /**
     * Summary of email
     * @param array $data
     * @return void
     */

    public function email(array $data)
    {
        $this->validateWithCount($data);
    }


    public function username(array $data)
    {
        $this->validateWithCount($data);
    }


    public function password(array $data)
    {
        $where = $data["where"];
        $checkColumn = $where[0];
        $dataItems = $where[1];
        $username = $dataItems["username"];
        $password = $dataItems["password"];
        $data["where"] = [$checkColumn, "=", $username];
        $field = $data["fields"][0];
        $this->validateWithResults($data);
        if (parent::hasResults()) {
            if (Formatter::verifyProperty(parent::getResults(), $field)) {
                if (password_verify($password, parent::getResults()->$field)) {
                    $this->setStatus(true);
                } else {
                    $this->setStatus(false);
                    $this->setStatusMessage(array("errmsg" => "exists"));
                }
            }
        } else {
            $this->setStatus(false);
            $this->setStatusMessage(array("errmsg" => "unique"));
        }
        return $this;
    }

    public function roomName(array $data)
    {
        $this->validateWithCount($data);
    }

    public function roomNumber(array $data)
    {
        $this->validateWithCount($data);
    }

}