@extends('layouts/base')

@section('content')
  <div class="breadcrumb-container">
    <h2 class="page-title">{{ $title }}</h2>
    <ul class="breadcrumb">
      <li><a href="/"><i class="fa fa-home"></i></a></li>
      <li><a href="#">Новости</a></li>
    </ul>
  </div>
  <div id="product-category" class="container">
    <div class="row">
      <div class="wrapper_container">
        <div id="_desktop_column_left">
          <aside id="column-left" class="col-sm-3 hidden-xs">
            <div class="box">
              <h2 class="page-title hidden-sm hidden-xs">
                Категории
              </h2>

              <div class="block-title clearfix  hidden-lg hidden-md collapsed" data-target="#box-container"
                   data-toggle="collapse">
                <span class="page-title">Категории</span>
                <span class="navbar-toggler collapse-icons">
                  <i class="fa fa-angle-down add"></i>
                  <i class="fa fa-angle-up remove"></i>
                </span>
              </div>
              <div id="box-container" class="collapse data-toggler">
                <ul class="category-top-menu">
                  @foreach($categories as $c)
                    <li>
                      <a href="/category/{{$c->id}}" class="list-group-item">{{$c->title}}</a>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>

          </aside>
        </div>

        <div id="content" class="col-sm-9 all-blog">
          <h1>Новости</h1>

          <div class="sdsarticleCat clearfix row">
            @foreach($news as $n)
              <div class="blog-content">

                <div class="blog-left-content articleContent col-lg-6 col-md-12 col-sm-12">
                  <div class="blog-image">
                    <img src="{{$n->photo}}" alt="Blogs" title="Blogs" class="img-responsive">
                  </div>
                </div>
                <div class="blog-right-content smartblog-desc col-lg-6 col-md-12 col-sm-12">
                  <div class="blog-date-comment">
                    <div class="blog-title">
                      <a href="/news/{{$n->id}}">
                        {{$n->title}}</a></div>
                    <div class="blog-date">{{$n->updated_at}}</div>

                  </div>

                  <div class="read-more"><a href="/news/{{$n->id}}"
                                            class="btn btn-default">Читать дальше</a></div>
                </div>
              </div>
            @endforeach
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection