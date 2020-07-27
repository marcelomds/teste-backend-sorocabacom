<?php

namespace App\Models\Card;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    use SoftDeletes;

    protected $fillable = ['character_image', 'description'];

    protected $guarded = ['id', 'created_at', 'update_at'];
}
