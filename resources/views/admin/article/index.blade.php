@extends('layouts.dashboard')

@section('content')
<style>
    .preview {
        width: 100%;
        position: relative;
        height: 100%;
    }

    input[type="file"] {
        width: 100%;
        height: 20%;
        border: none;
        background: none;
        z-index: 100;
        /* opacity: 0; */
    }

    .image_preview {
        width: 100%;
        position: absolute;
        z-index: 1;
        height: 80%;
        bottom: 0;
    }
</style>
<div id="article">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Article</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button @click="create()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Create</button>
        </div>
        <div id="modal_article" class="show fade bd-example-modal-xl modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <form @submit.prevent="submit" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h6 class="m-0 font-weight-bold text-primary">Article</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="title-categoty" class="col-form-label">Title(*):</label>
                                        <input type="text" @input="getSlug()" v-model="article.title" class="form-control" placeholder="title..." id="title-categoty">
                                        <p v-if="arrErrors.title">
                                            <span class="text-danger" v-for="item in arrErrors.title">* @{{ item }}</span>
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <label for="slug-categoty" class="col-form-label">Slug(*):</label>
                                        <input type="text" v-model="article.slug" class="form-control" placeholder="Slug..." id="slug-categoty">
                                        <p v-if="arrErrors.slug">
                                            <span class="text-danger" v-for="item in arrErrors.slug">* @{{ item }}</span>
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <label for="slug-categoty" class="col-form-label">Category(*):</label>
                                        <select v-model="article.category_id" class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value="1">Khuyến mại</option>
                                            <option value="2">Sản phẩm (HOT)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="preview">
                                        <cropper class="image_preview img-thumbnail" v-if="url" :src="url" :stencil-props="{
                                                aspectRatio: 3/2
                                            }" @change="change"></cropper>
                                        <img class="image_preview img-thumbnail" v-else :src="default_image" alt="...">
                                        <input type="file" @change="getImageUpload($event)" accept="image/png,image/jpeg,image/jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="slug-categoty" class="col-form-label">Description(*):</label>
                                <textarea type="text" v-model="article.description" class="form-control" placeholder="Description..." id="Description"></textarea>
                                <p v-if="arrErrors.description">
                                    <span class="text-danger" v-for="item in arrErrors.description">* @{{ item }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="slug-categoty" class="col-form-label">Content(*):</label>
                                <textarea v-model="article.content" id="" cols="30" rows="10"></textarea>
                                <p v-if="arrErrors.content">
                                    <span class="text-danger" v-for="item in arrErrors.content">* @{{ item }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="slug-categoty" class="col-form-label">Meta keyword:</label>
                                <textarea type="text" v-model="article.meta_keyword" class="form-control" placeholder="Description..." id="Description"></textarea>
                                <p v-if="arrErrors.description">
                                    <span class="text-danger" v-for="item in arrErrors.meta_keyword">* @{{ item }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="slug-categoty" class="col-form-label">Meta Description:</label>
                                <textarea type="text" v-model="article.meta_description" class="form-control" name="wysiwyg-editor" placeholder="Content..." id="content"></textarea>
                                <p v-if="arrErrors.meta_description">
                                    <span class="text-danger" v-for="item in arrErrors.meta_description">* @{{ item }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="slug-categoty" class="col-form-label">Meta Title:</label>
                                <textarea type="text" v-model="article.meta_title" class="form-control" name="wysiwyg-editor" placeholder="Content..." id="content"></textarea>
                                <p v-if="arrErrors.meta_title">
                                    <span class="text-danger" v-for="item in arrErrors.meta_title">* @{{ item }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Save</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="modal_article_deltail" class="show fade bd-example-modal-xl modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">@{{ this.article.title }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <p>Nhóm bài viết : </p><a target="_blank" href="https://www.chartjs.org/docs/latest/">@{{ this.article.category_id }}</a>
                                | <p><i class="fa fa-user-circle" aria-hidden="true"></i> : @{{ this.article.author }}</p>
                                | <p><i class="fa fa-calendar-o" aria-hidden="true"></i> : 2020-11-03 </p>
                            </div>
                            <p>@{{ this.article.content }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal -->
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="dataTable_length"><label>Show
                                    <select title="dataTable_length" v-model="limit" @change="getArticles()" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries</label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div id="dataTable_filter" class="dataTables_filter"><label>Search:<input @input="getArticles()" type="search" v-model="txtSearch" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="width10" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="title: activate to sort column descending" aria-sort="ascending">Action</th>
                                        <th class="width10" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="title: activate to sort column descending" aria-sort="ascending">Image</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">title</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Category</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="loading" role="row" class="odd">
                                        <td colspan="99" class="text-center">
                                            Loading...
                                        </td>
                                    </tr>
                                    <tr v-else v-for="item in arrArticles" role="row" class="odd">
                                        <td>
                                            <span class="pointer"><i class="fa fa-pencil-square-o" aria-hidden="true" @click="findById(item.id)"></i></span>
                                            <span class="pointer"><i class="fa fa-trash" aria-hidden="true" @click="deleteById(item.id)"></i></span>
                                        </td>
                                        <td>
                                            <img :src="item.__link_image" class="img-thumbnail" :alt="item.title" title="">
                                        </td>
                                        <td>
                                            <a @click="findBySlug(item.slug)" style="cursor: pointer">
                                                <p>@{{ item.title}}</p>
                                            </a>
                                            <i><i class="fa fa-user-o" aria-hidden="true"></i> : @{{ toUpperCaseString(item.__user_name) }}</i> | <i class="fa fa-eye" aria-hidden="true"></i> : @{{ item.viewed}}
                                        </td>
                                        <td>@{{ item.__category_title}}</td>
                                        <td><span :class="item.__color"></span>@{{ item.__label}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing @{{ limit }} to @{{ getNumberStart() }} of @{{ count }} entries</div>
                        </div>
                        <div class="col-7 text-right">
                            <paginate v-model="currentPage" :click-handler="getArticles" :page-count="responseData.last_page" :prev-text="'PREV'" :next-text="'NEXT'" :container-class="'pagination'" :page-class="'page-item'" :page-link-class="'page-link'" :prev-class="'page-item'" :prev-link-class="'page-link'" :next-class="'page-item'" :next-link-class="'page-link'">
                            </paginate>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="{{ mix('js/article.js') }}"></script>
@endsection