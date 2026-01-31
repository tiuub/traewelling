<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManualPolylineImportRequest extends FormRequest
{
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'profile'          => ['required', 'string', 'max:100'],
            'polyline'         => ['required', 'array', 'min:2'],
            'polyline.*'       => ['required', 'array', 'min:2'],
            'polyline.*.0'     => ['required', 'numeric'],
            'polyline.*.1'     => ['required', 'numeric'],
            'polyline.*.2'     => ['nullable'],
            'polyline.*.3'     => ['nullable'],
        ];
    }
}
