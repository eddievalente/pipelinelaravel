<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id_task';
    
    protected $fillable = [
      'id_acao',
      'id_pipeline',
      'ordem',
      'token',
      'tarefa',
      'dtinicio',
      'dtentrega',
      'prioridade',
      'indicador',
      'progresso',
      'instrucao'
    ];
            
}
