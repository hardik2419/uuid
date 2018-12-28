
<div class="user-panel mt-3 pb-3 mb-3 d-flex" style="padding: 0px 0px 15px 0px !important;">
        <div class="image">
        	<a href="{{ route('backpack.account.info') }}">
          <img src="{{ backpack_avatar_url(backpack_auth()->user()) }}" class="img-circle elevation-2" alt="User Image"></a>
        </div>
        <div class="info">
          <p><a href="{{ route('backpack.account.info') }}">{{ backpack_auth()->user()->name }}</a></p>
    <small><a href="{{ route('backpack.account.info') }}"><span><i class="fa fa-user-circle-o"></i> {{ trans('backpack::base.my_account') }}</span></a></small>
        </div>
      </div>