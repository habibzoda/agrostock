<!DOCTYPE html>
<html lang="ru">
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ $title ?? 'Agrostock' }}</title>
  <meta name="description" content="Agrostock"/>
  <script src="/assets/catalog/view/javascript/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>
  <link href="/assets/catalog/view/javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
  <script src="/assets/catalog/view/javascript/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <link href="/assets/catalog/view/javascript/font-awesome/css/font-awesome.min.css" rel="stylesheet"
        type="text/css"/>
  <link rel="stylesheet" type="text/css" href="/assets/catalog/view/javascript/jquery/magnific/magnific-popup.css"/>
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700" rel="stylesheet" type="text/css"/>
  <link href="/assets/catalog/view/theme/organic/stylesheet/owl.carousel.min.css" rel="stylesheet">
  <script src="/assets/catalog/view/theme/organic/javascripts/owl.carousel.min.js" type="text/javascript"></script>
  <script src="/assets/catalog/view/theme/organic/javascripts/theme.js" type="text/javascript"></script>
  <link href="/assets/catalog/view/theme/organic/stylesheet/stylesheet.css" rel="stylesheet">


  <script src="/assets/catalog/view/javascript/common.js" type="text/javascript"></script>
  <script src="/assets/catalog/view/javascript/support.js" type="text/javascript"></script>
  <link href="/assets/catalog/view/javascript/font-awesome/css/font-awesome.min.css" rel="stylesheet"
        type="text/css"/>
  <script src="/assets/catalog/view/javascript/jquery/magnific/jquery.magnific-popup.min.js"></script>
  <script src="/assets/catalog/view/javascript/jquery/datetimepicker/moment/moment.min.js"
          type="text/javascript"></script>
  <script src="/assets/catalog/view/javascript/jquery/datetimepicker/moment/moment-with-locales.min.js"
          type="text/javascript"></script>
  <script src="/assets/catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js"
          type="text/javascript"></script>
  <link href="/assets/image/catalog/cart.png" rel="icon"/>
