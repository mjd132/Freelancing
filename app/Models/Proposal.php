<?php

namespace App\Models;

use App\Enums\ProposalStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'freelancer_id',
        'description',
        'price',
        'delivery_time',
        'status',
        'accepted_at'

    ];
    protected $casts = [
        'delivery_time' => 'datetime',
        'accepted_at' => 'datetime'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function freelancer()
    {
        return $this->belongsTo(User::class, 'freelancer_id');
    }

    public function isAccepted()
    {
        return $this->status === ProposalStatus::ACCEPTED->value;
    }

    public function isPending()
    {
        return $this->status === ProposalStatus::PENDING->value;
    }

    public function accept()
    {
        $this->status === ProposalStatus::ACCEPTED->value;
    }
}
