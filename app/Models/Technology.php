<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    /**
     * Get the tecnology projects posts
     *
     * @return void
     */
    public function projects(){
        return $this->belongsToMany(Projects::class);
    }

}
