@extends('layouts.admin')

@section('content-header')
  Blog Yazıları
@endsection

@section('content')

@include('_partials.notifications')

<div class="box">
	<div class="box-header with-border">
	  <h3 class="box-title">{{$post->title}}</h3>
	  
	  <div class="pull-right">
	  	<form action="{{action('PostController@destroy', $post->id)}}"  method="POST">		
		    <a href="/admin/yazilar/{{$post->slug}}/edit"><button type="button" class="btn btn-primary btn-sm">Düzenle</button></a>
			{{ csrf_field()}}
			{{ method_field('delete')}}
			<button class="btn btn-danger btn-sm btn-icon icon-left">Sil</button>
		</form>
	  </div>
	 
	</div>
	<div class="box-body">
	  {!! $post->content !!}
	</div>
	<!-- /.box-body -->
	<div class="box-footer">
  <h3>Yorumlar</h3>
  <hr>
		@foreach($post->comments as $comment)
			   <!-- Comment -->
        <div class="post clearfix">
          <div class="user-block">
            <img class="img-circle img-bordered-sm" src="/theme/dist/img/user-avatar.png" alt="User Image">
              <form action="/admin/yorumlar/{{$comment->id}}"  method="POST">                   
                <a href="/admin/yorumlar/{{$comment->id}}/" >
                  <button type="button" class="btn btn-danger btn-xs pull-right">Sil</button>
                </a>  
                  {{ csrf_field()}}
                  {{ method_field('put')}}
                  @if($comment->approval_status == 0)
                    <input type="hidden" name="approval_status" value="1">
                    <button class="btn btn-success btn-xs btn-icon icon-left pull-right">Onayla</button>
                  @else
                    <input type="hidden" name="approval_status" value="0">
                    <button class="btn btn-primary btn-xs btn-icon icon-left pull-right">Gizle</button>
                  @endif
              </form>

                <span class="username">
                  <p>{{$comment->user_name}}</p>
{{--              <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>--}}
                  <p class="pull-right" style="margin-right: 10px;">{{$comment->created_at->format('d.m.Y H:i')}}</p>
                </span>
            <span class="description">
            <p><b>Email:</b> {{$comment->user_email}}</p>
            <p><b>Web Sitesi:</b> {{$comment->user_site}}</p></span>
          </div>
          <!-- /.user-block -->
          <p>
           {{$comment->content}}
          </p>
        </div>
        <!-- End of Comment -->
		@endforeach

    <form class="form-horizontal" action="{{action('CommentController@store')}}" method="post" enctype="multipart/form-data">
      {{ csrf_field()}}
      <input type="hidden" name="post_id" value="{{$post->id}}">
      <input type="hidden" name="user_name" value="{{Auth::User()->name}}">
      <input type="hidden" name="user_email" value="{{Auth::User()->email}}">
      <input type="hidden" name="user_site" value="ozgurhalilince.com">
      <input type="hidden" name="approval_status" value="1">

      <div class="form-group margin-bottom-none">
        <div class="col-sm-9">
          <input class="form-control" name="content" placeholder="Yorum Yap">
        </div>
        <div class="col-sm-3">
          <button type="submit" class="btn btn-danger pull-right btn-block ">Gönder</button>
        </div>
      </div>
    </form>
	</div>
</div>

@endsection