<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttendanceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'event_id' => ['required'],
            'user_id' => ['required'],
            'in_person' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'event_id.required' => ['Please select an event'],
            'user_id.required' => ['User ID is required'],
            'in_person.required' => ['Please choose mode of attendance'],
        ];
    }
}
