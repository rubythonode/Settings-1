<?php

namespace Lavalite\Settings\Http\Requests;

use App\Http\Requests\Request;
use User;
use Gate;

class SettingAdminRequest extends Request {


	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize(\Illuminate\Http\Request $request)
	{ 
		$setting = $this->route('settings');
        // Determine if the user is authorized to access setting module,
        if (is_null($setting)) {
            return $request->user()->canDo('settings.setting.view');
        }

        // Determine if the user is authorized to create an entry,
        if ($request->isMethod('POST') || $request->is('*/create')) {

            return Gate::allows('create', $setting);
        }

        // Determine if the user is authorized to update an entry,
        if ($request->isMethod('PUT') || $request->isMethod('PATCH') || $request->is('*/edit')) {
            return Gate::allows('update', $setting);
        }

        // Determine if the user is authorized to delete an entry,
        if ($request->isMethod('DELETE')) {
            return Gate::allows('delete', $setting);
        }

        // Determine if the user is authorized to view the module.
        return Gate::allows('view', $setting);


	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules(\Illuminate\Http\Request $request)
	{
		// validation rule for create request.
        if ($request->isMethod('POST')) {
            return [
                'name'    => 'required',
            ];
        }

        // Validation rule for update request.
        if ($request->isMethod('PUT') || $request->isMethod('PATCH')) {
            return [
                'name' => 'required',
            ];
        }

        // Default validation rule.
        return [

        ];

	}

}
