<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'title' => ['required', Rule::unique('projects')->ignore($this->project), 'max:150'],
            'content' => ['nullable'],
            'type_id' => ['nullable', 'exists:types,id'],
            'technologies' => ['exists:technologies,id']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Il titolo è richiesto',
            'title.unique' => 'Titolo già presente',
            'title.max' => 'Il titolo non può essere lungo più di :max caratteri',
            'technologies.exists' => 'Il tag selezionato non è valido'
        ];
    }
}
