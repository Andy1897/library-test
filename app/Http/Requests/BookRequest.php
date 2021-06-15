<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class BookRequest
 * @property $title
 * @property $author_id
 * @package App\Http\Requests
 */
class BookRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'title'=>'required',
            'author_id'=>'required|integer|exists:authors,id'
        ];
    }
}
