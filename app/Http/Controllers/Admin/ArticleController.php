<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Repo\ArticleRepo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class ArticleController extends Controller
{
    private $articleRepo;

    public function __construct(
        ArticleRepo $articleRepo
    ) {
        $this->articleRepo = $articleRepo;
    }

    public function create() 
    {
        return view('admin.article.create');
    }

    public function index()
    {
        return view('admin.article.index');
    }

    public function getArticles(Request $request)
    {
        $data = [
            'txtSearch' => $request->get('txtSearch'),
            'limit' => $request->get('limit'),
        ];
        $datas = $this->articleRepo->getAll($data);

        
        $datas->getCollection()->transform(function ($item) {
            $item->__label = Article::getStatusLabel()[$item->status];
            $item->__color = Article::getColorStatusLabel()[$item->status];
            $item->__link_image = Storage::url('images/article/'.$item->img);
            return $item;
        });

        return $datas;
    }

    public function viewBySlug(Request $request, $slug)
    {
        return view('client.article.detail');
    }

    public function detail(Request $request, $id)
    {
        return $this->articleRepo->findById($id);
    }

    public function findBySlug(Request $request,$slug) 
    {
        return $this->articleRepo->findBySlug($slug);
    }
    public function findById(Request $request,$id) 
    {
        $datas = $this->articleRepo->findById($id);
        $data = [
            'id' => $datas->id,
            'title' => $datas->title,
            'slug' => $datas->slug,
            'category_id' => $datas->category_id,
            'description' => $datas->description,
            'content' => $datas->content,
            'viewed' => $datas->viewed,
            'img' => $datas->img,
            'status' => $datas->status,
            'meta_keyword' => $datas->meta_keyword,
            'meta_description' => $datas->meta_description,
            'meta_title' => $datas->meta_title, 
            '__link_image' => Storage::url('images/article/'.$datas->img)
        ];

        return $data;
    }

    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
            'description' => $request->get('description'),
            'short_description' => $request->get('short_description'),
            'category_id' => $request->get('category_id'),
            'content' => $request->get('content'),
            'viewed' => 1,
            'meta_keyword' => $request->get('meta_keyword'),
            'meta_description' => $request->get('meta_description'),
            'meta_title	' => $request->get('meta_title'),
        ];
        return $this->articleRepo->updateById($id,$data);
    }

    public function store(Request $request)
    {
        try {
            $data = [
                'title' => $request->get('title'),
                'slug' => $request->get('slug'),
                'description' => $request->get('description'),
                'category_id' => $request->get('category_id'),
                'content' => $request->get('content'),
                'viewed' => '1',
                'meta_keyword' => $request->get('meta_keyword') ? $request->get('meta_keyword') : '',
                'meta_description' => $request->get('meta_description') ? $request->get('meta_description') : '',
                'meta_title' => $request->get('meta_title') ? $request->get('meta_title') : '',
                'status' => Article::arrStatus['NEW'],
                'author' => Auth::id(),
                'img' => $this->base64ToImage($request->get('image'),'images/article')
            ];
            return $this->articleRepo->insert($data);
        } catch (Exception $e) {
            report($e);
            return [
                'code' => '500',
                'msg' => __('msg.500')
            ];
        }
    }

    function base64ToImage($imageData,$folder){
        list($extension, $content) = explode(';', $imageData);
        $tmpExtension = explode('/', $extension);
        preg_match('/.([0-9]+) /', microtime(), $m);
        $fileName = sprintf('img%s%s.%s', date('YmdHis'), $m[1], $tmpExtension[1]);
        $content = explode(',', $content)[1];
        $storage = Storage::disk('public');
        $checkDirectory = $storage->exists($folder);

        if (!$checkDirectory) {
            $storage->makeDirectory($folder);
        }
        $storage->put($folder . '/' . $fileName, base64_decode($content), 'public');
        return $fileName;
    }

    public function getCount(Request $request) 
    {
        $data = [
            'txtSearch' => $request->get('txtSearch'),
            'limit' => $request->get('limit'),
        ];
        
        return $this->articleRepo->getCount($data);
    }

    public function deleteById(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            
            $this->articleRepo->deleteById($id);
            
            return [
                'code' => '200',
                'msg' => __('msg.200')
            ];
            DB::commit();
        } catch (Exception $e) {
            report($e);
            DB::rollBack();
            return [
                'code' => '500',
                'msg' => __('msg.500')
            ];
        }
    }
}
