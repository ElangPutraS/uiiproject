<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;

class ProjectOwner extends Model
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
    protected $fillable = ['nik', 'about', 'company'];

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
     * Has many projects.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
    
    /**
     * Has many draft projects.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function draftedProjects()
    {
        return $this->projects()
            ->where('is_published', false)
            ->where('is_done', false);
    }

    /**
     * Has many published projects.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function publishedProjects()
    {
        return $this->projects()
            ->where('is_published', true)
            ->where('is_done', false);
    }

    /**
     * Has many done projects.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function doneProjects()
    {
        return $this->projects()
            ->where('is_done', true);
    }

    /**
     * Has many deleted projects.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deletedProjects()
    {
        return $this->projects()->onlyTrashed();
    }
}
