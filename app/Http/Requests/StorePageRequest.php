<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePageRequest extends FormRequest
{
  /**
  * Determine if the user is authorized to make this request.
  */
  public function authorize(): bool
  {
    if ($this->user()->role == 0) {
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
      'title' => [
        'required',
        'string',
        'max:255'
      ],
      'slug' => [
        'nullable',
        'string',
        'max:255'
      ],
      'content' => [
        'required',
        'string'
      ],
      'visibility' => ['required',
        'integer',
        'between:0,1'],
    ];
  }
}