<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type'          => 'comments',
            'id'            => (string)$this->id,
            'attributes'    => [
                'name' => $this->name,
                'email' => $this->email,
                'text' => $this->text,
                'created_at' => $this->created_at,
            ],
            'links'         => [
                'self' => route('comments.show', ['comment' => $this->id]),
                'parent' => route('comments.show', ['comment' => $this->parent_id]),
            ],
            'children' => $this->children
        ];
    }
}
