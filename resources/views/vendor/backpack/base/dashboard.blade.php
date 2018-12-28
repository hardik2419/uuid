@extends('backpack::layout')

@section('header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="text-capitalize">{{ trans('backpack::base.dashboard') }}<small>{{ trans('backpack::base.first_page_you_see') }}</small></h1>   
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ backpack_url() }}">Admin</a></li>
      <li class="breadcrumb-item active">{{ trans('backpack::base.dashboard') }}</li>
    </ol>
  </div>
</div>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header with-border">
                    <div class="card-title">{{ trans('backpack::base.login_status') }}</div>
                </div>

                <div class="card-body">{{ trans('backpack::base.logged_in') }}</div>
            </div>
        </div>
    </div>
@endsection
