<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['taskTitle', 'taskDescription', 'longDescription'];

    public function toggleCompleted(){
        $this->completed = !$this->completed;
        $this->save();
    }
}
