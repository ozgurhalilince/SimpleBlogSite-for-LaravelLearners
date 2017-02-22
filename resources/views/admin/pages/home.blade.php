@extends('layouts.admin')

@section('content-header')
  Anasayfa
@endsection

@section('content')

@include('_partials.notifications')

<div class="box">
	<div class="box-header with-border">
	  <h3 class="box-title">Laravel'e yeni başlayanlar için örnek uygulama</h3>
	</div>

	<div class="box-body">
	  <a target="_blank" href="http://github.com/ozgurince">Github</a> üzerinden forklayıp, projenin gelişiminde katkıda bulunabilirsiniz.
	</div>
	<!-- /.box-body -->
	<div class="box-footer">
	  
	</div>
</div>
@endsection