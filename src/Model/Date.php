<?php 

namespace App\Model;
require('IDataFormat.php');


class Date implements IDataFormat {

    private $date;

    public function __construct($date = '')
    {
        $this->date = $date;
    }

    public function FormatDate($date) : string
    {
        $format = "d \de m y";
        $date = $date->format($format);
        return $date;
    }

}

$date = new Date('2000-01-01 00:00:00');
$dateFormated = $date->FormatDate();
echo $dateFormated;

?>