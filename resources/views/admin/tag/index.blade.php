@extends('layouts.admin')

@section('content-header')
	Etiketler
@endsection


@section('content')

@include('_partials.notifications')

<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Etiketler</h3>
		<!--
          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
          -->
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr>
              <th>ID</th>
              <th>Etiket İsmi</th>
              <th>Slug</th>
              <th>Etikete Ait Yazı Sayısı</th>
              <th>İşlemler</th>
            </tr>
            @foreach($tags as $tag)
                <tr>
                  <td>{{$tag->id}}</td>
                  <td><a href="/admin/etiketler/{{$tag->slug}}">{{$tag->name}}</a></td>
                  <td>{{$tag->slug}}</td>
                  <td>
                    @if($tag->posts_count()->first() != null)
                      {{$tag->posts_count()->first()->count}}
                    @else
                      0
                    @endif</td>
                  <td width="200">
                  	<form action="/admin/etiketler/{{$tag->id}}"  method="POST">										
					<a href="/admin/etiketler/{{$tag->slug}}/edit" >
						<button type="button" class="btn btn-primary btn-sm">Düzenle</button>
					</a>	
						{{ csrf_field()}}
						{{ method_field('delete')}}
						<button class="btn btn-danger btn-sm btn-icon icon-left">Sil</button>
					</form>
                  </td>
                </tr>
            @endforeach
          </table>
        </div>
        <div style="text-align: center;">
          {{ $tags->links() }}
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
*</div>

	@include('admin.tag.create')

@endsection