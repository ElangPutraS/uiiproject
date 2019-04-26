<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'email', 'password', 'avatar', 'google_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Belongs to many social_media table.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function socials()
    {
        return $this->belongsToMany(SocialMedia::class, 'user_social_media')
            ->withPivot(['url'])
            ->as('social_media');
    }

    /**
     * Maybe has one student
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function student()
    {
        return $this->hasOne(Student::class, 'id');
    }

    /**
     * Maybe has one project_owner
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function projectOwner()
    {
        return $this->hasOne(ProjectOwner::class, 'id');
    }

    /**
     * Has many comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Has many discussions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }
}
