@extends('layouts.dashboard')

@section('content')
<div id="article_create">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Article</h1>
    </div>
    <!-- DataTales Example -->
    <!-- <div class="card shadow mb-4"> -->
    <form action="">
        <div class="card shadow col-md-9 mb-4 float-left">
            <div class="form-group">
                <label for="title-categoty" class="col-form-label">Title(*):</label>
                <input type="text" @input="getSlug()" name="title" class="form-control" placeholder="title..." id="title-categoty">
            </div>
            <div class="form-group">
                <label for="slug-categoty" class="col-form-label">Slug(*):</label>
                <input type="text" name="slug" class="form-control" placeholder="Slug..." id="slug-categoty">
            </div>
            <div class="form-group">
                <label for="slug-categoty" class="col-form-label">Category(*):</label>
                <select name="category_id" class="custom-select custom-select-sm form-control form-control-sm">
                    <option value="1">Khuyến mại</option>
                    <option value="2">Sản phẩm (HOT)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="slug-categoty" class="col-form-label">Description(*):</label>
                <textarea type="text" name="description" class="form-control" placeholder="Description..." id="Description"></textarea>
            </div>
            <div class="form-group">
                <label for="slug-categoty" class="col-form-label">Content(*):</label>
                <textarea name="content" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="slug-categoty" class="col-form-label">Meta keyword:</label>
                <textarea type="text" name="meta_keyword" class="form-control" placeholder="Description..." id="Description"></textarea>

            </div>
            <div class="form-group">
                <label for="slug-categoty" class="col-form-label">Meta Description:</label>
                <textarea type="text" name="meta_description" class="form-control" name="wysiwyg-editor" placeholder="Content..." id="content"></textarea>

            </div>
            <div class="form-group">
                <label for="slug-categoty" class="col-form-label">Meta Title:</label>
                <textarea type="text" name="meta_title" class="form-control" name="wysiwyg-editor" placeholder="Content..." id="content"></textarea>
                <p v-if="arrErrors.meta_title">
                    <span class="text-danger" v-for="item in arrErrors.meta_title">* @{{ item }}</span>
                </p>
            </div>
        </div>
        <div class="col-md-3 float-right">
            <div class="top  card shadow mb-4 ">
                <div class="container">
                    <br>
                    <button class="btn btn-success btn-block" type="submit">Save</button>
                    <a href="" class="btn btn-primary btn-block">Quay lại</a>
                    <br>
                </div>
            </div>
            <div class="bottom card shadow mb-4 ">
                <div class="container">
                    <div class="preview">
                        <cropper class="image_preview img-thumbnail" :src="url" :stencil-props="{
                                                aspectRatio: 3/2
                                            }" ></cropper>
                        <img class="image_preview img-thumbnail" alt="...">
                        <input type="file" accept="image/png,image/jpeg,image/jpg">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- </div> -->
</div>
@endsection
@section('js')
<script src="{{ mix('js/article.js') }}"></script>
@endsection