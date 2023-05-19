<?php

namespace Models\Core\App\Database\Queries\Create;

use Models\Core\App\Database\Queries\Handler\Provider;
use Models\Core\App\Helpers\DateTime;

class Room extends Provider
{
    public function registerRoom(array $data)
    {
        parent::setUniqIdPrefix("LBNBS");
        parent::setUniqId();
        parent::setData($data);
        $this->registerRoomDataFromStep1();
        $this->registerRoomDataFromStep2();
        return true;
    }

    private function registerRoomDataFromStep1()
    {
        parent::generateFormData("room-registration-form-step-1");
        parent::modifyFormDataKeys("-", "_", true, "rm_");
        $data = parent::getFormData();
        $description = json_encode([
            "description" => $data["rm_description"],
            "features" => $data["rm_features"]
        ]);
        parent::pushSelectedKeys([
            "rm_name",
            "rm_type",
            "rm_number",
            "rm_price",
            "rm_status",
            "rm_description"
        ]);
        $generatedData = parent::getFormData();
        $generatedData["rm_id"] = parent::getUniqId();
        $generatedData["rm_ratings"] = 3;
        $generatedData["rm_reviews"] = json_encode([]);
        $generatedData["rm_description"] = $description;
        $generatedData["rm_date_added"] = DateTime::run()->getDateTimeAsJson();
        parent::setTable("rooms");
        parent::setQueryData($generatedData);
        parent::insert();
        return;
    }

    private function registerRoomDataFromStep2()
    {
        parent::generateFormData("room-registration-form-step-2");
        parent::modifyFormDataKeys("-", "_", true, "rm_");
        $data = parent::getFormData();
        $data["rm_id"] = parent::getUniqId();
        parent::setTable("room_pictures");
        parent::setQueryData($data);
        parent::insert();
        return;
    }


}