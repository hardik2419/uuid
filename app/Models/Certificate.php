<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FileUploadTrait;

class Certificate extends Model
{

    use FileUploadTrait;

    protected $table = "certifications";
    protected $guarded  = [];

    public function getImageAttribute()
    {
        if (!empty($this->attributes['image'])) {
            return $this->getFileUrl($this->attributes['image']);
        }
        return "";
    }
    public function setImageAttribute($value)
    {
        $this->saveFile($value, 'image', 'certificate');
    }
}
