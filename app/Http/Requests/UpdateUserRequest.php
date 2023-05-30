<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
  /**
  * Determine if the user is authorized to make this request.
  */
  public function authorize(): bool
  {
    if ($this->route('id') && $this->user()->role == 0) {
      return false;
    }

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
      'name' => [
        'required',
        'string',
        'max:255'],

      'email' => [
        'required',
        'string',
        'email',
        'max:255',
        'unique:users,email,'.($this->route('id') ?? $this->user()->id)],

      'role' => ['sometimes',
        'integer',
        'between:0,1'],
      'password' => ['nullable',
        'string',
        'min:6',
        ],
    ];
  }
}