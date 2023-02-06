<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\sisu_atual;

class sisu_anterior extends Model
{
    use HasFactory;
   
    protected $table = 'sisu_anterior';

    public function getsisu_atual(){
        $sisu_atual = sisu_atual::where('faculdade_id', $this->faculdade_id)->first();
        return $sisu_atual->nota;
    }
}
