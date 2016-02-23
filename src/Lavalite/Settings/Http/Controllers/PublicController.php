<?php

namespace Lavalite\Settings\Http\Controllers;

use App\Http\Controllers\PublicController as CMSPublicController;

class PublicController extends CMSPublicController
{
    /**
     * Constructor.
     *
     * @param type \Lavalite\Setting\Interfaces\SettingRepositoryInterface $setting
     *
     * @return type
     */
    public function __construct(\Lavalite\Settings\Interfaces\SettingRepositoryInterface $setting)
    {
        $this->model = $setting;
        parent::__construct();
    }

    /**
     * Show setting's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $data['settings'] = $this->model->all();

        return $this->theme->of('settings::public.setting.index', $data)->render();
    }

    /**
     * Show setting.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $data['setting'] = $this->model->getSetting($slug);

        return $this->theme->of('settings::public.setting.show', $data)->render();
    }
}
