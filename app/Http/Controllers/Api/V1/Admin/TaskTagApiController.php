<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskTagRequest;
use App\Http\Requests\UpdateTaskTagRequest;
use App\Http\Resources\Admin\TaskTagResource;
use App\TaskTag;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskTagApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('task_tag_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TaskTagResource(TaskTag::all());
    }

    public function store(StoreTaskTagRequest $request)
    {
        $taskTag = TaskTag::create($request->all());

        return (new TaskTagResource($taskTag))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TaskTag $taskTag)
    {
        abort_if(Gate::denies('task_tag_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TaskTagResource($taskTag);
    }

    public function update(UpdateTaskTagRequest $request, TaskTag $taskTag)
    {
        $taskTag->update($request->all());

        return (new TaskTagResource($taskTag))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TaskTag $taskTag)
    {
        abort_if(Gate::denies('task_tag_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $taskTag->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
