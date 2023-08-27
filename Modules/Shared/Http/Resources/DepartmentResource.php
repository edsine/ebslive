<?php

namespace Modules\Shared\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'department_unit' => $this->department_unit,
            'branch_id' => $this->branch_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
