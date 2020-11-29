@extends('layouts/base')

@section('content')
  <div class="breadcrumb-container">
    <ul class="breadcrumb">
      <li>
        <a href="/">
          <i class="fa fa-home"></i>
        </a>
      </li>
      <li><a href="#">Вход</a></li>
    </ul>
  </div>

  <div id="account-login" class="container">
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
        <div class="row">
          <div class="col-sm-6">
            <div class="well">
              <h2>Новый пользователь</h2>

              <p><strong>Регистрация</strong></p>

              <p>Зарегистрируйтесь, если ещё не зарегистрированы в сервисе. </p>
              <a href="/register" class="btn btn-primary">Продолжить</a></div>
          </div>
          <div class="col-sm-6">
            <div class="well">
              <h2>Вход</h2>

              <p><strong>Вход в сервис</strong></p>

              <form action="/login" method="post">
                @csrf()
                <div class="form-group">
                  <label class="control-label" for="input-email">E-Mail</label>
                  <input type="text" name="email" value="" placeholder="Ваш E-Mail" id="input-email"
                         class="form-control" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="input-password">Пароль</label>
                  <input type="password" name="password" value="" placeholder="Ваш пароль" id="input-password"
                         class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="remember">Запомнить</label>
                  <input type="checkbox" name="remember" id="remember">
                </div>

                <input type="hidden" value="{{$from}}" name="to">
                <input type="submit" value="Войти" class="btn btn-primary"/>

              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection