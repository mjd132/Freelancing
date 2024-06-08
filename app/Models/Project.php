<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'budget',
    ];

    public function freelancer(){
        return $this->belongsTo(User::class,'freelancer_id');

    }
    public function employer(){
        return $this->belongsTo(User::class,'employer_id');
    }
    public function proposals(){
        return $this->hasMany(Proposal::class,'project_id');
    }

}
