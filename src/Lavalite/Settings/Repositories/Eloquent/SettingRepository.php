<?php

namespace Lavalite\Settings\Repositories\Eloquent;

use Lavalite\Settings\Interfaces\SettingRepositoryInterface;

class SettingRepository extends BaseRepository implements SettingRepositoryInterface
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return 'Lavalite\\Settings\\Models\\Setting';
    }
}
