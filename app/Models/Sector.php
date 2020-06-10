<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $fillable = ['label', 'name', 'description'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
