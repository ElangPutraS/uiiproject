<?php

namespace App\Models;

use App\Enums\StatusOfferal;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

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
            ->withPivot(['status'])
            ->withTimestamps();
    }

    /**
     * Has many projects being accepted by owner.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects()
    {
        return $this->offerals()
            ->wherePivot('status', '=', StatusOfferal::ACCEPT);
    }
}
