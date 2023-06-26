<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatHistoryResource extends JsonResource
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
            'id' => $this->id,
            'conversation_id' => $this->conversation_id,
            'human' => $this->human,
            'translated_ai_text' => $this->translated_ai_text,
            // 'prompt_tokens' => $this->prompt_tokens,
            // 'completion_tokens' => $this->completion_tokens,
            // 'total_tokens' => $this->total_tokens,
            'expire_date' => $this->expire_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,  
        ];
    }
}