</head>
<body>
<main>
  <div id="menu_wrapper"></div>
  <header id="header" class="home">
    <div class="header-nav">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6 left-nav">
            <div id="ishiheaderblock">
              <p>Добро, пожаловать в Agrostock!</p>
            </div>


          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 right-nav">
            <div class="user-info">
              <div class="dropdown">
                <a title="Account" class="dropdown-toggle" data-toggle="dropdown">
                  <div class="user-logo"></div>
                  <span class="expand-more">Пользователь</span>
                  <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                  @if($guest)
                    <li><a href="/register"><i class="fa fa-user"></i>
                        Регистрация</a></li>
                    <li><a href="/login"><i class="fa fa-sign-in"></i> Вход</a>
                    </li>
                  @else
                    <li>
                      <a href="/profile"><i class="fa fa-user"></i>  Мой профиль</a>
                    </li>
                    <li><a href="/logout?from={{$from}}"><i class="fa fa-sign-out"></i>
                        Выход</a></li>
                  @endif
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-top">
      <div class="container">
        <div class="row">
          <div class="desktop-logo">
            <div id="logo">
              <a href="/"><img src="/assets/image/catalog/Logo.png"
                               title="Your Store" alt="Your Store"
                               class="img-responsive"/></a>
            </div>
          </div>

          <div id="_desktop_seach_widget">
            <div id="ishisearch_widget" class="search-widget">
              <div class="search-logo hidden-lg hidden-md">
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="magnifying-glass" viewBox="0 0 910 910"><title>magnifying-glass</title>
                    <path
                      d="M495,466.2L377.2,348.4c29.2-35.6,46.8-81.2,46.8-130.9C424,103.5,331.5,11,217.5,11C103.4,11,11,103.5,11,217.5 S103.4,424,217.5,424c49.7,0,95.2-17.5,130.8-46.7L466.1,495c8,8,20.9,8,28.9,0C503,487.1,503,474.1,495,466.2z M217.5,382.9 C126.2,382.9,52,308.7,52,217.5S126.2,52,217.5,52C308.7,52,383,126.3,383,217.5S308.7,382.9,217.5,382.9z"/>
                  </symbol>
                </svg>
                <svg class="icon" viewBox="0 0 30 30">
                  <use xlink:href="#magnifying-glass" x="22%" y="22%"></use>
                </svg>
              </div>
              <form action="/search" method="get">
                <div id="search" class="input-group">
                  <input id="ajax-search-text" type="text" name="search" value=""
                         placeholder="Поиск" class="form-control input-lg"/>

  <span class="input-group-btn">
    <button id="ajax-search-btn" type="submit" class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>
  </span>
                </div>

              </form>
            </div>
          </div>
          <div id="_desktop-contactinfo">
            <div class="contact-num">
              <a href="tel:+992926339911">
                <div class="call-img">
                  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="telephone-handle-silhouette" viewBox="0 0 850 850"><title>
                        telephone-handle-silhouette</title>
                      <path d="M499.639,396.039l-103.646-69.12c-13.153-8.701-30.784-5.838-40.508,6.579l-30.191,38.818
									c-3.88,5.116-10.933,6.6-16.546,3.482l-5.743-3.166c-19.038-10.377-42.726-23.296-90.453-71.04s-60.672-71.45-71.049-90.453
									l-3.149-5.743c-3.161-5.612-1.705-12.695,3.413-16.606l38.792-30.182c12.412-9.725,15.279-27.351,6.588-40.508l-69.12-103.646
									C109.12,1.056,91.25-2.966,77.461,5.323L34.12,31.358C20.502,39.364,10.511,52.33,6.242,67.539
									c-15.607,56.866-3.866,155.008,140.706,299.597c115.004,114.995,200.619,145.92,259.465,145.92
									c13.543,0.058,27.033-1.704,40.107-5.239c15.212-4.264,28.18-14.256,36.181-27.878l26.061-43.315
									C517.063,422.832,513.043,404.951,499.639,396.039z M494.058,427.868l-26.001,43.341c-5.745,9.832-15.072,17.061-26.027,20.173
									c-52.497,14.413-144.213,2.475-283.008-136.32S8.29,124.559,22.703,72.054c3.116-10.968,10.354-20.307,20.198-26.061
									l43.341-26.001c5.983-3.6,13.739-1.855,17.604,3.959l37.547,56.371l31.514,47.266c3.774,5.707,2.534,13.356-2.85,17.579
									l-38.801,30.182c-11.808,9.029-15.18,25.366-7.91,38.332l3.081,5.598c10.906,20.002,24.465,44.885,73.967,94.379
									c49.502,49.493,74.377,63.053,94.37,73.958l5.606,3.089c12.965,7.269,29.303,3.898,38.332-7.91l30.182-38.801
									c4.224-5.381,11.87-6.62,17.579-2.85l103.637,69.12C495.918,414.126,497.663,421.886,494.058,427.868z"/>
                      <path d="M291.161,86.39c80.081,0.089,144.977,64.986,145.067,145.067c0,4.713,3.82,8.533,8.533,8.533s8.533-3.82,8.533-8.533
									c-0.099-89.503-72.63-162.035-162.133-162.133c-4.713,0-8.533,3.82-8.533,8.533S286.448,86.39,291.161,86.39z"/>
                      <path d="M291.161,137.59c51.816,0.061,93.806,42.051,93.867,93.867c0,4.713,3.821,8.533,8.533,8.533
									c4.713,0,8.533-3.82,8.533-8.533c-0.071-61.238-49.696-110.863-110.933-110.933c-4.713,0-8.533,3.82-8.533,8.533
									S286.448,137.59,291.161,137.59z"/>
                      <path d="M291.161,188.79c23.552,0.028,42.638,19.114,42.667,42.667c0,4.713,3.821,8.533,8.533,8.533s8.533-3.82,8.533-8.533
									c-0.038-32.974-26.759-59.696-59.733-59.733c-4.713,0-8.533,3.82-8.533,8.533S286.448,188.79,291.161,188.79z"/>
                    </symbol>
                  </svg>
                  <svg class="icon" viewBox="0 0 40 40">
                    <use xlink:href="#telephone-handle-silhouette" x="19%" y="18%"></use>
                  </svg>
                </div>
                <div class="call">
                  <div class="call-us">Позвоните нам</div>
                  <span class="call-num">+992 92 633 99 11</span>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="nav-full-width">
      <div class="container">
        <div class="row">

          {{--<div id="_desktop_top_menu" class="menu js-top-menu hidden-xs hidden-sm home">
            <ul id="top-menu" class="top-menu" data-depth="0">
              <li class="top_level_category dropdown">
                <a class="dropdown-item" href="index98dc.html?route=product/category&amp;path=20">Organic
                </a>
              <span class="pull-xs-right hidden-md hidden-lg">
                  <span data-target="#top_sub_menu_5453" data-toggle="collapse" class="navbar-toggler collapse-icons">
                    <i class="fa fa-angle-down add"></i>
                    <i class="fa fa-angle-up remove"></i>
                  </span>
              </span>
                <div id="top_sub_menu_5453" class="dropdown-menu popover sub-menu collapse" style="width: 630px;">

                </div>
              </li>
            </ul>
          </div>--}}
          <div id="_desktop_top_menu" class="menu js-top-menu hidden-xs hidden-sm home">
            <ul id="top-menu" class="top-menu" data-depth="0">
              <li class="maintitle">
                <a href="/">Главная</a>
              </li>
              <li class="top_level_category dropdown">
                <a class="dropdown-item" href="/categories">Категории
                </a>
              <span class="pull-xs-right hidden-md hidden-lg">
                  <span data-target="#top_sub_menu_5453" data-toggle="collapse" class="navbar-toggler collapse-icons">
                    <i class="fa fa-angle-down add"></i>
                    <i class="fa fa-angle-up remove"></i>
                  </span>
              </span>

                <div id="top_sub_menu_5453" class="dropdown-menu popover sub-menu collapse" style="width: 630px;">


                  <ul class="list-unstyled childs_1 category_dropdownmenu  multiple-dropdown-menu " data-depth="1">
                    @foreach($categories as $c)

                      <li class="category">
                        <a href="/category/{{$c->id}}">{{$c->title}}</a>

                      </li>
                    @endforeach
                  </ul>
                </div>
              </li>

              <li class="maintitle">
                <a
                  href="/create">Создать объявление</a>
              </li>
              <li class="maintitle">
                <a
                  href="/news">Новости</a>
              </li>
              <li class="maintitle">
                <a href="/about">О проекте</a>
              </li>
            </ul>
          </div>

          <div id="mobile_top_menu_wrapper" class="hidden-lg hidden-md" style="display:none;">
            <div id="top_menu_closer">
              <i class="fa fa-close"></i>
            </div>
            <div class="js-top-menu mobile" id="_mobile_top_menu"></div>
          </div>

          <div id="menu-icon" class="menu-icon hidden-md hidden-lg">
            <i class="fa fa-bars" aria-hidden="true"></i>
          </div>
          <div id="_mobile_cart"></div>
          <div id="_mobile_user_info"></div>
          <div id="_mobile_seach_widget"></div>

        </div>
      </div>
    </div>
  </header>

  <div id="mobile_top_menu_wrapper" class="hidden-lg hidden-md" style="display:none;">
    <div id="top_menu_closer">
      <i class="fa fa-close"></i>
    </div>
    <div class="js-top-menu mobile" id="_mobile_top_menu"></div>
  </div>
  <div id="spin-wrapper"></div>
  <div id="siteloader">
    <div class="loader loader-3">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>

  <!-- ======= Quick view JS ========= -->
  <script>
    function quickbox() {
      if ($(window).width() > 767) {
        $('.quickview-button').magnificPopup({
          type: 'iframe',
          delegate: 'a',
          preloader: true,
          tLoading: 'Loading image #%curr%...',
        });
      }
    }
    jQuery(document).ready(function () {
      quickbox();
    });
    jQuery(window).resize(function () {
      quickbox();
    });
    $('input[name=\'search\']').autocomplete({
      'source': function (request, response) {
        $.ajax({
          url: 'index.php?route=product/search/autocomplete&filter_name=' + encodeURIComponent(request),
          dataType: 'json',
          success: function (result) {
            var products = result.products;
            $('.ajaxishi-search ul li').remove();
            $.each(products, function (index, product) {
              var html = '<li>';
              html += '<div>';
              html += '<a href="' + product.url + '" title="' + product.name + '">';
              html += '<div class="product-image"><img alt="' + product.name + '" src="' + product.image + '"></div>';
              html += '<div class="product-desc">';
              html += '<div class="product-name">' + product.name + '</div>';
              if (product.special) {
                html += '<div class="product-price"><span class="special">' + product.price + '</span><span class="price">' + product.special + '</span></div>';
              } else {
                html += '<div class="product-price"><span class="price">' + product.price + '</span></div>';
              }
              html += '</div>';
              html += '</a>';
              html += '</div>';
              html += '</li>';
              $('.ajaxishi-search ul').append(html);
            });
            $('.ajaxishi-search').css('display', 'block');
            return false;
          }
        });
      },
      'select': function (product) {
        $('input[name=\'filter_name\']').val(product.name);
      }
    });
  </script>
  @yield('content')
  <div id="_mobile_column_left" class="container"></div>
  <div id="_mobile_column_right" class="container"></div>

  <footer id="footer" class="home-footer">
    <div class="container">
      <div class="footer-before">
        <div class="container">
          <div class="row">
            <div class="block_newsletter col-lg-6 col-md-6 col-xs-12">
              <div id="boxes" class="newletter-container">
                <div style="" id="dialog" class="window">
                  <div class="box">
                    <div id="newsletter-container" class="box-content">
                      <div class="newsletter_text">
                        <div class="newsletter-content">
                          <h2 class="home-title">Agrostock - Онлайн биржа</h2>

                          <p class="block-newsletter-label">Agrostock - Онлайн биржа для продажи и покупки продуктов</p>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="block-social col-lg-6 col-md-6 col-xs-12">
              <div class="social_text">
                <h2 class="home-title">Следите за нами</h2>

                <p class="block-social-label">Следите за нами в социальных сетях</p>
              </div>
              <div id="block-container" class="footer-contact">
                <ul>
                  <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li class="youtube"><a href="#"><i class="fa fa-youtube"></i></a></li>
                  <li class="googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                  <li class="instagram"><a href="#"><i class="fa fa-instagram"></i></a></li>

                </ul>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="footer-container">
        <div class="container">
          <div class="row">
            <div class="block-contact col-lg-3 col-md-3 col-sm-12 footer-block">
              <div id="contact-info-container" class="footer-contact">
                <h5 class="hidden-sm hidden-xs">Обратная связь</h5>

                <div class="block address col-lg-12 col-sm-4 col-md-12 col-xs-4">
                  <span class="icon"><i class="fa fa-map-marker"></i></span>

                  <div class="content">
                    <a>151, Demo Store
                      United States</a>
                  </div>
                </div>
                <div class="block phone col-lg-12 col-sm-4 col-md-12 col-xs-4">
                  <span class="icon phone"><i class="fa fa-phone"></i></span>

                  <div class="content">
                    <a href="tel:+992926339911">+992 92 6339911</a>
                  </div>
                </div>
                <div class="block email col-lg-12 col-sm-4 col-md-12 col-xs-4">
                  <span class="icon"><i class="fa fa-envelope"></i></span>

                  <div class="content">
                    <a href="mailto:shade251103@gmail.com">shade251103@gmail.com</a>
                  </div>
                </div>
              </div>
            </div>
            <section class="information col-lg-3 col-md-3 col-sm-12 footer-block">
              <h5 class="hidden-sm hidden-xs">Ссылки</h5>

              <div class="footer-title clearfix  hidden-lg hidden-md collapsed" data-target="#information-container"
                   data-toggle="collapse">
                <span class="h3">Information</span>
                    <span class="navbar-toggler collapse-icons">
                      <i class="fa fa-angle-down add"></i>
                      <i class="fa fa-angle-up remove"></i>
                    </span>
              </div>
              <div id="information-container" class="collapse footer-dropdown">
                <ul class="list-unstyled">
                  <li>
                    <a href="/about">
                      О проекте
                    </a>
                  </li>
                  <li>
                    <a href="/create">
                      Создать объяление
                    </a>
                  </li>

                  <li>
                    <a href="/news">
                      Новости
                    </a>
                  </li>
                </ul>
              </div>
            </section>

          </div>
        </div>
      </div>
      <a id="slidetop" href="#"></a>
    </div>
    <div class="footer-after">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <p class="footer-aftertext">Created By Saidmashhud Habibzoda
              2020
            </p>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 paymentblock">
            <div id="ishipayment-1054110339" class="ishipaymentblock">
              <div id="paymentblock">
                <div class="item">
                  <a href="#">
                    <img src="/assets/image/cache/catalog/Payment/american-express-44x30.png" alt="Paymenticon-1"
                         class="img-responsive"/>
                  </a>
                </div>
                <div class="item">
                  <a href="#">
                    <img src="/assets/image/cache/catalog/Payment/discover-44x30.png" alt="Paymenticon-2"
                         class="img-responsive"/>
                  </a>
                </div>
                <div class="item">
                  <a href="#">
                    <img src="/assets/image/cache/catalog/Payment/google-wallet-44x30.png" alt="Paymenticon-3"
                         class="img-responsive"/>
                  </a>
                </div>
                <div class="item">
                  <a href="#">
                    <img src="/assets/image/cache/catalog/Payment/mastercard-44x30.png" alt="Paymenticon-4"
                         class="img-responsive"/>
                  </a>
                </div>
                <div class="item">
                  <a href="#">
                    <img src="/assets/image/cache/catalog/Payment/paypal-44x30.png" alt="Paymenticon-5"
                         class="img-responsive"/>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</main>
</body>

</html>
