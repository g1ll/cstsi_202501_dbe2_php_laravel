<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ProdutoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            ...parent::toArray($request),
            'imagem_links' =>$this->when(
                    $this->media,
                    $this->media->map(
                        fn($m)=>
                            asset(
                                Storage::url('produtos/'.$m->source)
                                )
                            )
            )
        ];
    }
}
