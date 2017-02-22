@extends('layouts.admin')

@section('content-header')
  Blog Yazıları
@endsection

@section('content')

@include('_partials.notifications')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Blog Yazıları</h3>
          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
                <a href="/admin/yazilar/create"><button class="btn btn-success">Yazı Ekle</button></a>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr>
              <th>ID</th>
              <th>Yazı Başlığı</th>
              <th>Kategori</th>
              <th>Görüntüleme Sayısı</th>
              <th>Slug</th>
              <th>Yazar</th>
              <th>İşlemler</th>
            </tr>
            @foreach($posts as $post)
            	@if($post->id != 1)
	                <tr>
	                  <td>{{$post->id}}</td>
	                  <td><a href="/admin/yazilar/{{$post->slug}}">{{$post->title}}</a></td>
	                  <td>{{$post->category->name}}</td>
	                  <td>{{$post->view_count}}</td>
	                  <td>{{$post->slug}}</td>
	                  <td>{{$post->user->name}}</td>
	                  <td width="200">
	                  	<form action="/admin/yazilar/{{$post->id}}"  method="POST">										
            						<a href="/admin/yazilar/{{$post->slug}}/edit" >
            							<button type="button" class="btn btn-primary btn-sm">Düzenle</button>
            						</a>	
            							{{ csrf_field()}}
            							{{ method_field('delete')}}
            							<button class="btn btn-danger btn-sm btn-icon icon-left">Sil</button>
          						</form>
	                  </td>
	                </tr>
                @endif
            @endforeach
          </table>
        </div>
        <div style="text-align: center;">
          {{ $posts->links() }}
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
*</div>
@endsection