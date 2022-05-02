<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    public $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['user_id'];

    public function user()
    {
       // return $this->belongsTo('App\Models\User');
        return $this->belongsTo(User::class);

    }



}
