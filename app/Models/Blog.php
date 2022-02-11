<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Blog extends Model implements TranslatableContract
{
    use HasFactory;

    use Translatable;

    public $guarded=[];

    public $translatedAttributes = ['name', 'text'];


    public $monthes_ru = array(
            1 => 'Января', 2 => 'Февраля', 3 => 'Марта', 4 => 'Апреля',
            5 => 'Мая', 6 => 'Июня', 7 => 'Июля', 8 => 'Августа',
            9 => 'Сентября', 10 => 'Октября', 11 => 'Ноября', 12 => 'Декабря'
        );

    public $monthes_az = array(
            1 => 'Yanvar', 2 => 'Fevral', 3 => 'Mart', 4 => 'Aprel',
            5 => 'May', 6 => 'Iyun', 7 => 'Iyul', 8 => 'Avqust',
            9 => 'Sentyabr', 10 => 'Oktyabr', 11 => 'Noyabr', 12 => 'Dekabr'
        );

    public $monthes_en = array(
            1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
            5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
            9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
        );

    public function month($date){
         if(app()->getLocale()=="az")
            $month=$this->monthes_az[$date->month];
          elseif(app()->getLocale()=="ru")
            $month=$this->monthes_ru[$date->month];
          else
            $month=$this->monthes_en[$date->month];

        return $month;
    }

    public function getDateYear(){


        $date=\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$this->created_at);
         
        $month=$this->month($date);
        $day=$date->format('d');
        $year=$date->format('Y');

        return $day." ".$month." ".$year;
    }

    public function getDateYearHour(){

       
        $date=\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$this->created_at);
         
        $month=$this->month($date);
        $day=$date->format('d');
        $year=$date->format('Y');
        $hour=$date->format("H:i");

        return $day." ".$month.", ".$hour;
    }

 
}
