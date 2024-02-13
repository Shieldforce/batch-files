<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class WelcomeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "files"   => ["required", "array"],
            "files.*" => ["required", "file", File::types(['txt', 'jpeg', 'png', 'jpg'])
                ->min(1)
                ->max(5 * 1024)],
        ];
    }

    public function messages()
    {
        return [
            "files.required" => "Os arquivos são obrigatórios!"
        ];
    }
}
