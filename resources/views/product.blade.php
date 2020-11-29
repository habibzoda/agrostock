@extends('layouts/base')
@section('content')
  <div class="breadcrumb-container">
    <h1 class="page-title">{{ $product->title }}</h1>
    <ul class="breadcrumb">
      <li><a href="/"><i class="fa fa-home"></i></a></li>
      <li><a href="#">Продукты</a></li>
      <li><a href="#">{{ $product->title }}</a></li>
    </ul>
  </div>
  <div id="product-product" class="container">
    <div class="wrapper_container">
      <div class="product_carousel">
        <div class="row">
          <div class="col-md-5 col-sm-5 product-left">
            <div class="product-left-title hidden-lg hidden-md hidden-sm">
              <h2 class="product-title">{{ $product->title }}</h2>
              <ul class="list-unstyled price">
                <li class="product-price">
                  <h2>${{$product->price}}</h2>
                </li>
              </ul>
            </div>
            <div class="product-image thumbnails_horizontal">
              <div class="carousel-container">
                <a class="thumbnail" href="/assets/image/cache/catalog/productsimage/10-1000x1000.jpg"
                   title="Canon EOS 5D">
                  <img src="/assets/image/cache/catalog/productsimage/10-1000x1000.jpg" title="Canon EOS 5D"
                       alt="Canon EOS 5D">
                </a>
              </div>

            </div>

            <div class="tabs_info clearfix">
              <div id="accordion" class="panel-group" role="tablist">
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingOne">
                    <a data-toggle="collapse" href="#tab-description" data-parent="#accordion" aria-expanded="false">
                      Описание</a>
                  </div>
                  <div id="tab-description" class="panel-collapse collapse" role="tabpanel"
                       aria-labelledby="headingOne">
                    <div class="tab-description">
                      <p>{{ $product->description  }}</p>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default tab_review">
                  <div class="panel-heading" role="tab" id="headingTwo">
                    <a data-toggle="collapse" href="#tab-review" data-parent="#accordion"
                       aria-expanded="false">
                      Отзывы
                    </a>
                  </div>
                  <div id="tab-review" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                      @foreach($product->reviews as $r)
                        <div class="review">
                          <h4 class="review-author">{{$r->user->name}}</h4>

                          <p class="review-content">{{$r->text}}</p>

                          <div class="rating-wrapper">
                            @for($i=0;$i<$r->star; $i++)
                              <span class="fa fa-stack">
                              <i class="fa fa-star yellow fa-stack-2x"></i>
                            </span>
                            @endfor

                          </div>
                        </div>
                      @endforeach
                      @if ($guest)
                        <p class="h4">
                          Чтобы оставить отзыв, нужно
                          <a href="/register?from={{$from}}" class="text-success">зарегистрироваться</a>
                          или
                          <a href="/login?from={{$from}}" class="text-success">войти</a>
                        </p>
                        @else
                          <form action="/review" method="post" class="form-horizontal" id="form-review">
                            @csrf()
                            <div id="review"></div>
                            <h2>Написать отзыв</h2>

                            <div class="form-group">
                              <div class="col-sm-12">
                                <label class="control-label" for="input-review">Ваш отзыв</label>
                                <textarea name="text" rows="5" id="input-review" class="form-control" required></textarea>
                              </div>
                            </div>
                            <input type="hidden" value="{{$product_id}}" name="product_id">
                            <div class="form-group ">
                              <div class="col-sm-12">
                                <label class="control-label radio-title">Оценка</label>&nbsp;&nbsp;&nbsp;
                                <div class="form-radio">
                                  <span>Плохо</span>&nbsp;
                                  <input type="radio" name="rating" value="1">
                                  &nbsp;
                                  <input type="radio" name="rating" value="2">
                                  &nbsp;
                                  <input type="radio" name="rating" value="3">
                                  &nbsp;
                                  <input type="radio" name="rating" value="4">
                                  &nbsp;
                                  <input type="radio" name="rating" value="5">
                                  &nbsp;<span>Хорошо</span>
                                </div>
                              </div>
                            </div>

                            <div class="buttons clearfix">
                              <div class="pull-right">
                                <button type="submit" id="button-review" data-loading-text="Loading..."
                                        class="btn btn-primary">Продолжить
                                </button>
                              </div>
                            </div>
                          </form>
                        @endif

                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="col-md-7 col-sm-7 product-right">
            <div class="product-left-title hidden-xs">
              <h1 class="product-title">{{ $product->title }}</h1>
            </div>
            <div class="rating-wrapper">
              @for($i=0;$i<$stars; $i++)
                <span class="fa fa-stack">
                  <i class="fa fa-star yellow fa-stack-2x"></i>
                </span>
              @endfor

            </div>
            <ul class="list-unstyled price">
              <li class="product-price hidden-xs">
                <h2>${{$product->price}}</h2>
              </li>
              <li>
              </li>
              {{--<li><b>Количество:</b> {{$product->quantity}} штук</li>--}}
            </ul>
            <hr/>
            <div id="product">
              <h3>Заинтересовались?</h3>
            </div>
            <div class="form-group">
              @if (!$guest)
                <a href="tel:+{{trim($product->user->phone, '+')}}" role="button" id="button-cart"
                   data-loading-text="Loading..."
                   class="btn btn-primary btn-lg btn-block">Связаться
                </a>
              @else
                <p>
                  Чтобы продолжить, нужно
                  <a href="/register?from={{$from}}" class="text-success">зарегистрироваться</a>
                  или
                  <a href="/login?from={{$from}}" class="text-success">войти</a>
                </p>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection