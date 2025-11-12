<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePodcastRequest extends FormRequest
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
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string|min:10',
            'category' => 'sometimes|string', 
            'image' => 'nullable|file|mimes:png,jpg',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Le titre du podcast est obligatoire.',
            'description.min' => 'La descripton doit dépasser 10 caractères.',
            'image.required' => 'Vous devez sélectionner un fichier audio.',
            'image.mimes' => 'Le fichier doit être au format png,jpg.',
        ];
    }
}
