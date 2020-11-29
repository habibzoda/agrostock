<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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

  public function products(Request $request)
  {
    $from = $request->path();
    $guest = Auth::guest();
    if ($guest) {
      return redirect()->intended();
    }
    $categories = Category::all();
    $news = News::query()->orderByDesc('updated_at')->limit(3)->get();
    $products = Product::query()->where('user_id', '=', Auth::id())->orderByDesc('updated_at')->paginate(4);
    return view('profile/products', [
      'from' => $from,
      'guest' => $guest,
      'categories' => $categories,
      'news' => $news,
      'products' => $products,
      'title' => 'Мои продукты | Agrostock',
      'stars' => function ($a) {
        return $this->getStars($a);
      }
    ]);
  }

  public function product($id, Request $request)
  {
    $from = $request->path();
    $guest = Auth::guest();
    if ($guest) {
      return redirect()->intended();
    }
    $categories = Category::all();
    $news = News::query()->orderByDesc('updated_at')->limit(3)->get();
    $product = Product::find($id);

    return view('profile/product', [
      'from' => $from,
      'guest' => $guest,
      'categories' => $categories,
      'news' => $news,
      'product' => $product,
      'title' => $product->title . ' | Agrostock',
    ]);
  }

  public function main()
  {
    $guest = Auth::guest();
    if ($guest) {
      return redirect()->intended();
    }
  }

  public function update($id, Request $request)
  {
    $guest = Auth::guest();
    if ($guest){
      return redirect()->intended();
    }

    $product = Product::find($id);
    $fields = $request->only(['title', 'price', 'category', 'description']);
    $user_id = Auth::id();

    $image = '/assets/image/cache/catalog/productsimage/10-1000x1000.jpg';
    $product->price = $fields['price'];
    $product->title = $fields['title'];
    $product->category_id = $fields['category'];
    $product->description = $fields['description'];
    $product->user_id = $user_id;
    $product->image = $image;

    if ($product->save()) {
      return redirect()->intended('/profile/products');
    }
    return redirect()->back();
  }

  public function delete($id)
  {
    $guest = Auth::guest();
    if ($guest) {
      return redirect()->intended();
    }

    Product::destroy($id);
    return redirect()->intended('/profile/products');
  }
  
  public function home()
  {
	return redirect()->intended('/profile/products');
  }
}
