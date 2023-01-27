<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\sisu_anterior;
use App\Models\sisu_atual;

class faculdade extends Model
{
  /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'faculdade';


    public function getsisu_anterior()
    {
       $nota = sisu_anterior::where('faculdade_id', $this->id)->get();
        return $nota;
    }

    public function getsisu_atual()
    {
       $nota = sisu_atual::where('faculdade_id', $this->id)->get();
        return $nota;
    }

}
