<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class JoinUsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required|string|max:255|min:3',
            'message' => 'required|string|min:3',
            'cv' => 'required|mimetypes:application/pdf',
            'position' => 'required|string|max:255|min:3',
            'linkedin' => 'required|url',
        ];
    }
}
