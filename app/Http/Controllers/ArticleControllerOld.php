<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::query();
        $userQuery = $request->input('q');

        if ($userQuery) {
            $query->where('name', 'like', "%{$userQuery}%");
        }

        $articles = $query->paginate();

        return view('article.index', [
            'articles' => $articles,
            'query' => $userQuery,
        ]);
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    // Вывод формы
    public function create()
    {
        // Передаём в шаблон вновь созданный объект. Он нужен для вывода формы через Form::model
        $article = new Article();
        return view('article.create', compact('article'));
    }

    // Здесь нам понадобится объект запроса, для извлечения данных
    public function store(StorePostRequest $request)
    {
        // Проверка введенных данных
        // Если будут ошибки, то возникнет исключение
        $validated = $request->validated();

        $article = new Article();
        // Заполнение статьи данными из формы
        $article->fill($request->all());
        // При ошибках сохранения возникнет исключение
        $article->save();

        // Редирект на указанный маршрут с добавлением флеш сообщения
        $request->session()->flash('message', 'Статья создана');
        return redirect()
            ->route('articles.index');
      }

      public function edit($id)
      {
          $article = Article::findOrFail($id);
          return view('article.edit', compact('article'));
      }

      public function update(StorePostRequest $request, $id)
      {
          $article = Article::findOrFail($id);
          $data = $request->validated();

          $article->fill($data);
          $article->save();
          return redirect()
          ->route('articles.index');
      }

      public function destroy($id)
      {
          // DELETE — идемпотентный метод, поэтому результат операции всегда один и тот же
          $article = Article::find($id);
          if ($article) {
              $article->delete();
          }
          return redirect()->route('articles.index');
      }

}
