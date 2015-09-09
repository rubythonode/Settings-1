<div class="box-header with-border">
    <h3 class="box-title"> View Setting  [{!!$example->name or 'New' !!}]  </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-success btn-sm" id="btn-new"><i class="fa fa-plus-circle"></i> New</button>
        @if($setting->id)
        <button type="button" class="btn btn-primary btn-sm" id="btn-edit"><i class="fa fa-pencil-square"></i> Edit</button>
        <button type="button" class="btn btn-danger btn-sm" id="btn-delete"><i class="fa fa-times-circle-o"></i> Delete</button>
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
        {!!Former::vertical_open()
        ->id('show-settings-setting')
        ->method('POST')
        ->files('true')
        ->action(URL::to('admin/settings/setting'))!!}
        <div class="tab-content">
            <div class="tab-pane active" id="details">
                @include('settings::admin.setting.partial.entry')
            </div>
        </div>
    </div>
    {!! Former::close() !!}
</div>
<div class="box-footer" >
    &nbsp;
</div>
<script type="text/javascript">
$(document).ready(function(){

    $('#btn-new').click(function(){
        $('#entry-setting').load('{{URL::to('admin/settings/setting/create')}}');
    });

    @if($setting->id)

    $('#btn-edit').click(function(){
        $('#entry-setting').load('{{URL::to('admin/settings/setting')}}/{{$setting->id}}/edit');
    });

    $('#btn-delete').click(function(){
        smoke.confirm("Are you sure?", function(e){
            if (e){
                var data = new FormData();
                $.ajax({
                    url: '{{URL::to('admin')}}/settings/setting/{{$setting->id}}',
                    type: 'DELETE',
                    processData: false,
                    contentType: false,
                    success:function(data, textStatus, jqXHR)
                    {
                        $('#entry-setting').load('{{URL::to('admin/settings/setting/0')}}');
                        $('#main-list').DataTable().ajax.reload( null, false );
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                    }
                });
            }else{
            }
        }, {
            ok: "Yes",
            cancel: "No",
            classname: "custom-class",
            reverseButtons: true
        });
    });

    @endif
});
</script>