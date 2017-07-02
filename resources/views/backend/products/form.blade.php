
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
            'id'=>'products_form',
            'files' => true,
            'url' => $route,
            'method' => $method,
            'role' => 'form',
            'class' => 'form-horizontal form-bordered',
        ]
    )
!!}
                        
                        <div class="form-group">
                            <label class="control-label col-md-2">Titre</label>
                            <div class="col-md-4">
                                <div class="input-icon right">
                                    <i class="icon-exclamation-sign"></i>
                            <input type="text" class="form-control" placeholder="Titre fr" name="name" id="name" value="{{ isset($model->name) ? $model->name : old('name') }}">
                                    <input  type="text" placeholder="Titre en" class="form-control not-show" name="name_en" id="name_en" value="{{ isset($model->name_en) ? $model->name_en : old('name_en') }}"> </div>

                            </div>
                            <div class="col-md-1">
                                <select   class="lang form-control">
                                    <option value="fr" selected>fr</option>
                                    <option value="en">en</option>
                                </select>
                            </div>

                            </div>

                       


                        <div class="form-group">
                            <label for="multiple" class="control-label col-md-2">Catégories</label>
                            <div class="col-md-4">

                                <select id="multiple" name="categoris[]" data-order="false"  value="2" class="form-control select2-multiple" multiple >
                                    @foreach(\App\models\Categorys::orderBy('name')->get() as $cat)
                                        <option value="{{$cat->id}}">{!! $cat->name !!}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                 @if(isset($model->categorys))

              <input type="hidden" id="categories" value="{{json_encode($model->categorys->pluck('id')->toArray())}}" >
                   
                 @endif
                                        

                         <div class="form-group">
                            <label class="control-label col-md-2"> Image </label>
                            <div class="col-md-4">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" >
                                        <img src="{{ ($model->default_image)? '/backend/models/'.$modName.'/img/'.$model->default_image :'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image' }}" alt="" /> </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"> </div>
                                    <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new">@lang('default.select_image')</span>
                                                                <span class="fileinput-exists">@lang('default.change_img')</span>
                                                                <input type="file" name="default_image"> </span>
                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">@lang('default.rmv_image') </a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Prix</label>
                            <div class="col-md-2">
                                <div class="input-icon right">
                                    <i class="icon-exclamation-sign"></i>
                                    <input type="number" class="form-control" step="any" name="price" id="price" value="{!! $model->price !!}" required="required"> </div>
                            </div>

                            <label class="control-label col-md-2">Prix Promotion</label>
                            <div class="col-md-2">
                                <div class="input-icon right">
                                    <i class="icon-exclamation-sign"></i>
                                    <input type="number" class="form-control" step="any" name="prix_promotion" id="prix_promotion" value="{!! $model->prix_promotion !!}"> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Afficher dans la partie</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="icheck-inline">
                                        <label>
                                            <input type="checkbox" {{ ($model->new_product=='on')?'checked':'' }} class="icheck" name="new_product"> NOUVEAU PRODUIT  </label>
                                        <label>
                                            <input type="checkbox"  class="icheck" name="best_saller"> MEILLEURES VENTES  </label>

                                    </div>
                                </div>

                        </div>
                        </div>

                       <div class="row">
                           <div class="col-md-12 relative" >
                               <div class="form-body" id="description">
                                   <div class="form-group last">
                                       <label class="control-label col-md-2 label-des">Description fr</label>
                                       <div class="col-md-9">
                                           <textarea id="editor1" class="ckeditor form-control" name="description" rows="6">{{$model->description}}</textarea>

                                       </div>
                                   </div>
                               </div>
                               <div class="form-body not-show" id="description_en" >
                                   <div class="form-group last">
                                       <label class="control-label col-md-2 label-des" >Description en</label>
                                       <div class="col-md-9">
                                           <textarea  class="ckeditor form-control" name="description_en" rows="6">{{$model->description_en}}</textarea>
                                       </div>
                                   </div>
                               </div>
                               <select  class="lang form-control lang_desc">
                                   <option value="fr" selected>fr</option>
                                   <option value="en">en</option>
                               </select>
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

{!! Html::script('/backend/plugins/ckeditor/ckeditor.js') !!}
{!! Html::script('/backend/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js') !!}
{!! Html::script('/backend/plugins/select2/js/select2.full.min.js') !!}
{!! Html::script('/backend/scripts/components-select2.min.js') !!}
{!! Html::script('/backend/plugins/bootstrap-fileinput/bootstrap-fileinput.js') !!}
{!! Html::script('/backend/plugins/dropzone/dropzone.min.js') !!}
{!! Html::script('/backend/scripts/form-dropzone.min.js') !!}
{!! Html::script('/backend/plugins/icheck/icheck.min.js') !!}
{!! Html::script('/backend/models/'.$modName.'/js/add.js') !!}

 
@endsection
@section('styles')

{!! Html::style('/backend/plugins/select2/css/select2.min.css') !!}
{!! Html::style('/backend/plugins/select2/css/select2-bootstrap.min.css') !!}
{!! Html::style('/backend/plugins/bootstrap-fileinput/bootstrap-fileinput.css') !!}
{!! Html::style('/backend/plugins/dropzone/dropzone.min.css') !!}
{!! Html::style('/backend/plugins/dropzone/basic.min.css') !!}
{!! Html::style('/backend/plugins/icheck/skins/all.css') !!}
{!! Html::style('/backend/models/'.$modName.'/css/style.css') !!}




@endsection


