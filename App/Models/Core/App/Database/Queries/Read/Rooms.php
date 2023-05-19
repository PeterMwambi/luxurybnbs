<?php

namespace Models\Core\App\Database\Queries\Read;

use Exception;
use Models\Core\App\Database\Queries\Handler\Provider;

class Rooms extends Provider
{
    public function getRooms()
    {
        parent::setAction("SELECT");
        parent::setFieldItems("room_pictures.rm_pictures,
            rooms.rm_id,
            rooms.rm_name,
            rooms.rm_type,
            rooms.rm_number,
            rooms.rm_price,
            rooms.rm_status,
            rooms.rm_date_added ");
        parent::setTable("rooms");
        parent::setJoinClause("INNER JOIN room_pictures ON rooms.rm_id = room_pictures.rm_id");
        parent::setFetch(1);
        parent::setFetchControl("array");
        return (parent::queryDataWithResults());
    }

    public function getRoomsWithDescription()
    {
        parent::setAction("SELECT");
        parent::setFieldItems("room_pictures.rm_pictures,
            rooms.rm_id,
            rooms.rm_name,
            rooms.rm_type,
            rooms.rm_number,
            rooms.rm_price,
            rooms.rm_status,
            rooms.rm_description,
            rooms.rm_ratings,
            rooms.rm_reviews,
            rooms.rm_date_added");
        parent::setTable("rooms");
        parent::setJoinClause("INNER JOIN room_pictures ON rooms.rm_id = room_pictures.rm_id");
        parent::setFetchControl("array");
        parent::setFetch(1);
        return parent::queryDataWithResults();
    }

}