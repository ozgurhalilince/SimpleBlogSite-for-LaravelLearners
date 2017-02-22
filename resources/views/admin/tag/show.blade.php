@extends('layouts.admin')

@section('content-header')
  Etiketler
@endsection

@section('content')
<div class="box">
	<div class="box-header with-border">
	  <h3 class="box-title"><b>{{$tag->name}}</b> Etiketinde Bulunan Yazılar</h3>
	  <!--
	  <div class="box-tools pull-right">
	    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
	      <i class="fa fa-minus"></i></button>
	    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
	      <i class="fa fa-times"></i></button>
	  </div>
	  -->
	</div>
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
            @foreach($tag->posts as $post)
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
	<!-- /.box-body -->
	<div class="box-footer">
	  
	</div>
</div>
@endsection