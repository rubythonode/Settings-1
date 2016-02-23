<?php
 return ['setting' => [
                    'Name'          => 'Setting',
                    'name'          => 'setting',
                    'table'         => 'settings',
                    'model'         => 'Lavalite\Settings\Models\Setting',
                    'image'         => [
                        'xs'        => ['width' => '60',     'height' => '45'],
                        'sm'        => ['width' => '100',    'height' => '75'],
                        'md'        => ['width' => '460',    'height' => '345'],
                        'lg'        => ['width' => '800',    'height' => '600'],
                        'xl'        => ['width' => '1000',   'height' => '750'],
                        ],
                    'fillable'          => ['id', 'user_id', 'skey', 'name', 'value', 'type', 'created_at', 'updated_at', 'deleted_at'],
                    'listfields'        => ['id', 'user_id', 'skey', 'name', 'value', 'type', 'created_at', 'updated_at', 'deleted_at'],
                    'translatable'      => ['id', 'user_id', 'skey', 'name', 'value', 'type', 'created_at', 'updated_at', 'deleted_at'],
                    'upload-folder'     => '/uploads/settings/setting',
                    'uploadable'        => [
                                                'single'   => [],
                                                'multiple' => [],
                                            ],

                    ]];
