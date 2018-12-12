<?php

namespace App\Models;

use App\Traits\FileUploadTrait;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{

    use FileUploadTrait;

    protected $table   = 'portfolios';
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
        $this->saveFile($value, 'image', 'portfolio');
    }

    public function getVideoAttribute()
    {
        if (!empty($this->attributes['video'])) {
            return $this->getFileUrl($this->attributes['video']);
        }
        return "";
    }
    public function setVideoAttribute($value)
    {
        $this->saveFile($value, 'video', 'portfolio');
    }
}
