<?php namespace Lavalite\Settings;

class Settings
{

    protected $settings;

    public function __construct(\Lavalite\Settings\Interfaces\SettingRepositoryInterface $settings)
    {
        $this->settings     = $settings;
    }

    /**
     * Display settings of the user
     *
     * @return Response
     */
    public function display()
    {
                return view('settings::admin.setting.setting');

    }

}
