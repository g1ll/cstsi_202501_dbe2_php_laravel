<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProdutoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // JsonResource::withoutWrapping();
        return [
            ...parent::toArray($request),
            'imagem_links' =>$this->when(
                    $this->media,
                    $this->media->map(
                        fn($m)=>Str::contains($m->source,'http')
                            ?$m->source
                            :asset(Storage::url('produtos/'.$m->source))//http://localhost:8083/storage/produtos/nomeImagem.jpg
                            )
            )
        ];
    }
}
