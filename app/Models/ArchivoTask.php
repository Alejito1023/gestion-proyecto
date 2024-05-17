<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ArchivoTask extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];

    /**
     * Get the archivos for the task.
     */
    public function archivos()
    {
        return $this->hasMany(ArchivoTask::class, 'task_id');
    }
}


