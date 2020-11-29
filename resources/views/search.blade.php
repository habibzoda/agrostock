@extends('layouts/base')

@section('content')
  <div class="breadcrumb-container">
    <h1 class="page-title">Поиск по запросу: {{$searchText}}</h1>
    <ul class="breadcrumb">
      <li><a href="/"><i class="fa fa-home"></i></a></li>
      <li><a href="#">Поиск продуктов</a></li>
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
            <section class="featured-products">
              <h3 class="page-title hidden-sm hidden-xs">
                Новости
              </h3>

              <div class="block-title clearfix  hidden-lg hidden-md collapsed" data-target="#latest-container"
                   data-toggle="collapse">
                <span class="h3">Новости</span>
        <span class="navbar-toggler collapse-icons">
          <i class="fa fa-angle-down add"></i>
          <i class="fa fa-angle-up remove"></i>
        </span>
              </div>
              <div id="latest-container" class="collapse in data-toggler">
                @foreach($news as $n)
                  <div class="product-thumb transition">
                    <div class="image max-width-87">
                      <a href="/news/{{$n->id}}">
                        <img
                          src="{{$n->photo}}"
                          alt="{{$n->title}}"
                          width="87"
                          title="Samsung Galaxy Tab 10.1"
                          class="img-responsive">
                      </a>
                    </div>
                    <div class="caption">
                      <h4><a href="/news/{{$n->id}}">{{$n->title}}</a></h4>

                      <p class="price">
                        <span class="price-new">{{$n->updated_at}}</span>
                      </p>
                    </div>
                  </div>
                @endforeach
              </div>
            </section>
          </aside>
        </div>

        <div id="content" class="col-sm-9">
          <div class="products">
            <div class="category_banner">
              <div class="row">
                <div class="col-sm-12 category-title">Поиск по запросу: {{ $searchText }}</div>
                <div class="col-sm-12 category_description"><p>
                    Вывод предложений по вашему запросу</p>
                </div>
              </div>
            </div>
            <!-- Category Checking -->
            @if(count($products) > 0)
              <div class="row product-list-js" style="display: block;">
                @foreach($products as $p)
                  <div class="product-layout product-grid col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="product-thumb">
                      <div class="image">
                        <a href="/product/{{$p->id}}">
                          <img src="/assets/image/cache/catalog/productsimage/1-370x370.jpg"
                               alt=""
                               class="img-responsive"/>
                        </a>

                        <div class="rating">
                          @for($i=0;$i<$stars($p->reviews);$i++)
                            <span class="fa fa-stack">
                                <i class="fa fa-star gray fa-stack-2x"></i>
                              </span>
                          @endfor
                        </div>

                      </div>
                      <div class="caption">
                        <h4><a href="/product/{{$p->id}}">{{$p->title}}</a></h4>

                        <p class="price">
                      <span
                        class="price-new">${{$p->price}}</span>
                        </p>

                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              <div class="category-pagination">
                <div class="row">
                  <div class="col-sm-6 col-xs-12 text-left pagination-desc">
                    Страница {{$products->currentPage()}} из {{$products->lastPage()}}
                  </div>
                  <div class="col-sm-6 col-xs-12 text-right">
                    @if($products->currentPage() > 1)
                      <a class="btn btn-default" href="?search={{$searchText}}&page=1">
                        <span class="fa fa-angle-double-left"></span>
                      </a>
                      <a class="btn btn-default" href="{{$products->previousPageUrl()}}">
                        <span class="fa fa-angle-left"></span>

                      </a>
                    @else
                      <button class="btn btn-default" disabled>
                        <span class="fa fa-angle-double-left"></span>

                      </button>
                      <button class="btn btn-default" disabled>
                        <span class="fa fa-angle-left"></span>

                      </button>

                    @endif
                    @if($products->currentPage() < $products->lastPage())
                      <a class="btn btn-default" href="{{$products->nextPageUrl()}}">
                        <span class="fa fa-angle-right"></span>
                      </a>
                      <a class="btn btn-default" href="?search={{$searchText}}&page={{$products->lastPage()}}">
                        <span class="fa fa-angle-double-right"></span>
                      </a>
                    @else
                      <button class="btn btn-default" disabled>
                        <span class="fa fa-angle-right"></span>
                      </button>
                      <button class="btn btn-default" disabled>
                        <span class="fa fa-angle-double-right"></span>
                      </button>
                    @endif

                  </div>
                </div>
              </div>
              @else
              <p class="h4">По вашему запросу ничего не найдено</p>
              <br>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection