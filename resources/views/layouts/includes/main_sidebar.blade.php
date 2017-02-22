 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/theme/dist/img/user_photo.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{\Auth::User()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Çevrimiçi </a>
        </div>
      </div>
      <!-- search form -->
      <!--
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"></li>
        <li>
          <a href="/admin">
            <i class="fa fa-dashboard "></i> <span>Anasayfa</span>
          </a>
        </li>
        <li>
          <a href="/admin/yazilar">
            <i class="fa fa-book "></i> <span>Blog Yazıları</span>
          </a>
        </li>
        <li>
          <a href="/admin/hakkimda">
            <i class="fa fa-user "></i> <span>Hakkımda</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bars"></i>
            <span>Kategoriler</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li>
              <a href="/admin/kategoriler"><i class="fa fa-arrow-right"></i> Hepsini Listele</a>
              </li>
            @foreach(\App\Category::all() as $category)
              <li>
              <a href="/admin/kategoriler/{{$category->slug}}"><i class="fa fa-circle-o"></i> {{$category->name}}</a>
              </li>
            @endforeach
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-tag"></i>
            <span>Etiketler</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li>
              <a href="/admin/etiketler"><i class="fa fa-arrow-right"></i> Hepsini Listele</a>
              </li>
            @foreach(\App\Tag::all() as $tag)
              <li>
              <a href="/admin/etiketler/{{$tag->slug}}"><i class="fa fa-circle-o"></i> {{$tag->name}}</a>
              </li>
            @endforeach
          </ul>
        </li>
        <li>
          <a href="/admin/yorumlar">
            <i class="fa fa-comment "></i> <span>Yorumlar</span>
          </a>
        </li>
        <li>
          <a href="/admin/ayarlar">
            <i class="fa fa-wrench "></i> <span>Hesap Ayarları</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>