<?php

namespace App\Models;

use App\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'budget',
        'freelancer_id',
        'last_status'
    ];
    protected $casts = [
        'last_status' => ProjectStatus::class,
    ];

    public function freelancer()
    {
        return $this->belongsTo(User::class, 'freelancer_id');

    }

    public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'project_id');
    }

    public function isDone()
    {
        return $this->last_status === ProjectStatus::DONE;
    }

    public function isAccepted()
    {
        return $this->last_status === ProjectStatus::ACCEPTED;
    }

    public function isPublished()
    {
        return $this->last_status === ProjectStatus::PUBLISHED;
    }

    public function isAbandoned()
    {
        return $this->last_status === ProjectStatus::ABANDONED;
    }


}
