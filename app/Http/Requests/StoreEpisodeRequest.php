<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEpisodeRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'nullable|string|min:10',
            'audio_file' => 'required|file',
            'duree' => 'nullable|string',
        ];
    }
     public function messages(): array
    {
        return [
            'title.required' => 'Le titre du podcast est obligatoire.',
            'description.min' => 'La descripton doit dépasser 10 caractères.',
            'audio_file.required' => 'Vous devez sélectionner un fichier audio.',
            'audio_file.mimes' => 'Le fichier doit être au format audio.',
        ];
    }
    
}
