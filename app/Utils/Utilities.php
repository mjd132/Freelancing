<?php


use Carbon\Carbon;
class Utilities{

    public static function diffDateHuman(DateTime $date1, DateTime $date2){
        $date1 = Carbon::parse($date1);
        $date2 = Carbon::parse($date2);
        return $date1->diffForHumans($date2);
    }
}
