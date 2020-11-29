@extends('layouts/base')

@section('content')
  <div class="breadcrumb-container">
    <h2 class="page-title">{{$news->title}}</h2>
    <ul class="breadcrumb">
      <li><a href="/"><i class="fa fa-home"></i></a></li>
      <li><a href="/news">Новости</a></li>
      <li><a href="#">{{$news->title}}</a></li>
    </ul>
  </div>
  <div class="container">
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
              @foreach($all_news as $n)
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
      <div id="content" class="col-sm-9 single-blog">
        <div class="page-item-title">
          <h1>{{ $news->title }}</h1>
        </div>

        <div class="blog-img">
          <img src="{{$news->photo}}" alt="{{$news->title}}" title="{{$news->title}}" class="img-responsive">
        </div>
        <div class="blog-date">{{ $news->updated_at }}</div>
        <div class="blog-desc">{{ $news->text }}</div>
        <div class="smartblogcomments">

          <div class="reply-title">Комментарии</div>
          @foreach($news->comments as $c)
            <div class="view-comment">
              <div class="user_icon"><i class="fa fa-user-o"></i></div>
              <div class="user_list">
                <div class="name"><b>{{$c->user->name}}</b></div>
                <div class="date"><b>Дата:</b> {{$c->created_at}}</div>
                <br>
                <div class="comment-text text-small">{{$c->text}}</div>
              </div>
            </div>
          @endforeach
        </div>

        @if ($guest)
          <div class="block-title">
            <div class="reply-title">Чтобы написать комментарий, нужно
              <a href="/register?from={{$from}}" class="text-success">зарегистрироваться</a>
              или
              <a href="/login?from={{$from}}" class="text-success">войти</a>
            </div>
          </div>
          <br>
        @else
          <div class="block-title">
            <div class="reply-title">Написать комментарий</div>
          </div>

          <div class="panel panel-default" id="add-comment">
            <form
              action="/comment"
              method="post" class="form-horizontal">
              @csrf()
              <div class="form-group">
                <label class="col-sm-3 control-label" for="input-comment">Текст комментария</label>

                <div class="col-sm-9">
                  <textarea name="comment" rows="10" id="input-comment" class="form-control" required></textarea>
                </div>
              </div>

              <input type="hidden" value="{{$news_id}}" name="news_id">

              <div class="col-sm-2"></div>
              <div class="col-sm-10 submit-btn buttons text-left">
                <input class="btn btn-primary" type="submit" value="Продолжить" title="Submit">
              </div>
            </form>
          </div>
          <div class="buttons text-right"></div>
        @endif
      </div>
    </div>
  </div>
@endsection