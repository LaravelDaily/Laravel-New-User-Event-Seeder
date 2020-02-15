<?php

namespace App\Http\Requests;

use App\TaskStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateTaskStatusRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('task_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
