@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('settings::setting.name') !!} <small> {!! trans('cms.manage') !!} {!! trans('settings::setting.names') !!}</small>
@stop

@section('title')
{!! trans('settings::setting.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! URL::to('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('cms.home') !!} </a></li>
    <li class="active">{!! trans('settings::setting.names') !!}</li>
</ol>
@stop

@section('entry')
<div class="box box-warning" id='entry-setting'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="main-list" class="table table-striped table-bordered">
    <thead>
        <th>{!! trans('settings::setting.label.user_id')!!}</th>
<th>{!! trans('settings::setting.label.skey')!!}</th>
<th>{!! trans('settings::setting.label.name')!!}</th>
<th>{!! trans('settings::setting.label.value')!!}</th>
<th>{!! trans('settings::setting.label.type')!!}</th>
    </thead>
</table>
@stop
@section('script')
<script type="text/javascript">

var oTable;
$(document).ready(function(){
    $('#entry-setting').load('{{URL::to('admin/settings/setting/0')}}');
    oTable = $('#main-list').dataTable( {
        "ajax": '{{ URL::to('/admin/settings/setting/list') }}',
        "columns": [
        { "data": "user_id" },
{ "data": "skey" },
{ "data": "name" },
{ "data": "value" },
{ "data": "type" },],
        "settingLength": 50
    });

    $('#main-list tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');

        var d = $('#main-list').DataTable().row( this ).data();

        $('#entry-setting').load('{{URL::to('admin/settings/setting')}}' + '/' + d.id);

    });
});
</script>
@stop

@section('style')
@stop