<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollectionResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->collection->map(function ($model) {
            return [
                'id' => $model->id,
                'name' => $model->name,
                'category' => new CategoryResource($model->category),
                'created_at' => $model->created_at,
            ];
        })->toArray();
    }
}
