<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Student;
use App\Enums\StatusOfferal;
use App\Models\ProjectOwner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'duration_start', 'duration_end'];

    /**
     * Belongs to project_owner.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(ProjectOwner::class, 'project_owner_id');
    }

    /**
     * Has many tags.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'project_tag');
    }

    /**
     * Has many bidders.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function bidders()
    {
        return $this->belongsToMany(Student::class, 'offerals')
            ->withPivot(['status'])
            ->withTimestamps();
    }

    /**
     * Has many student being accepted.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function students()
    {
        return $this->bidders()
            ->wherePivot('status', '=', StatusOfferal::ACCEPT);
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
