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
                        <span class="caption-subject font-green bold uppercase">{{ $compact['title'] }}</span>
                    </div>
                    <div class="actions">
                       
                         @if(array_key_exists('id', $compact))

                          <a href="{{route('backend.'.$compact['title'].'.create_sub',$compact['id'])}}" class="btn green ">
                            <i class="fa fa-plus"></i> @lang($compact['title'].'.create')
                        </a>
                      <a href="{{ ($compact['parent_id']==null)?route('backend.'.$compact['title'].'.index'):route('backend.'.$compact['title'].'.sub_category',$compact['parent_id']) }}" class="btn btn-outline grey-salsa">retour</a>
                      @else

                       <a href="{{route('backend.'.$compact['title'].'.create')}}" class="btn green ">
                            <i class="fa fa-plus"></i> @lang($compact['title'].'.create')
                        </a>
                      @endif
                    </div>

                </div>
                <div class="portlet-body form">

                    <!-- page content -->
                    <ul id="categorie-sort-list" >
                        @foreach($compact['models'] as $model)
                            <li id="listItem_{{$model->id}}" class="span2 well placeholder tile">
                                <img src="/move1.png" alt="move" width="16" height="16" class="handle" />

               <a href="{{route('backend.'.$compact['title'].'.sub_category',$model->id)}}" class="subder" > <strong>{{$model->name}}</strong></a>
                                <div class="action_button">
               <a href="{{route('backend.'.$compact['title'].'.edit',$model->id)}}" class="boton-modifier">
                                        <i class="fa fa-edit"></i> </a>
             <a href="javascript:;"  data-loc-subject="{{$model->id}}" class="remove_model boton-supprimer">
                                        <i class="fa fa-times"></i>
                                    </a>

                                </div>

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
 {!! Html::script('/backend/models/'.$compact['title'].'/js/index.js') !!}
@endsection

@section('styles')
{!! Html::style('/backend/models/'.$compact['title'].'/css/style.css') !!}
@endsection