<?php

namespace Lavalite\Settings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Lavalite\Filer\FilerTrait;

class Setting extends Model
{
    use FilerTrait;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * Initialiaze page modal.
     *
     * @param $name
     */
    public function __construct()
    {
        parent::__construct();
        $this->initialize();
    }

    /**
     * Initialize the modal variables.
     *
     * @return void
     */
    public function initialize()
    {
        $this->fillable = config('package.settings.setting.fillable');
        $this->uploads = config('package.settings.setting.uploadable');
        $this->uploadRootFolder = config('package.settings.setting.upload_root_folder');
        $this->table = config('package.settings.setting.table');
    }

    /**
     * The user that belong to the setting.
     */
    public function user()
    {
        return $this->belongsTo(config('user.user.model'));
    }
}
