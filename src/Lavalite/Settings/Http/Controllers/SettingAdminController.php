<?php

namespace Lavalite\Settings\Http\Controllers;

use App\Http\Controllers\AdminController as AdminController;
use Former;
use Lavalite\Settings\Http\Requests\SettingRequest;
use Lavalite\Settings\Interfaces\SettingRepositoryInterface;
use Response;

/**
 *
 */
class SettingAdminController extends AdminController
{
    /**
     * Initialize setting controller.
     *
     * @param type SettingRepositoryInterface $setting
     *
     * @return type
     */
    public function __construct(SettingRepositoryInterface $setting)
    {
        $this->model = $setting;
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(SettingRequest $request)
    {
        $this->theme->prependTitle(trans('settings::setting.names').' :: ');

        return $this->theme->of('settings::admin.setting.index')->render();
    }

    /**
     * Return list of setting as json.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function lists(SettingRequest $request)
    {
        $array = $this->model->json();
        foreach ($array as $key => $row) {
            $array[$key] = array_only($row, config('package.settings.setting.listfields'));
        }

        return ['data' => $array];
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function show(SettingRequest $request, $id)
    {
        $setting = $this->model->findOrNew($id);

        Former::populate($setting);

        return view('settings::admin.setting.show', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(SettingRequest $request)
    {
        $setting = $this->model->findOrNew(0);
        Former::populate($setting);

        return view('settings::admin.setting.create', compact('setting'));
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(SettingRequest $request)
    {
        if ($row = $this->model->create($request->all())) {
            return Response::json(['message' => 'Setting created sucessfully', 'type' => 'success', 'title' => 'Success'], 201);
        } else {
            return Response::json(['message' => $e->getMessage(), 'type' => 'error', 'title' => 'Error'], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function edit(SettingRequest $request, $id)
    {
        $setting = $this->model->find($id);

        Former::populate($setting);

        return view('settings::admin.setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function update(SettingRequest $request, $id)
    {
        if ($row = $this->model->update($request->all(), $id)) {
            return Response::json(['message' => 'Setting updated sucessfully', 'type' => 'success', 'title' => 'Success'], 201);
        } else {
            return Response::json(['message' => $e->getMessage(), 'type' => 'error', 'title' => 'Error'], 400);
        }
    }

    /**
     * Remove the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy(SettingRequest $request, $id)
    {
        try {
            $this->model->delete($id);

            return Response::json(['message' => 'Setting deleted sucessfully'.$id, 'type' => 'success', 'title' => 'Success'], 201);
        } catch (Exception $e) {
            return Response::json(['message' => $e->getMessage(), 'type' => 'error', 'title' => 'Error'], 400);
        }
    }
}
