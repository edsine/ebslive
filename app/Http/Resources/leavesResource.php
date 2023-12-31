<?php

namespace Modules\Leaves\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class leavesResource extends JsonResource
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
            'id' => $this->id,
            'days' => $this->days,
            'title' => $this->title,
            'age' => $this->age,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
