@extends('layouts.admin')

@section('content-header')
  Hakkımda
@endsection

@section('content')

@include('_partials.notifications')

<div class="box">
	<div class="box-header with-border">
	  <h3 class="box-title">Hakkımda</h3>
	 
	</div>
	<div class="box-body">
	   <form action="/admin/yazilar/{{$aboutme->id}}" method="post"  enctype="multipart/form-data">
		  {{ csrf_field()}}
		  {{ method_field('put')}}
		  <input type="hidden" name="category_id" value="0">
		  <input type="hidden" name="title" value="Hakkımda">

		  <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
		  	
		    <label for="{{ trans('post.content')  }}"> İçerik </label>
		    <textarea name="content" id="content_editor" rows="10" cols="80">{{$aboutme->content}}</textarea>
		  	@if ($errors->has('content'))
		      	<span class="help-block">
		          	<strong>{{ $errors->first('content') }}</strong>
		      	</span>
		  	@endif
		  </div>

		  <div class="form-group">
		  	<button class="btn btn-success">Güncelle</button>
		  </div>
		</form>
	</div>
<!-- /.box-body -->
<div class="box-footer">
  
</div>
<div>
@endsection


@section('page_scripts')
  <!-- CK Editor -->
  <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
  <!-- Select2 -->
  <script src="/theme/plugins/select2/select2.full.min.js"></script>
  <script>
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('content_editor');
      //bootstrap WYSIHTML5 - text editor
      //$(".textarea").wysihtml5();

      $(".select2").select2();
    });
  </script>
@endsection