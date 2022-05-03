<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class Action extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id_acao';
    
    protected $fillable = [
      'id_pipeline',
      'ordem',
      'token',
      'acao',
      'info'
    ];
 
    public function tasks() {
      return Task::where('id_acao',$this->id_acao)->orderby('ordem')->get();
    }
    
}
