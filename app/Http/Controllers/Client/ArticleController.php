<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repo\ArticleRepo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    private $articleRepo;
    public function __construct(
        ArticleRepo $articleRepo
    ) {
        $this->articleRepo = $articleRepo;
    }

    public function getArticleTredding(Request $request)
    {
        $domain = "http://" . $request->server('HTTP_HOST');
        try {
            $data = $this->articleRepo->getArticleTredding();

            $data->getCollection()->transform(function ($item) use ($domain) {
                $item->__link_image = $item->img ? $domain . Storage::url('images/article/' . $item->img) : 'http://127.0.0.1:8181/client/images/joe-gardner-75333.jpg';
                $item->__link_deatail = $domain . '/article/view/' . $item->slug;
                return $item;
            });

            return $data;
        } catch (Exception $e) {
            report($e);
            return [
                'code' => 500,
                'msg' => __('msg.500')
            ];
        }
    }
    public function getArticlesHotNew(Request $request)
    {
        $domain = "http://" . $request->server('HTTP_HOST');
        try {
            $data = $this->articleRepo->getArticlesHotNew();

            $data->getCollection()->transform(function ($item) use ($domain) {
                $item->__link_image = $item->img ? $domain . Storage::url('images/article/' . $item->img) : 'http://127.0.0.1:8181/client/images/joe-gardner-75333.jpg';
                $item->__link_deatail = $domain . '/article/view/' . $item->slug;
                return $item;
            });

            return $data;
        } catch (Exception $e) {
            report($e);
            return [
                'code' => 500,
                'msg' => __('msg.500')
            ];
        }
    }
    public function getArticlesMostPopular(Request $request)
    {
        $domain = "http://" . $request->server('HTTP_HOST');
        try {
            $data = $this->articleRepo->getArticlesMostPopular();

            $data->getCollection()->transform(function ($item) use ($domain) {
                $item->__link_image = $item->img ? $domain . Storage::url('images/article/' . $item->img) : 'http://127.0.0.1:8181/client/images/joe-gardner-75333.jpg';
                $item->__link_deatail = $domain . '/article/' . $item->slug;
                return $item;
            });

            return $data;
        } catch (Exception $e) {
            report($e);
            return [
                'code' => 500,
                'msg' => __('msg.500')
            ];
        }
    }

    public function viewBySlug(Request $request, $slug)
    {
        return view('client.detail');
    }

    public function findBySlug($slug) 
    {
        try {
            return $this->articleRepo->findBySlug($slug);
        } catch (Exception $e) {
            report($e);
            return [
                'code' => 500,
                'msg' => __('msg.500')
            ];
        }
    }
}
