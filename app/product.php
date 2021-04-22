<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail(mixed $id)
 */
class product extends Model
{
    protected $fillable = [
        'name',
        'details',
        'category_id',
        'image',
    ];

}
