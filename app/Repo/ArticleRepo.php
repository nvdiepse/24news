<?php

namespace App\Repo;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;

class ArticleRepo
{
    public function getAll($data = null) 
    {
        $query = Article::query();
        $query->join('users', 'users.id', '=', 'news.author');
        $query->join('category_article', 'category_article.id', '=', 'news.category_id');
        if ($data['txtSearch']) {
            $query->where('news.title', 'LIKE', '%' . $data['txtSearch'] . '%');
            $query->Where('news.slug', 'LIKE', '%' . $data['txtSearch'] . '%');
        }
        $query->select('news.*', 'users.name as __user_name','category_article.title as __category_title');
        $query->orderBy('news.id', 'desc');
        return $query->paginate($data['limit']);
    }

    public function findById($id)
    {
        return Article::query()->find($id);
    }

    public function findBySlug($slug)
    {
        return Article::query()->where('slug',$slug)->first();
    }

    public function insert($data)
    {
        return Article::query()->insert($data);
    }

    public function updateById($id,$data)
    {
        return Article::query()->when('id',$id)->insert($data);
    }
    public function deleteById($id)
    {
        return Article::destroy($id);
    }

    public function getCount($data) 
    {
        $query = Article::query();
        if ($data['txtSearch']) {
            $query->where('title', 'LIKE', '%' . $data['txtSearch'] . '%');
            $query->Where('slug', 'LIKE', '%' . $data['txtSearch'] . '%');
        }
        return $query->count('id');
    }

    public function getArticleTredding()
    {
        $query = Article::query();
        $query->join('users', 'users.id', '=', 'news.author');
        $query->join('category_article', 'category_article.id', '=', 'news.category_id');
       
        $query->select('news.*', 'users.name as __user_name','category_article.title as __category_title');
        $query->orderBy('news.id', 'desc');
        return $query->paginate(10);
    }

    public function getArticlesHotNew()
    {
        $query = Article::query();
        $query->join('users', 'users.id', '=', 'news.author');
        $query->join('category_article', 'category_article.id', '=', 'news.category_id');
       
        $query->select('news.*', 'users.name as __user_name','category_article.title as __category_title');
        $query->orderBy('news.id', 'desc');
        return $query->paginate(10);
    }
    public function getArticlesMostPopular()
    {
        $query = Article::query();
        $query->join('users', 'users.id', '=', 'news.author');
        $query->join('category_article', 'category_article.id', '=', 'news.category_id');
       
        $query->select('news.*', 'users.name as __user_name','category_article.title as __category_title');
        $query->orderBy('news.id', 'desc');
        return $query->paginate(10);
    }
}
