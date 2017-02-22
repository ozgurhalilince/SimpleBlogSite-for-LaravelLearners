@extends('layouts.admin')

@section('content-header')
  Etiketler
@endsection

@section('content')
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Etiket Düzenle</h3>
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
    <form action="{{ action('TagController@update', $tag->id ) }}" method="post"  enctype="multipart/form-data">
  {{ csrf_field()}}
  {{ method_field('put')}}

  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
  	<label for="{{ trans('post.name')  }}"> Etiket İsmi </label>
  	<input class="form-control"  name="name" type="text" id="{{ trans('post.name')  }}"  value="{{$tag->name}}"/> 
  	@if ($errors->has('name'))
      	<span class="help-block">
          	<strong>{{ $errors->first('name') }}</strong>
      	</span>
  	@endif
  </div>

  <div class="form-group">
  	<button class="btn btn-success"> Güncelle</button>
  </div>
  </form>
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    
  </div>
</div>
@endsection