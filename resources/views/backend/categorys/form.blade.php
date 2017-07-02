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
                        <span class="caption-subject font-green bold uppercase"> {{$title}} </span>
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
                            <label class="control-label col-md-2">Titre </label>
                            <div class="col-md-4">
                                <div class="input-icon right">
                                    <i class="icon-exclamation-sign"></i>
                                    <input type="text" class="form-control" placeholder="Title fr" name="name" id="name" value="{{ isset($model->name) ? $model->name : old('name') }}" required>
                                </div>
                                     <input type="text" class="form-control not-show"  placeholder="Title en"  name="name_en" id="name_en" value="{{ isset($model->name_en) ? $model->name_en : old('name_en') }}" >
                            </div>
                            <div class="col-md-1">

                                <select  id="lang" class="form-control">
                                    <option value="fr" selected>fr</option>
                                    <option value="en">en</option>
                                </select>
                            </div>

                        </div>
                        @if(isset($parent_id))
                        <input type="hidden" name="parent_id" value="{{$parent_id}}">
                        @endif





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
 {!! Html::script('/backend/models/'.$modName.'/js/form.js') !!}
@endsection



