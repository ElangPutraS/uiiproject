<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\StatusOfferal;

class Student extends Model
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    protected $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nim', 'about'];

    /**
     * Belongs to users table.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    /**
     * Has many projects being offered.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function offerals()
    {
        return $this->belongsToMany(Project::class, 'offerals')
            ->wherePivot('status', '=', StatusOfferal::OFFER)
            ->withTimestamps();
    }

    /**
     * Has many projects being accepted by owner.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'offerals')
            ->wherePivot('status', '=', StatusOfferal::ACCEPT)
            ->withTimestamps();
    }
}
