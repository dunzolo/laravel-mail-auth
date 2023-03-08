<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'content', 'slug', 'type_id'];

    /**
     * Get type
     *
     * @return void
     */
    public function type(){
        return $this->belongsTo(Type::class);
    }

    /**
     * Get the project tecnologies
     *
     * @return void
     */
    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
}
