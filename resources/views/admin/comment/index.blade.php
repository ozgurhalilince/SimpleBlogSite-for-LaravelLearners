@extends('layouts.admin')

@section('content-header')
	Yorumlar
@endsection


@section('content')

@include('_partials.notifications')

<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Yorumlar</h3>
		{{--
          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
    --}}
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr>
              <th>ID</th>
              <th>Yazı Başlığı</th>
              <th>Ad Soyad</th>
              <th>Email</th>
              <th>Web sitesi</th>
              <th>Yorum</th>
              <th>İşlemler</th>
            </tr>
            @foreach($comments as $comment)
                <tr>
                  <td>{{$comment->id}}</td>
                  <td><a href="/admin/yazilar/{{$comment->post->slug}}">{{$comment->post->title}}</a></td>
                  <td>{{$comment->user_name}}</td>
                  <td>{{$comment->user_email}}</td>
                  <td>{{$comment->user_site}}</td>
                  <td>{{$comment->content}}</td>
                  <td width="200">
                  @if($comment->isApproved())
                    <form action="{{ action('CommentController@update', $comment->id ) }}"  method="POST">   
                      {{ csrf_field()}}
                      {{ method_field('put')}}
                      <input type="hidden" name="approval_status" value="0">
                      <button class="btn btn-primary btn-sm btn-icon icon-left">Gizle</button>
                      
                      <a href="/admin/yorumlar/{{$comment->id}}">
                        <button type="button" class="btn btn-danger btn-sm btn-icon icon-left">Sil</button>
                      </a>
                    </form>
                  @else
                    <form action="{{ action('CommentController@update', $comment->id ) }}"  method="POST">   
                      {{ csrf_field()}}
                      {{ method_field('put')}}
                      <input type="hidden" name="approval_status" value="1">
                      <button class="btn btn-success btn-sm btn-icon icon-left">Onayla</button>

                      <a href="/admin/yorumlar/{{$comment->id}}">
                        <button type="button" class="btn btn-danger btn-sm btn-icon icon-left">Sil</button>
                      </a>
                    </form>
                  @endif
                  </td>
                </tr>
            @endforeach
          </table>          
        </div>
        <div style="text-align: center;">
          {{ $comments->links() }}
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
</div>


@endsection