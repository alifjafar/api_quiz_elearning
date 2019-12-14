<?php

namespace App\Http\Resources;

class QuizResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this['id'],
            'name' => $this['name'],
            'description' => $this['description'],
            'password' => $this['password'],
            'is_private' => $this['is_private'],
            'category' => $this->whenLoaded('category', CategoryResource::make($this['category'])),
            'total_question' => $this->whenLoaded('questions', $this['total_question']),
            'author' => $this->whenLoaded('client', $this['client']['name']),
        ];
    }
}
