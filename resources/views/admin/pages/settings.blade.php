@extends('layouts.admin')

@section('content-header')
  Hesap Ayarları
@endsection

@section('content')

@include('_partials.notifications')

<div class="box">
	<div class="box-header with-border">
	  <h3 class="box-title">Bilgilerini Güncelle</h3>
	  <!--
	  <div class="box-tools pull-right">
	    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
	      <i class="fa fa-minus"></i></button>
	    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
	      <i class="fa fa-times"></i></button>
	  </div>
	  -->
	</div>
	<div class="box-body">
	  <form action="{{ action('UserController@update', Auth::User()->id ) }}" method="post"  enctype="multipart/form-data">
		{{ csrf_field()}}
		{{ method_field('put')}}

		<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			<label for="{{ trans('user.name')  }}"> Ad Soyad </label>
			<input class="form-control"  name="name" type="text" id="{{ trans('user.name')  }}"  value="{{Auth::User()->name}}"/> 
			@if ($errors->has('name'))
		    	<span class="help-block">
		        	<strong>{{ $errors->first('name') }}</strong>
		    	</span>
			@endif
		</div>

		<div class="form-group">
			<label for="{{ trans('user.email')  }}"> Email </label>
			<input class="form-control" name="email" type="email" id="{{ trans('user.email')  }}"  value="{{Auth::User()->email}}"/> 
			@if ($errors->has('email'))
		    	<span class="help-block">
		        	<strong>{{ $errors->first('email') }}</strong>
		    	</span>
			@endif
		</div>

		<div class="form-group">
			<label for="{{ trans('user.password')  }}"> Şifre </label>
			<input class="form-control" name="password" type="password" id="{{ trans('user.password')  }}"/> 
			@if ($errors->has('password'))
		    	<span class="help-block">
		        	<strong>{{ $errors->first('password') }}</strong>
		    	</span>
			@endif
		</div>

		<div class="form-group">
			<label for="{{ trans('user.old_password')  }}"> Eski Şifre </label>
			<input class="form-control" name="old_password" type="password" id="{{ trans('user.old_password')  }}"/> 
			@if ($errors->has('old_password'))
		    	<span class="help-block">
		        	<strong>{{ $errors->first('old_password') }}</strong>
		    	</span>
			@endif
		</div>

		<div class="form-group">
			<button class="btn btn-success"> Güncelle </button>
		</div>
		</form>
	
	</div>
	<!-- /.box-body -->
	<div class="box-footer">
	  
	</div>
</div>
@endsection