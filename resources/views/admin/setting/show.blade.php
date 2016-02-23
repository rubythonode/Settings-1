<div class="box-header with-border">
    <h3 class="box-title"> View Setting  [{!!$example->name or 'New' !!}]  </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#entry-setting' data-href='{{Trans::to('admin/settings/setting/create')}}'><i class="fa fa-times-circle"></i> {{ trans('cms.new') }}</button>
        @if($setting->id)
        <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#entry-setting' data-href='{{ trans_url('/admin/settings/setting') }}/{{$setting->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('cms.edit') }}</button>
        <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#entry-setting' data-datatable='#main-list' data-href='{{ trans_url('/admin/settings/setting') }}/{{$setting->getRouteKey()}}' >
        <i class="fa fa-times-circle"></i> {{ trans('cms.delete') }}
        </button>
        @endif
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Setting</a></li>
        </ul>
        {!!Form::vertical_open()
        ->id('show-settings-setting')
        ->method('POST')
        ->files('true')
         ->action(trans_url('admin/settings/setting/'. $setting->getRouteKey()))!!}
        <div class="tab-content">
            <div class="tab-pane active" id="details">
                @include('settings::admin.setting.partial.entry')
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<div class="box-footer" >
    &nbsp;
</div>