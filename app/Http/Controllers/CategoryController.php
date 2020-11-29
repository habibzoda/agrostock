<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
  private function getStars($reviews)
  {
    $stars = 0;
    $i = 0;
    foreach ($reviews as $r) {
      $i++;
      $stars += $r->star;
    }

    if ($i === 0) {
      return 3;
    }

    return round($stars / $i);
  }

  public function one($id, Request $request)
  {
    $from = $request->path();
    $category = Category::find($id);
    $categories = Category::all();
    $products = Product::query()->where('category_id', '=', $id)->paginate(4);
    $news = News::orderBy('updated_at', 'desc')->limit(3)->get();
    $guest = Auth::guest();
    return view('category', [
      'category' => $category,
      'categories' => $categories,
      'products' => $products,
      'title' => $category->title . ' | Agrostock',
      'news' => $news,
      'guest' => $guest,
      'from' => $from,
      'stars' => function ($a) {
        return $this->getStars($a);
      }
    ]);
  }

  public function first()
  {
    return Redirect::action('App\Http\Controllers\CategoryController@one', 1);
  }
}
