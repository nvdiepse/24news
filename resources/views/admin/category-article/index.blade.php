@extends('layouts.dashboard')

@section('content')
<div id="category_article">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Category</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button @click="create()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-target=".bd-example-modal-lg"><i class="fas fa-download fa-sm text-white-50"></i> Create</button>
        </div>
        <div id="modal_category_article" class="fade bd-example-modal-lg modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form @submit.prevent="submit" method="POST">
                        @csrf   
                        <div class="modal-header">
                            <h6 class="m-0 font-weight-bold text-primary">Category</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name-categoty" class="col-form-label">Name:</label>
                                <input type="text" @input="getSlug()" style="text-transform: uppercase;" v-model="category_article.title" class="form-control" placeholder="Name..." id="name-categoty">
                                <p v-if="arrErrors.title">
                                    <span class="text-danger" v-for="item in arrErrors.title">* @{{ item }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="slug-categoty" class="col-form-label">Slug:</label>
                                <input type="text" v-model="category_article.slug" class="form-control" placeholder="Slug..." id="slug-categoty">
                                <p v-if="arrErrors.slug">
                                    <span class="text-danger" v-for="item in arrErrors.slug">* @{{ item }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="slug-categoty" class="col-form-label">Slug:</label>
                                <select v-model="category_article.parent_id" class="custom-select custom-select-sm form-control form-control-sm">
                                    <option :value="item.id" v-for="item in arrCategorieTrees">@{{ item.level }} @{{ item.title}}</option>
                                </select>
                                <p v-if="arrErrors.slug">
                                    <span class="text-danger" v-for="item in arrErrors.slug">* @{{ item }}</span>
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
        <!-- end modal -->
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="dataTable_length"><label>Show
                                <select name="dataTable_length" v-model="limit" @change="getCategoryArticle()" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> entries</label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div id="dataTable_filter" class="dataTables_filter"><label>Search:<input @input="getCategoryArticle()" type="search" v-model="txtSearch" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" style="width: 10%;" aria-sort="ascending">Action</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" >Slug</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="loading" role="row" class="odd">
                                        <td colspan="99" class="text-center">
                                            Loading...
                                        </td>
                                    </tr>
                                    <tr v-else role="row" class="odd" v-for="item in arrCategories">
                                        <td class="sorting_1">
                                            <div class="dropdown">
                                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" @click="update(item.id)">Update</a>
                                                    <a class="dropdown-item" @click="deleteById(item.id)">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="sorting_1"> <a @click="update(item.id)">@{{ item.title }}</a></td>
                                        <td class="sorting_1">@{{ item.slug }}</td>
                                        <td class="sorting_1">@{{ item.parent_id }}</td>
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
                            <paginate v-model="currentPage" 
                            :click-handler="getCategoryArticle" 
                            :page-count="responseData.last_page" 
                            :prev-text="'PREV'" :next-text="'NEXT'" 
                            :container-class="'pagination'" 
                            :page-class="'page-item'" 
                            :page-link-class="'page-link'" 
                            :prev-class="'page-item'" 
                            :prev-link-class="'page-link'" 
                            :next-class="'page-item'" 
                            :next-link-class="'page-link'">
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
<script src="{{ mix('js/category-article.js') }}"></script>
@endsection