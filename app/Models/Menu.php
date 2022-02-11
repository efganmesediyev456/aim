<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Menu extends Model implements TranslatableContract
{
    use HasFactory;

    use Translatable;

    public $guarded=[];

    public $translatedAttributes = ['name','content'];


    public function parent()
    {
    	return	$this->belongsTo(Menu::class,'parent_id','id');
    }

    public function childs(){
    	return $this->hasMany(Menu::class,'parent_id','id');
    }
}


