<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
  private function getStars($reviews)
  {
    $stars = 0;
    $i = 0;
    foreach ($reviews as $r){
      $i ++;
      $stars += $r->star;
    }

    if ($i === 0) {
      return 3;
    }

    return round($stars / $i);
  }

  public function home(Request $request)
  {
    $categories = Category::all();
    $products = Product::all();
    $news = News::query()->orderBy('updated_at', 'desc')->limit(6)->get();
    $from = $request->path();

    $guest = Auth::guest();

    return view('home', [
      'products' => $products,
      'categories' => $categories,
      'title' => 'Главная | Agrostock',
      'guest' => $guest,
      'news' => $news,
      'from' => $from,
      'stars' => function ($a) {
        return $this->getStars($a);
      }
    ]);
  }

  public function about(Request $request)
  {
    $categories = Category::all();
    $news = News::query()->orderBy('updated_at', 'desc')->limit(6)->get();
    $from = $request->path();

    $guest = Auth::guest();
    return view('about' ,[
      'categories' => $categories,
      'news' => $news,
      'from' => $from,
      'guest' => $guest,
      'title' => 'О проекте | Agrostock'
    ]);
  }
}
