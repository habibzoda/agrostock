@extends('layouts/base')

@section('content')
  <div class="breadcrumb-container">
    <h2 class="page-title">{{ $title }}</h2>
    <ul class="breadcrumb">
      <li><a href="/"><i class="fa fa-home"></i></a></li>
      <li><a href="/profile/products">Мои Продукты</a></li>
      <li><a href="#">{{$product->title}}</a></li>
    </ul>
  </div>
  <div id="product-category" class="container">
    <div class="wrapper_container row">
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
              <div class="col-sm-12 category-title">{{ $product->title }}</div>
              <div class="col-sm-12 category_description"><p>Редактировать информация о продукте</p>
              </div>
            </div>
          </div>
          <section class="section">
            <form action="/profile/product/{{$product->id}}/update" method="post" enctype="multipart/form-data">
              @csrf()
              <div class="raw">
                <div class="form-group col-sm-12 col-lg-6">
                  <label class="control-label" for="product-name">Название продукта</label>
                  <input type="text" name="title" value="{{$product->title}}" placeholder="Название продукта" id="product-name"
                         class="form-control" required>

                </div>
                <div class="form-group col-sm-12 col-lg-6">
                  <label class="control-label" for="product-price">Цена продукта</label>
                  <input type="number" name="price" value="{{$product->price}}" placeholder="Цена продукта" id="product-price"
                         class="form-control" required>

                </div>
                <div class="form-group col-sm-12 col-lg-6">
                  <label class="control-label" for="product-cat">Категория продукта</label>
                  <select name="category" id="product-cat" class="form-control">
                    @foreach($categories as $c)
                      @if ($c->id === $product->category_id)
                        <option selected value="{{$c->id}}">{{$c->title}}</option>
                        @else
                        <option value="{{$c->id}}">{{$c->title}}</option>
                      @endif
                    @endforeach
                  </select>

                </div>
                <div class="form-group col-sm-12 col-lg-6">
                  <label class="control-label" for="product-desc">Описание продукта</label>
                  <textarea name="description" id="product-desc" class="form-control" required>
                    {{trim($product->description)}}
                  </textarea>
                </div>
              </div>
              <button type="submit" class="btn btn-default">Изменить</button>
              <a href="/profile/product/{{$product->id}}/delete" class="btn text-danger btn-lg">Удалить</a>
            </form>
          </section>
        </div>
      </div>
    </div>
  </div>
@endsection