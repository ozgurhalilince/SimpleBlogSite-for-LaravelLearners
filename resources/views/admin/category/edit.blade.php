@extends('layouts.admin')

@section('content-header')
  Kategoriler
@endsection

@section('content')
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Kategori Düzenle</h3>
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
    <form action="{{ action('CategoryController@update', $category->id ) }}" method="post"  enctype="multipart/form-data">
  {{ csrf_field()}}
  {{ method_field('put')}}

  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
  	<label for="{{ trans('post.name')  }}"> Kategori İsmi </label>
  	<input class="form-control"  name="name" type="text" id="{{ trans('post.name')  }}"  value="{{$category->name}}"/> 
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