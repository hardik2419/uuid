<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Backpack\CRUD\CrudTrait;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Traits\Uuids;
use App\Traits\FileUploadTrait;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use CrudTrait;
    use HasRoles;
    use Uuids;
    use FileUploadTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*protected $fillable = [
        'name', 'email', 'password',
    ];*/
    protected $guarded  = [];
    public $incrementing = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getImageAttribute()
    {
        if (!empty($this->attributes['image'])) {
            return $this->getFileUrl($this->attributes['image']);
        }
        return "";
    }
    public function setImageAttribute($value)
    {
        $this->saveFile($value, 'image', 'user');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    public function company()
    {
        return $this->hasOne(Company::class, 'user_id', 'id');
    }
    public function socialAccounts()
    {
        return $this->hasOne(SocialAccount::class, 'user_id', 'id');
    }
}
