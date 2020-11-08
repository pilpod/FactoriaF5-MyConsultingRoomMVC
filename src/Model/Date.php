<?php 

namespace App\Model;
use App\Model\DbConection;


class Date implements IDataFormat {

    private $date;

    public function __construct($date = '')
    {
        $this->date = $date;
    }

    public function FormatDate() : string
    {
        setlocale(LC_TIME, "spanish");
        $date = date_create($this->date);
        $formatDate = "d M Y";
        $date = date_format($date, $formatDate);
        return $date;
    }

}

?>
