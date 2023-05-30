<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageRequest extends FormRequest
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
      'title' => [
        'required',
        'string',
        'max:255'
      ],
      'slug' => [
        'required',
        'string',
        'max:255'
      ],
      'content'=>[
        'required',
        'string'
        ],
        'visibility'=>[
          'sometimes',
          'integer',
          'between:0,1'
          ]
    ];
  }
}