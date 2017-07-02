 <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PORTLET-->
            <div class="portlet light form-fit bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-list font-green"></i>
                        <span class="caption-subject font-green bold uppercase">{{ $compact['title'] }}</span>
                    </div>
                    <div class="actions">
                    
                       <a href="{{route('backend.'.$compact['title'].'.create')}}" type="button" class="btn green-meadow">@lang($compact['title'].'.create')</a> 
                        
                    </div>

                </div>
                <div class="portlet-body form">

                   {!! $dataTable->table() !!}

                </div>
            </div>
        </div>
    </div>
