<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{

    protected $fillable = ['nome','uf','codigouf','regiao_id'];

    public function regiao(){
        return $this->belongsTo(Regiao::class);
    }
}
