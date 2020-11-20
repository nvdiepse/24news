<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryArticle;
use App\Repo\CategoryArticleRepo;
use Exception;
use Illuminate\Http\Request;

class CategoryArticleController extends Controller
{
    private $categoryArticleRepo;

    public function __construct(
        CategoryArticleRepo $categoryArticleRepo
    )
    {
        $this->categoryArticleRepo = $categoryArticleRepo;
    }

    public function index(Request $request)
    {
        return view('admin.category-article.index');
    }

    public function getCategoryArticle(Request $request)
    {
        try {
            $data = [
                'txtSearch' => $request->get('txtSearch'),
                'limit' => $request->get('limit'),
            ];
            return $this->categoryArticleRepo->getAll($data);
        } catch (Exception $e) {
            report($e);
            return [
                'code' => '500',
                'msg' => dd($e)
            ];
        }
    }

    public function getDataTree(Request $request) 
    {
        try {
            $data = [
                'txtSearch' => $request->get('txtSearch'),
                'limit' => $request->get('limit'),
            ];
            return $this->categoryArticleRepo->getDataTree($data);
        } catch (Exception $e) {
            report($e);
            return [
                'code' => '500',
                'msg' => dd($e)
            ];
        }
    }

    public function update(Request $request , $id) 
    {
        $data = [
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
        ];
        return $this->categoryArticleRepo->updateById($id,$data);
    } 
       
    public function store(Request $request)
    {
        $data = [
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'status' => CategoryArticle::arrStatus['ACTIVE'],
        ];
        return $this->categoryArticleRepo->insert($data);
    }

    public function findById($id)
    {
        return $this->categoryArticleRepo->findById($id);
    }

    public function delete(Request $request, $id) 
    {
        try {
            return $this->categoryArticleRepo->deleteById($id);
        } catch (Exception $e) {
            report($e);
            return [
                'code' => '500',
                'msg' => __('msg.500')
            ];
        }
    }

}
