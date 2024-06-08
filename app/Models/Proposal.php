<?php

namespace App\Models;

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
        'delivery_time'

    ];
    public function project(){
        return $this->belongsTo(Project::class,'project_id');
    }
    public function freelancer(){
        return $this->belongsTo(User::class,'freelancer_id');
    }
}
