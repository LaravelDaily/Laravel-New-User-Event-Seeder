<?php

namespace App\Http\Requests;

use App\TaskTag;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreTaskTagRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('task_tag_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required'],
        ];
    }
}
