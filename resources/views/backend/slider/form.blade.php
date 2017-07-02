@extends('layouts.backend')
@section('title')
    {{$title}}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PORTLET-->
            <div class="portlet light form-fit bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-social-dribbble font-green"></i>
                        <span class="caption-subject font-green bold uppercase">{{$title}}</span>
                    </div>

                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <!-- BEGIN EXTRAS PORTLET-->

                    <div class="portlet-body form">

              @include('layouts.messages')
                        <!-- BEGIN FORM-->
    {!!
    Form::open(
        [
            'files' => true,
            'url' => $route,
            'method' => $method,
            'role' => 'form',
            'class' => 'form-horizontal form-bordered',
        ]
    )
    !!}
                        <div class="form-group">
                            <label class="control-label col-md-2">Url</label>
                            <div class="col-md-4">
                                <div class="input-icon right">
                                    <i class="icon-exclamation-sign"></i>
                                    <input type="url" class="form-control" name="url" id="url" value="{{ isset($model->url) ? $model->url : old('url') }}"> </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-2"> Image </label>
                            <div class="col-md-4">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" >
                                        <img src="{{ ($model->image)? '/backend/models/slider/img/'.$model->image :'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image' }}" alt="" /> </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"> </div>
                                    <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new">@lang('default.select_image')</span>
                                                                <span class="fileinput-exists">@lang('default.change_img')</span>
                                                                <input type="file" name="image"> </span>
                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">@lang('default.rmv_image') </a>
                                    </div>
                                </div>

                            </div>
                        </div>


                        @include('layouts.submit_button',['modName'=>$modName])

                      
                    {!! Form::close() !!}
                    <!-- END FORM-->


                    </div>

                    <!-- END EXTRAS PORTLET-->
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END PORTLET-->
        </div>
    </div>
@endsection
@section('scripts')
 {!! Html::script('backend/plugins/bootstrap-fileinput/bootstrap-fileinput.js') !!}
@endsection
@section('styles')
 {!! Html::style('/backend/plugins/bootstrap-fileinput/bootstrap-fileinput.css') !!}
@endsection


