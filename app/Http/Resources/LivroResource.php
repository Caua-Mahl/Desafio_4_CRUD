<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LivroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'titulo' => $this->titulo,
            'lançamento' => $this->lançamento,
            'genero' => $this->genero,
            'autor' => $this->autor,
            'paginas' => $this->paginas
        ];
    }
}
