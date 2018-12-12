<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FileUploadTrait;

class Accolade extends Model
{

    use FileUploadTrait;

    protected $table = "accolades";
    protected $guarded = [];

    public function getImageAttribute()
    {
        if (!empty($this->attributes['image'])) {
            return $this->getFileUrl($this->attributes['image']);
        }
        return "";
    }
    public function setImageAttribute($value)
    {
        $this->saveFile($value, 'image', 'accolade');
    }
}
