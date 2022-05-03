<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Action;

class Pipeline extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id_pipeline';
    
    protected $fillable = [
      'ordem',
      'token',
      'pipeline',
      'info'
    ];
    
    public function actions() {
      return Action::where('id_pipeline',$this->id_pipeline)->orderby('ordem')->get();
    }
    
}
