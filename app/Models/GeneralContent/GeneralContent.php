<?php

namespace App\Models\GeneralContent;

use Illuminate\Database\Eloquent\Model;

class GeneralContent extends Model
{

    protected $fillable = ['background_image', 'spotlight_text', 'form_description', 'game_name', 'phrase'];

    protected $guarded = ['id', 'created_at', 'update_at'];

}
