<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
  public function all(Request $request)
  {
    $from = $request->path();
    $categories = Category::all();
    $guest = Auth::guest();
    $news = News::query()->orderByDesc('updated_at')->get();

    return view('all-news', [
      'news' => $news,
      'categories' => $categories,
      'guest' => $guest,
      'from' => $from,
      'title' => 'Новости | Agrostock'
    ]);
  }

  public function one($id, Request $request)
  {
    $from = $request->path();
    $categories = Category::all();
    $news = News::find($id);
    $all_news = News::query()
      ->where('id', '!=', $id)
      ->orderBy('updated_at', 'desc')
      ->limit(3)
      ->get();
    $guest = Auth::guest();
    return view('news', [
      'categories' => $categories,
      'title' => $news->title . ' | Новости Agrostock',
      'news' => $news,
      'all_news' => $all_news,
      'guest' => $guest,
      'news_id' => $id,
      'from' => $from
    ]);
  }

  public function comment(Request $request)
  {
    $text = $request->post('comment');
    $id = Auth::id();

    $news_id = $request->post('news_id');

    $comment = new Comment();
    $comment->user_id = $id;
    $comment->news_id = $news_id;
    $comment->text = $text;

    if ($comment->save()) {
      return redirect()->intended('/news/' . $news_id);
    }

    return redirect()->intended('/news/' . $news_id);
  }
}
