<?php

namespace App\Repo;

use App\Models\CategoryArticle;
use Illuminate\Database\Eloquent\Model;

class CategoryArticleRepo
{
    public function getAll($data = null)
    {
        $query = CategoryArticle::query();
        if ($data['txtSearch']) {
            $query->where('title', 'LIKE', '%' . $data['txtSearch'] . '%');
            $query->Where('slug', 'LIKE', '%' . $data['txtSearch'] . '%');
        }
        $query->orderBy('id', 'desc');
        $query->select([
            'id',
            'title',
            'slug',
        ]);

        return $query->paginate($data['limit']);
    }

    public function getCount($data = null)
    {
        $query = CategoryArticle::query();
        if ($data['txtSearch']) {
            $query->where('title', 'LIKE', '%' . $data['txtSearch'] . '%');
            $query->Where('slug', 'LIKE', '%' . $data['txtSearch'] . '%');
        }
        return $query->count('id');
    }

    public function insert($data)
    {
        return CategoryArticle::query()->insert($data);
    }

    public function updateById($id,$data) 
    {
        return CategoryArticle::query()->where('id', $id)->update($data);
    }

    public function findById($id) 
    {
        return CategoryArticle::query()->where('id',$id)->first();
    }

    public function deleteById($id)
    {
        return CategoryArticle::destroy($id);
    }
}
