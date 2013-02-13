<?php

class Date
{
    public static function countDay($startDate, $endDate)
    {
        if(empty($startDate) AND (empty($endDate))){
            return false;
        }

        $startDate = new \DateTime(str_replace('/', '-', $startDate));
        $endDate   = new \DateTime(str_replace('/', '-', $endDate));

        $timeDiff  = $startDate->diff($endDate, true);
        return $timeDiff->d + 1;
    }

    public static function convertDate($date)
    {
        if (empty($date)){
            return false;
        }

        $array       = explode('/', $date);
        $convertDate = array($array[2], $array[1], $array[0]);

        return implode('-', $convertDate);
    }
}