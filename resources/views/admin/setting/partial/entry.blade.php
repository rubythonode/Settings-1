  <div class="row">
               <div class='col-md-4 col-sm-6'>{!! Former::text('user.name')
               -> label(trans('settings::setting.label.user_id'))
               -> disabled()
               -> placeholder(trans('settings::setting.placeholder.user_id'))!!}
               </div>

               <div class='col-md-4 col-sm-6'>{!! Former::text('skey')
               -> label(trans('settings::setting.label.skey'))
               -> required()
               -> placeholder(trans('settings::setting.placeholder.skey'))!!}
               </div>

               <div class='col-md-4 col-sm-6'>{!! Former::text('name')
               -> label(trans('settings::setting.label.name'))
               -> required()
               -> placeholder(trans('settings::setting.placeholder.name'))!!}
               </div>

               <div class='col-md-4 col-sm-6'>{!! Former::text('value')
               -> label(trans('settings::setting.label.value'))
               -> required()
               -> placeholder(trans('settings::setting.placeholder.value'))!!}
               </div>

               <div class='col-md-4 col-sm-6'>{!! Former::select('type')
               -> options(trans('settings::setting.options.type'))
               -> label(trans('settings::setting.label.type'))
               -> placeholder(trans('settings::setting.placeholder.type'))!!}
               </div>
        </div>