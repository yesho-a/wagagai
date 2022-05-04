<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $fillable = ['title','parent_id'];
    protected $table = 'categories';

    public function childs() {
        return $this->hasMany('App\Models\Category','parent_id','id') ;
    }

}
