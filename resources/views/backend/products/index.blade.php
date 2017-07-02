@extends('layouts.backend')

@section('content')

@include('backend.includes.table',['datatable'=>$dataTable,'compact'=>$compact])


@endsection

@section('scripts')
{!! Html::script('/backend/scripts/datatable.js') !!}
{!! Html::script('/backend/plugins/datatables/datatables.min.js') !!}
{!! Html::script('/backend/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}
{!! Html::script('/backend/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') !!}
{!! Html::script('/backend/datatables/buttons.server-side.js') !!}
 {!! Html::script('/backend/models/'.$compact['title'].'/js/index.js') !!}

{!! $dataTable->scripts() !!}

@endsection



