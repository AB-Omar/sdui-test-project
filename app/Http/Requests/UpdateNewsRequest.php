<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateNewsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            
            'title' => [
                'required', 'min:3', 'max:255',
                \Illuminate\Validation\Rule::unique('news', 'title')->ignore($this->id)
            ],
            'content' => 'required|min:20',
        ];
    }
}
