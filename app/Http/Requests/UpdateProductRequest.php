<?php

namespace App\Http\Requests;

class UpdateProductRequest extends BaseProductRequest
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
        if ($this->isMethod('patch')) {
            return collect($this->commonRules())
                ->filter(fn($rule, $name) => $this->has($name))
                ->toArray();
        }

        return $this->commonRules();
    }
}
