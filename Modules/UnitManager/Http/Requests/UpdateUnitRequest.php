<?php

namespace Modules\ClaimsCompensation\Http\Requests;

use Modules\UnitManager\Models\Units;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUnitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = Units::$rules;
        
        return $rules;
    }
}
