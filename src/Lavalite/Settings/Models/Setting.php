<?php

namespace Lavalite\Settings\Models;

use Lavalite\Filer\FilerTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class Setting extends Model
{
    use FilerTrait;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * Initialiaze page modal
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
        $this->fillable             = config('settings.setting.fillable');
        $this->uploads              = config('settings.setting.uploadable');
        $this->uploadRootFolder     = config('settings.setting.upload_root_folder');
        $this->table                = config('settings.setting.table');
    }

    /**
     * The user that belong to the setting.
     */
    public function user(){
        return $this->belongsTo(config('user.user.model'));
    }


}
