<?php

namespace App\Repo;

use App\Models\CategoryArticle;
use Illuminate\Database\Eloquent\Model;

class CategoryRepo
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
            'parent_id',
        ]);

        return $query->paginate($data['limit']);
    }

    function getDataTree($data, $parent_id = 0, $level = '--/')
    {
        $data = $this->getAll($data);
        $result = [];
        foreach ($data as $item) {
            if ($item['parent_id'] == $parent_id) {
                $item['level'] = $level;
                $result[] = $item;
                unset($data[$item['id']]);
                $child = $this->getDataTree($data, $item['id'], $level . '--/');
                $result = array_merge($result, $child);
            }
        }
        return $result;
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

    public function updateById($id, $data)
    {
        return CategoryArticle::query()->where('id', $id)->update($data);
    }

    public function findById($id)
    {
        return CategoryArticle::query()->where('id', $id)->first();
    }

    public function deleteById($id)
    {
        return CategoryArticle::destroy($id);
    }
}
