@extends('layouts/base')

@section('content')
  <div class="breadcrumb-container">
    <h1 class="page-title">{{$title}}</h1>
    <ul class="breadcrumb">
      <li><a href="/"><i class="fa fa-home"></i></a></li>
      <li><a href="#">О проекте</a></li>
    </ul>
  </div>
  <div id="information-information" class="container">
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
        <h2>About Us</h2>
        <p>
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p><br>
        <p>The Cinema HD features an active-matrix liquid crystal display that produces flicker-free images that deliver twice the brightness, twice the sharpness and twice the contrast ratio of a typical CRT display. Unlike other flat panels, it's designed with a pure digital interface to deliver distortion-free images that never need adjusting. With over 4 million digital pixels, the display is uniquely suited for scientific and technical applications such as visualizing molecular structures or analyzing geological data.</p><br>

        <b>There are many variations of passages of Lorem Ipsum available</b>
        <ul>
          <li>
            Comodous in tempor ullamcorper miaculis</li>
          <li>
            sometimes on purpose (injected humour and the like).</li>
          <li>
            Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</li>
          <li>
            All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary</li>
          <li>
            It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</li>
        </ul><br>
        <b>There are many variations of passages of Lorem Ipsum available</b>

        <ol>
          <li>
            Comodous in tempor ullamcorper miaculis</li>
          <li>
            sometimes on purpose (injected humour and the like).</li>
          <li>
            Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</li>
          <li>
            All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary</li>
          <li>
            It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</li>
        </ol><br>
        <b>Sample Paragraph Text</b>
        <blockquote>
          <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summe!
          </p>
        </blockquote>
      </div>
    </div>
  </div>
@endsection