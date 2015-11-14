<?php

namespace Lavalite\Settings;

use DB;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->insert([
            // Uncomment  and edit this section for entering value to setting table.
            /*
            array(
               "id"        => "Id",
               "user_id"        => "User id",
               "skey"        => "Skey",
               "name"        => "Name",
               "value"        => "Value",
               "type"        => "Type",
               "created_at"        => "Created at",
               "updated_at"        => "Updated at",
               "deleted_at"        => "Deleted at",
            ),
            */

        ]);

        DB::table('permissions')->insert([
            [
                'name'          => 'settings.setting.view',
                'readable_name' => 'View Setting',
            ],
            [
                'name'          => 'settings.setting.create',
                'readable_name' => 'Create Setting',
            ],
            [
                'name'          => 'settings.setting.edit',
                'readable_name' => 'Update Setting',
            ],
            [
                'name'          => 'settings.setting.delete',
                'readable_name' => 'Delete Setting',
            ],
        ]);

        DB::table('settings')->insert([
            // Uncomment  and edit this section for entering value to settings table.
            /*
            array(
                'key'      => 'settings.setting.key',
                'name'     => 'Some name',
                'value'    => 'Some value',
                'type'     => 'Default',
            ),
            */
        ]);
    }
}
