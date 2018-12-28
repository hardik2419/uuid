@extends('backpack::layout')

@section('after_styles')
<style media="screen">
    .backpack-profile-form .required::after {
        content: ' *';
        color: red;
    }
</style>
@endsection

@section('header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="text-capitalize">{{ trans('backpack::base.my_account') }}</h1>
    {{-- <h1 class="text-capitalize">{!! $crud->getSubheading() ?? trans('backpack::crud.add').' '.$crud->entity_name !!}</h1> --}}
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ url(config('backpack.base.route_prefix'), 'dashboard') }}">{{ trans('backpack::crud.admin') }}</a></li>
      <li class="breadcrumb-item"><a href="{{ route('backpack.account.info') }}" class="text-capitalize">{{ trans('backpack::base.my_account') }}</a></li>
      <li class="breadcrumb-item active">{{ trans('backpack::base.update_account_info') }}</a></li>
    </ol>
  </div>
</div>

@endsection

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('backpack::auth.account.sidemenu')
    </div>
    <div class="col-md-6">

        <form class="form" action="{{ route('backpack.account.info') }}" method="post">

            {!! csrf_field() !!}

            <div class="card padding-10">

                <div class="card-body backpack-profile-form">

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->count())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        @php
                            $label = trans('backpack::base.name');
                            $field = 'name';
                        @endphp
                        <label class="required">{{ $label }}</label>
                        <input required class="form-control" type="text" name="{{ $field }}" value="{{ old($field) ? old($field) : $user->$field }}">
                    </div>

                    <div class="form-group">
                        @php
                            $label = config('backpack.base.authentication_column_name');
                            $field = backpack_authentication_column();
                        @endphp
                        <label class="required">{{ $label }}</label>
                        <input required class="form-control" type="{{ backpack_authentication_column()=='email'?'email':'text' }}" name="{{ $field }}" value="{{ old($field) ? old($field) : $user->$field }}">
                    </div>

                    <div class="form-group m-b-0">
                        <button type="submit" class="btn btn-success"><span class="ladda-label"><i class="fa fa-save"></i> {{ trans('backpack::base.save') }}</span></button>
                        <a href="{{ backpack_url() }}" class="btn btn-default"><span class="ladda-label">{{ trans('backpack::base.cancel') }}</span></a>
                    </div>

                </div>
            </div>

        </form>

    </div>
</div>
@endsection
