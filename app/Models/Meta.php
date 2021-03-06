<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    use HasFactory;
    protected $table = 'metas';
    public $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['meta_title', 'meta_description','meta_keywords','post_id'];

 
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
