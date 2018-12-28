<?php
namespace App\Models;

use App\Traits\FileUploadTrait;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use FileUploadTrait;

    protected $table   = "companies";
    protected $guarded = [];

    public function getLogoAttribute()
    {
        if (!empty($this->attributes['logo'])) {
            return $this->getFileUrl($this->attributes['logo']);
        }
        return "";
    }
    public function setLogoAttribute($value)
    {
        $this->saveFile($value, 'logo', 'company');
    }

    public function location()
    {
        return $this->hasMany(Location::class, 'company_id', 'id');
    }
    /* certificate */
    public function certificate()
    {
        return $this->hasMany(Certificate::class, 'company_id', 'id');
    }
    /* Accolades */
    public function accolade()
    {
        return $this->hasMany(Accolade::class, 'company_id', 'id');
    }
    /* Portfolio */
    public function portfolio()
    {
        return $this->hasMany(Portfolio::class, 'company_id', 'id');
    }
}
