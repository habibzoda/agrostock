@extends('layouts/base')

@section('content')
  <div id="common-home">
    <div id="ishislider-1459211855" class="ishislider">
      <div class="owl-carousel">
        <div class="item">
          <a href="#">
            <img src="/assets/image/slider/slider-1.png" alt="slider-1"
                 class="img-responsive"/>
          </a>
        </div>
        <div class="item">
          <a href="#">
            <img src="/assets/image/slider/slider-2.png" alt="slider-2"
                 class="img-responsive"/>
          </a>
        </div>
        <div class="item">
          <a href="#">
            <img src="/assets/image/slider/slider-3.jpg" alt="slider-3"
                 class="img-responsive"/>
          </a>
        </div>

      </div>
      <script type="text/javascript">
        $('#ishislider-1459211855 .owl-carousel').owlCarousel({
          loop: true,
          nav: true,
          dots: true,
          autoplay: false,
          rtl: $('html').attr('dir') == 'rtl' ? true : false,
          animateOut: 'fadeOut',
          dotsClass: 'owl-dots ishi-style-dot5',
          navClass: ["owl-prev ishi-style-nav3", "owl-next ishi-style-nav3"],
          navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
          responsive: {
            0: {
              items: 1
            }
          }
        });
      </script>
    </div>

    <section id="ishiproductblock-1234010984" class="ishiproductsblock">
      <h3 class="home-title">Новые предложения</h3>

      <div class="tab-content">
        <div class="tab-pane active" id="featured-products-block2015153074">
          <div class="block_content">
            <div class="owl-carousel">

              @foreach($products as $p)
                <div class="product-container">
                  <div class="item product-thumb" data-countdowntime="2021-08-01">
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
          </div>
        </div>
      </div>
      <div class="tab-pane" id="special-products-block2015153074">
        <div class="block_content">
          <div class="owl-carousel">

          </div>
        </div>
      </div>
      <script type="text/javascript">
        $('#ishiproductblock-1234010984 .owl-carousel').owlCarousel({
          loop: false,
          nav: true,
          dots: false,
          rewind: true,
          rtl: $('html').attr('dir') == 'rtl' ? true : false,
          navText: ["<i class='fa fa-long-arrow-left'></i>", "<i class='fa fa-long-arrow-right'></i>"],
          responsive: {
            0: {
              items: 2
            },
            544: {
              items: 2
            },
            768: {
              items: 3
            },
            992: {
              items: 4
            },
            1200: {
              items: 6
            }
          }
        });
      </script>
      <script type="text/javascript">
        $('#ishiproductblock-1234010984 li a:first').tab('show');
        $(document).ready(function () {
          if ($('#ishiproductblock-1234010984 .ishiproductstab').children().length == 1) {
            $('#ishiproductblock-1234010984 .ishiproductstab.nav-tabs').hide();
          }
        });
      </script>
    </section>
  </div>


  <div class="smartblog_block clearfix" style="background: #fff;">
    <h3 class="home-title">Новости</h3>

    <div id="smartblog-carousel" class="owl-carousel">
      @foreach($news as $n)
      <div class="blog_post item">
        <div class="news_module_image_holder">

          <a href="/news/{{$n->id}}">
            <img src="{{$n->photo}}" alt="Special" title="Special"
                 class="img-responsive"/>

            <div class="blog-hover"></div>
          </a>
          <a class="blogicons icon readmore_link" title="Click to view Read More "
             href="/news/{{$n->id}}"><i class="fa fa-link"></i></a>
        </div>
        <div class="blog_content">
          <div class="smartbloginfo">
            <div class="date-time">
              <span class="date_month">{{$n->updated_at}}</span>
            </div>

          </div>
          <h4 class="blog_title">
            <a href="/news/{{$n->id}}">{{$n->title}}</a>
          </h4>

          <div class="blog-desc">
          </div>
          <div class="view-blog">
            <div class="read-more"><a href="/news/{{$n->id}}">Читать дальше</a>
            </div>
            <i class="fa fa-long-arrow-right"></i>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <script type="text/javascript">
      $('.smartblog_block .owl-carousel').owlCarousel({
        loop: false,
        nav: true,
        dots: false,
        rewind: true,
        rtl: $('html').attr('dir') == 'rtl' ? true : false,
        navText: ["<i class='fa fa-long-arrow-left'></i>", "<i class='fa fa-long-arrow-right'></i>"],
        autoplay: false,
        responsive: {
          0: {
            items: 1
          },
          543: {
            items: 2
          },
          767: {
            items: 2
          },
          991: {
            items: 2
          },
          1200: {
            items: 3
          }
        }
      });
    </script>
  </div>
@endsection