<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBookRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'author' => 'required|max:255',
            'company' => 'required|max:255',
            'isbn' => [
                        'required',
                        'regex:/^[0-9]{13}$/',
                        Rule::unique('books')->ignore($this->book),
                      ]  
        ];
    }
}
