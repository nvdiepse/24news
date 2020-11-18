<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Client'], function(){
    Route::get('/', 'SiteController@index');
    Route::get('/contact.html', 'SiteController@contact')->name('contact');
    Route::get('/blog.html', 'SiteController@blog')->name('blog');
});

Auth::routes(['register' => true]);

Route::group(['namespace' => 'Admin', 'prefix' => 'admin','middware'=>'auth'], function(){
    Route::get('/dashboard','SiteController@index');

    Route::group(['prefix' => 'category-article'], function(){
        Route::get('/find-by-id/{id}','CategoryArticleController@findById')->name('category-article.find-by-id');
        Route::put('/update/{id}','CategoryArticleController@update')->name('category-article.update');
        Route::get('/delete/{id}','CategoryArticleController@delete')->name('category-article.delete');
        Route::post('/store','CategoryArticleController@store')->name('category-article.store');
        Route::get('/index','CategoryArticleController@index')->name('category-article');
        Route::get('/get-category-article','CategoryArticleController@getCategoryArticle')->name('category-article.get-category-article');
        Route::get('/get-count-record','BrandController@getCountBrand')->name('brand.get-count-record');
    });

    Route::group(['prefix' => 'articles'], function(){
        Route::any('/create','ArticleController@create')->name('articles.create');
        Route::any('/index','ArticleController@index')->name('articles');
        Route::any('/get-article','ArticleController@getArticles')->name('articles.get-article');
        Route::any('/store','ArticleController@store')->name('article.store');
        Route::get('/delete-by-id/{id}','ArticleController@deleteById')->name('articles.delete-by-id');
        Route::get('/find-by-id/{id}','ArticleController@findById')->name('articles.find-by-id');
        Route::get('/find-by-slug/{slug}','ArticleController@findBySlug')->name('articles.find-by-slug');
        Route::get('/get-count','ArticleController@getCount')->name('articles.get-count');
    });
    Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'article','namespace' => 'Client'], function(){
    Route::get('/get-article-trendding','ArticleController@getArticleTredding');
    Route::get('/get-article-most-popular','ArticleController@getArticlesMostPopular');
    Route::get('/get-article-hot-new','ArticleController@getArticlesHotNew');
    Route::get('/{slug}','ArticleController@viewBySlug');
    Route::get('/find-by-slug/{slug}','ArticleController@findBySlug');
});

Route::group(['prefix' => 'category','namespace' => 'Client'], function(){
    Route::get('/get-all','ArticleController@getArticleTredding');
});