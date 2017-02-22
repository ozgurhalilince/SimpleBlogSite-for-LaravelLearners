@extends('layouts.admin')

@section('content-header')
  Blog Yazıları
@endsection

@section('content')

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Yazıyı Düzenle</h3>
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
    <form action="{{ action('PostController@update', $post->id ) }}" method="post"  enctype="multipart/form-data">
  {{ csrf_field()}}
  {{ method_field('put')}}

  <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
  	<label for="{{ trans('post.title')  }}"> {{ trans('post.title')  }} </label>
  	<input class="form-control"  name="title" type="text" id="{{ trans('post.title')  }}"  value="{{$post->title}}"/> 
  	@if ($errors->has('title'))
      	<span class="help-block">
          	<strong>{{ $errors->first('title') }}</strong>
      	</span>
  	@endif
  </div>

  <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
  	
    <label for="{{ trans('post.content')  }}"> İçerik </label>
    <textarea name="content" id="content_editor" rows="10" cols="80">{{$post->content}}</textarea>
  	@if ($errors->has('content'))
      	<span class="help-block">
          	<strong>{{ $errors->first('content') }}</strong>
      	</span>
  	@endif
  </div>

  <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
  	<label for="{{ trans('post.category_id')  }}"> {{ trans('post.category_id')  }} </label>
  	<select class="form-control" name="category_id" id="{{ trans('post.category_id')  }}"  > 
      @foreach(\App\Category::all() as $category)
        <option @if($post->category_id == $category->id ) selected @endif value="{{$category->id}}">
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
  

  <div class="form-group">
    <label>Etiketler</label>

    <select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Etiket Seç" 
    style="width: 100%;">

      @foreach(\App\Tag::all() as $tag)
        <option value="{{$tag->id}}" @if(in_array($tag->id, $post_tag_ids)) selected @endif>{{$tag->name}}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
  	<button class="btn btn-success">Güncelle</button>
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