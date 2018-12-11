<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "companies";
    protected $guarded  = [];

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
    public function accolades()
    {
        return $this->hasMany(Accolades::class, 'company_id', 'id');
    }
}
