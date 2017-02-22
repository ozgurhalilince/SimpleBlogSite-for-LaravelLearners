@extends('layouts.admin')

@section('content-header')
  Blog Yazıları
@endsection

@section('content')

<div class="box">
	<div class="box-header with-border">
	  <h3 class="box-title">Yazı Ekle</h3>
	  <!--
	  <div class="box-tools pull-right">
	    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
	      <i class="fa fa-minus"></i></button>
	    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
	      <i class="fa fa-times"></i></button>
	  </div>
	  -->
	</div>
	<div class="box-body pad">

	<form action="{{ action('PostController@store') }}" method="post"  enctype="multipart/form-data">
	{{ csrf_field()}}

	<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
		<label for="{{ trans('post.title')  }}"> Başlık </label>
		<input class="form-control" name="title" type="text" id="{{ trans('post.title')  }}"  value="{{old('title')}}"/> 
		@if ($errors->has('title'))
	    	<span class="help-block">
	        	<strong>{{ $errors->first('title') }}</strong>
	    	</span>
		@endif
	</div>

	<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
		<label for="{{ trans('post.content')  }}"> İçerik </label>
		<textarea name="content" id="content_editor" rows="10" cols="80">{{old('content')}}</textarea>

		@if ($errors->has('content'))
	    	<span class="help-block">
	        	<strong>{{ $errors->first('content') }}</strong>
	    	</span>
		@endif
	</div>

	<div class="form-group">
		<label for="{{ trans('post.category_id')  }}"> Kategori </label>
		<select class="form-control" name="category_id" id="{{ trans('post.category_id')  }}"  > 
			@foreach(\App\Category::all() as $category)
				<option @if(old('category_id') == $category->id ) selected @endif value="{{$category->id}}">
					{{$category->name}} 
				</option> 
			@endforeach
		</select > 
		@if ($errors->has('category_id'))
	    	<span class="help-block">
	        	<strong>{{ $errors->first('category_id') }}</strong>
	    	</span>
		@endif
	</div>
	<!--
	<div class="form-group{{ $errors->has('published_at') ? ' has-error' : '' }}">
		<label for="published_at"> Yayınlanma Tarihi </label>
		<input class="form-control" name="published_at" type="text" id="published_at"  value="{{old('published_at')}}"/> 
		@if ($errors->has('published_at'))
	    	<span class="help-block">
	        	<strong>{{ $errors->first('published_at') }}</strong>
	    	</span>
		@endif
	</div> 
	-->
	<div class="form-group">
        <label>Etiketler</label>

        <select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Etiket Seç" 
        style="width: 100%;">
        	@foreach(\App\Tag::all() as $tag)
				<option value="{{$tag->id}}">{{$tag->name}}</option>
        	@endforeach
        </select>
    </div>

	<div class="form-group">
		<button class="btn btn-success"> Kaydet </button>
	</div>
	</form>
	</div>
	<!-- /.box-body -->
	<div class="box-footer">
	  
	</div>
</div>


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