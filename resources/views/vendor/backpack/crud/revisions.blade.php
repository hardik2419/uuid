@extends('backpack::layout')

@section('header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="text-capitalize"><span class="text-capitalize">{!! $crud->getHeading() ?? $crud->entity_name_plural !!}</span>
<small>{!! $crud->getSubheading() ?? trans('backpack::crud.revisions').' '.$crud->entity_name_plural !!}.</small></h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ url(config('backpack.base.route_prefix'), 'dashboard') }}">{{ trans('backpack::crud.admin') }}</a></li>
      <li  class="breadcrumb-item"><a href="{{ url($crud->route) }}" class="text-capitalize">{{ $crud->entity_name_plural }}</a></li>
      <li class="breadcrumb-item active">{{ trans('backpack::crud.revisions') }}</li>
    </ol>
  </div>
</div>
  
@endsection

@section('content')

<div class="row m-t-20">
  {{-- <div class="{{ $crud->getRevisionsTimelineContentClass() }}"> --}}
    <!-- Default box -->
  <div class="col-md-8 offset-md-2">
    @if ($crud->hasAccess('list'))
      <a href="{{ starts_with(URL::previous(), url($crud->route)) ? URL::previous() : url($crud->route) }}" class="hidden-print"><i class="fa fa-angle-double-left"></i> {{ trans('backpack::crud.back_to_all') }} <span>{{ $crud->entity_name_plural }}</span></a>
    @endif
    @if(!count($revisions))
      <div class="card">
        <div class="card-header with-border">
          <h3 class="card-title">{{ trans('backpack::crud.no_revisions') }}</h3>
        </div>
      </div>
    @else
      @include('crud::inc.revision_timeline')
    @endif
  </div>
</div>
@endsection


@section('after_styles')
  <link rel="stylesheet" href="{{ asset('vendor/backpack/crud/css/crud.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/backpack/crud/css/revisions.css') }}">
@endsection

@section('after_scripts')
  <script src="{{ asset('vendor/backpack/crud/js/crud.js') }}"></script>
  <script src="{{ asset('vendor/backpack/crud/js/revisions.js') }}"></script>
@endsection