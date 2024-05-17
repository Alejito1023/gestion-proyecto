<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArchivoTask;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description']; // Agregamos 'description' a la lista de campos llenables

    /**
     * Define la relación entre las tareas y los archivos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function archivos()
    {
        return $this->hasMany(ArchivoTask::class, 'task_id');
    }
}