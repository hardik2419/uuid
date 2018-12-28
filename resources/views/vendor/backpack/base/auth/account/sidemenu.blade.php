<div class="card">
    <div class="card-body text-center  box-profile">
	    <img class="profile-user-img img-responsive img-circle" src="{{ backpack_avatar_url(backpack_auth()->user()) }}">
	    <h3 class="profile-username text-center">{{ backpack_auth()->user()->first_name }}</h3>
	</div>

	<ul class="nav nav-pills flex-column">

	  <li role="presentation"
		@if (Request::route()->getName() == 'backpack.account.info')
	  	class="active"
	  	@endif
	  	><a href="{{ route('backpack.account.info') }}" class="nav-link" >{{ trans('backpack::base.update_account_info') }}</a></li>

	  <li role="presentation"
		@if (Request::route()->getName() == 'backpack.account.password')
	  	class="active"
	  	@endif
	  	><a href="{{ route('backpack.account.password') }}" class="nav-link">{{ trans('backpack::base.change_password') }}</a></li>

	</ul>
</div>
