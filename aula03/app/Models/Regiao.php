<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regiao extends Model
{

    use  \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    protected $table = 'regioes';
    protected $fillable = ['nome'];

    public function estados(){
        return $this->hasMany(Estado::class);
    }

    public function fornecedores(){
        return $this->hasManyThrough(Fornecedor::class, Estado::class);
    }

    public function produtos()
    {
        return $this->hasManyDeep(
            Produto::class,
            [Estado::class,Fornecedor::class]
        );
    }
}
