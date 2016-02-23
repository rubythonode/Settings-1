<?php

namespace Lavalite\Settings\Http\Controllers;

use App\Http\Controllers\AdminController as AdminController;
use Form;
use Lavalite\Settings\Http\Requests\SettingAdminRequest;
use Lavalite\Settings\Interfaces\SettingRepositoryInterface;
use Lavalite\Settings\Models\Setting;


/**
 *
 * @package Settings
 */

class SettingAdminController extends AdminController
{

    /**
     * Initialize setting controller
     * @param type SettingRepositoryInterface $setting
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
    public function index(SettingAdminRequest $request)
    {
        $settings  = $this->model->setPresenter('\\Lavalite\\Settings\\Repositories\\Presenter\\SettingListPresenter')->paginate(NULL, ['*']);

        $this   ->theme->prependTitle(trans('settings::setting.names').' :: ');
        $view   = $this->theme->of('settings::admin.setting.index')->render();

        $this->responseCode = 200;
        $this->responseMessage = trans('messages.success.loaded', ['Module' => 'Setting']);
        $this->responseData = $settings['data'];
        $this->responseMeta = $settings['meta'];
        $this->responseView = $view;
        $this->responseRedirect = '';
        return $this->respond($request);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return Response
     */

    public function show(SettingAdminRequest $request, Setting $setting)
    {  
        
        if (!$setting->exists) {
            $this->responseCode = 404;
            $this->responseMessage = trans('messages.success.notfound', ['Module' => 'Setting']);
            $this->responseData = $setting;
            $this->responseView = view('settings::admin.setting.new');
            return $this -> respond($request);
        }

        Form::populate($setting);
        $this->responseCode = 200;
        $this->responseMessage = trans('messages.success.loaded', ['Module' => 'Setting']);
        $this->responseData = $setting;
        $this->responseView = view('settings::admin.setting.show', compact('setting'));
        return $this -> respond($request);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return Response
     */

    public function create(SettingAdminRequest $request)
    {

        $setting = $this->model->newInstance([]);

        Form::populate($setting);

        $this->responseCode = 200;
        $this->responseMessage = trans('messages.success.loaded', ['Module' => 'Setting']);
        $this->responseData = $setting;
        $this->responseView = view('settings::admin.setting.create', compact('setting'));
        return $this -> respond($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @return Response
     */
   
    public function store(SettingAdminRequest $request)
    {
        try {
            $attributes = $request->all();
            $setting = $this->model->create($attributes);

            $this->responseCode = 201;
            $this->responseMessage = trans('messages.success.created', ['Module' => 'Setting']);
            $this->responseData = $setting;
            $this->responseMeta = '';
            $this->responseRedirect = trans_url('/admin/settings/setting/'.$setting->getRouteKey());
            $this->responseView = view('settings::admin.setting.create', compact('setting'));

            return $this -> respond($request);

        } catch (Exception $e) {
            $this->responseCode = 400;
            $this->responseMessage = $e->getMessage();
            return $this -> respond($request);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function edit(SettingAdminRequest $request, Setting $setting)
    {
        Form::populate($setting);
        $this->responseCode = 200;
        $this->responseMessage = trans('messages.success.loaded', ['Module' => 'Setting']);
        $this->responseData = $setting;
        $this->responseView = view('settings::admin.setting.edit', compact('setting'));

        return $this -> respond($request);
    }

    /**
     * Update the specified resource.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(SettingAdminRequest $request, Setting $setting)
    {
        try {

            $attributes = $request->all();

            $setting->update($attributes);

            $this->responseCode = 204;
            $this->responseMessage = trans('messages.success.updated', ['Module' => 'Setting']);
            $this->responseData = $setting;
            $this->responseRedirect = trans_url('/admin/settings/setting/'.$setting->getRouteKey());

            return $this -> respond($request);

        } catch (Exception $e) {

            $this->responseCode = 400;
            $this->responseMessage = $e->getMessage();
            $this->responseRedirect = trans_url('/admin/settings/setting/'.$setting->getRouteKey());

            return $this -> respond($request);
        }
    }


    /**
     * Remove the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    
    public function destroy(SettingAdminRequest $request, Setting $setting)
    {

        try {

            $t = $setting->delete();

            $this->responseCode = 202;
            $this->responseMessage = trans('messages.success.deleted', ['Module' => 'Setting']);
            $this->responseData = $setting;
            $this->responseMeta = '';
            $this->responseRedirect = trans_url('/admin/settings/setting/0');

            return $this -> respond($request);

        } catch (Exception $e) {

            $this->responseCode = 400;
            $this->responseMessage = $e->getMessage();
            $this->responseRedirect = trans_url('/admin/settings/setting/'.$setting->getRouteKey());

            return $this -> respond($request);

        }
    }
}
