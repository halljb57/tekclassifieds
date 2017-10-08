<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classified extends Model
{
    protected $table = 'classifieds';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'category_id',
        'description',
        'price',
        'main_image',
        'condition',
        'location',
        'email',
        'phone'
    ];

    protected $hidden = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
