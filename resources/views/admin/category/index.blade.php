@extends('layouts.admin')

@section('content-header')
	Kategoriler
@endsection


@section('content')

@include('_partials.notifications')

<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Kategoriler</h3>
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
              <th>Kategori İsmi</th>
              <th>Slug</th>
              <th>Yazı Sayısı</th>
              <th>İşlemler</th>
            </tr>
            @foreach($categories as $category)
                <tr>
                  <td>{{$category->id}}</td>
                  <td><a href="/admin/kategoriler/{{$category->slug}}">{{$category->name}}</a></td>
                  <td>{{$category->slug}}</td>
                  <td>
                    @if($category->posts_count()->first() != null)
                      {{$category->posts_count()->first()->count}}
                    @else
                      0
                    @endif
                  </td>
                  <td width="200">
                  	<form action="/admin/kategoriler/{{$category->id}}"  method="POST">										
					<a href="/admin/kategoriler/{{$category->slug}}/edit" >
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
          {{ $categories->links() }}
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
*</div>

	@include('admin.category.create')

@endsection