<?php 

namespace App\Model;


class Date implements IDataFormat {

    public function FormatDate($date) : string
    {
        $date = date("d m y", strtotime($date));
        return $date;
    }

}

?>