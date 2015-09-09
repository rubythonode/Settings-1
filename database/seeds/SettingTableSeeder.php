<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SettingTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('settings')->insert(array(

        ));

        DB::table('permissions')->insert(array(
            array(
                'name' => 'settings.setting.view',
                'readable_name' => 'View Setting'
            ),
            array(
                'name' => 'settings.setting.create',
                'readable_name' => 'Create Setting'
            ),
            array(
                'name' => 'settings.setting.edit',
                'readable_name' => 'Update Setting'
            ),
            array(
                'name' => 'settings.setting.delete',
                'readable_name' => 'Delete Setting'
            )
        ));

        DB::table('settings')->insert(array(
            // Uncomment  and edit this section for entering value to settings table.
            /*
            array(
                'user_id'   => 0,
                'key'       => 'settings.setting.key',
                'name'      => 'Some readable name',
                'value'     => 'initial value which can be edited by the user',
                'type'      => 'System/Default/User' //
            ),
            */
        ));
    }
}
