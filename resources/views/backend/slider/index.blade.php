@extends('layouts.backend')
@section('title')
    {{ $compact['title'] }}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PORTLET-->
            <div class="portlet light form-fit bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-list font-green"></i>
                        <span class="caption-subject font-green bold uppercase"> {{ $compact['title'] }}</span>
                    </div>
                    <div class="actions">
                      <a href="{{route('backend.'.$compact['title'].'.create')}}" type="button" class="btn green-meadow">@lang($compact['title'].'.create')</a> 
                    </div>

                </div>
                <div id="slides_contant" class="portlet-body form">

                    <!-- page content -->
                    <ul id="test-list" style="list-style: none;
                    background: #fff;
                    padding: 15px;">
                        @foreach($compact['models'] as $model)
                            <li id="listItem_{{$model->id}}" class="span2 well placeholder tile" style=" box-shadow: none !important;
                        background-color: #fff;padding: 15px;border: 1px solid #e8e8e8; margin: 8px;">
                                <img src="/move1.png" alt="move" width="30" height="30" class="handle" style="cursor: move;" />
                                <img src="/backend/models/slider/img/{{$model->image}}" style="max-width: 216px; margin-left: 25px;">
                                <div class="button-slider"><a href="{{ route('backend.'.$compact['title'].'.edit',$model->id) }}" class="icon-note" style="color: #daaf00;"></a><a href="javascript:;" onclick="remove_model({{$model->id}})" style="color: #e43a45;" class="icon-close"></a></div>
                            </li>

                        @endforeach

                    </ul>

                    <form action="{{route('backend.'.$compact['title'].'.update_sort')}}" method="post" name="sortables">
                        <input type="hidden" name="test-log" id="test-log" />
                    </form>
                    <!-- fin content -->


                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
 {!! Html::script('/backend/models/'.$compact['title'].'/js/scripts.js') !!}
@endsection

@section('styles')
{!! Html::style('/backend/models/'.$compact['title'].'/css/style.css') !!}
@endsection