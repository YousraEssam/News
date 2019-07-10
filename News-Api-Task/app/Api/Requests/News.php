<?php

namespace App\Http\Requests;

use Dingo\Api\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Dingo\Api\Exception\ValidationHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class News extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'writer_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'News title is required',
            'description.required'  => 'Description is required',
            'writer_id.required' => 'Writer ID is required'
        ];
    }
}
