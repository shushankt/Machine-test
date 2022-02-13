<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

     /**
     * Get the role associated with the user.
     */
    public function user()
    {
        return $this->belongsToMany(User::class, 'user_roles', 'role_id','user_id');
    }
}
