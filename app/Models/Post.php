<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use \Conner\Tagging\Taggable;
    protected $table = 'posts';
    public $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['post_title', 'post_body','cat','user_id','image'];
    protected $casts = [
        'cat' => 'array',
    ];

    public function user()
    {
       // return $this->belongsTo('App\Models\User');
        return $this->belongsTo(User::class);

    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function getExcerptAttribute(){
       $x = $this->post_body;
      $y = substr($x, 0, 100); 
       return $y.'....';
    }

    public function getRouteKeyName()
    {
      return 'slug';
    }


}
