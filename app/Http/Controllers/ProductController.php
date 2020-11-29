<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\News;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
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

  public function search(Request $request)
  {
    $from = $request->path();
    $searchText = $request->get('search');
    if (empty($searchText)) {
      return Redirect::to('/');
    }
    $searchText = strtolower(trim($searchText));
    $products = Product::query()
      ->orderBy('title')
      ->where('title', 'like', '%' . $searchText . '%')
      ->paginate(4)
      ->appends('search', $searchText);
    $categories = Category::all();
    $news = News::orderBy('updated_at', 'desc')->limit(3)->get();

    $guest = Auth::guest();

    return view('search', [
      'products' => $products,
      'searchText' => $searchText,
      'title' => 'Поиск по запросу: ' . $searchText . ' | Agrostock',
      'categories' => $categories,
      'news' => $news,
      'from' => $from,
      'stars' => function ($a) {
        return $this->getStars($a);
      },
      'guest' => $guest
    ]);
  }

  public function review(Request $request)
  {
    $product_id = $request->post('product_id');
    $text = $request->post('text');
    $id = Auth::id();
    $rating = $request->post('rating');

    $review = new Review();
    $review->text = $text;
    $review->product_id = $product_id;
    $review->user_id = $id;
    $review->star = $rating;

    if ($review->save()) {
      return redirect()->intended('/product/'. $product_id);
    }

    return redirect()->intended('/product/' . $product_id);
  }

  public function one($id, Request $request)
  {
    $from = $request->path();
    $product = Product::find($id);
    $products = Product::query()->where('id', '!=', $id)->get();
    $reviews = $product->reviews;
    $categories = Category::all();

    $stars = $this->getStars($reviews);
    $guest = Auth::guest();

    return view('product', [
      'product' => $product,
      'stars' => $stars,
      'from' => $from,
      'products' => $products,
      'title' => $product->title . ' | Agrostock',
      'categories' => $categories,
      'guest' => $guest,
      'product_id' => $id
    ]);
  }

  public function create(Request $request)
  {
    $from = $request->path();
    $guest = Auth::guest();
    if ($guest) {
      return redirect()->intended();
    }
    $categories = Category::all();
    $news = News::query()->limit(3)->orderByDesc('updated_at')->get();
    $guest = Auth::guest();
    return view('create', [
      'categories' => $categories,
      'guest' => $guest,
      'from' => $from,
      'news' => $news,
      'title' => 'Создать объявление | Agrostock',
    ]);
  }

  public function createHandle(Request $request)
  {
    $fields = $request->only(['title', 'price', 'category', 'description']);
    $user_id = Auth::id();

    $image = '/assets/image/cache/catalog/productsimage/10-1000x1000.jpg';

    $product = new Product();
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
}
