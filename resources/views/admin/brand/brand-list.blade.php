@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>Brand List</h5>
                            <div class="right-options">
                                <ul>
                                    <li>
                                        <a class="btn btn-solid" href="http://localhost/supermarkethub/admin/add-brand">Add
                                            Brand</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <div id="data-table-list_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_length" id="data-table-list_length"><label>Show <select
                                                        name="data-table-list_length" aria-controls="data-table-list"
                                                        class="custom-select custom-select-sm form-control form-control-sm">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select> entries</label></div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div id="data-table-list_filter" class="dataTables_filter"><label>Search:<input
                                                        type="search" class="form-control form-control-sm" placeholder=""
                                                        aria-controls="data-table-list"></label></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="data-table-list"
                                                class="table role-table all-package dataTable no-footer" role="grid"
                                                aria-describedby="data-table-list_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting sorting_asc" tabindex="0"
                                                            aria-controls="data-table-list" rowspan="1" colspan="1"
                                                            aria-sort="ascending"
                                                            aria-label="S.No: activate to sort column descending"
                                                            style="width: 170px;">S.No</th>
                                                        <th class="sorting" tabindex="0" aria-controls="data-table-list"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Brand Name: activate to sort column ascending"
                                                            style="width: 170px;">Brand Name</th>
                                                        <th class="sorting" tabindex="0" aria-controls="data-table-list"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Image: activate to sort column ascending"
                                                            style="width: 170px;">Image</th>
                                                        <th class="sorting" tabindex="0" aria-controls="data-table-list"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Icone: activate to sort column ascending"
                                                            style="width: 170px;">Icone</th>
                                                        <th class="sorting" tabindex="0" aria-controls="data-table-list"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Publish: activate to sort column ascending"
                                                            style="width: 170px;">Publish</th>
                                                        <th class="sorting" tabindex="0" aria-controls="data-table-list"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Date: activate to sort column ascending"
                                                            style="width: 170px;">Date</th>
                                                        <th class="sorting" tabindex="0" aria-controls="data-table-list"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Percentage Off: activate to sort column ascending"
                                                            style="width: 170px;">Percentage Off</th>
                                                        <th class="sorting" tabindex="0" aria-controls="data-table-list"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Option: activate to sort column ascending"
                                                            style="width: 170px;">Option</th>
                                                    </tr>
                                                </thead>

                                                <tbody>


                                                    <tr class="odd">
                                                        <td class="sorting_1">
                                                            #1
                                                        </td>
                                                        <td>Ross Boyd</td>
                                                        <td>
                                                            <div class="table-image">
                                                                <img src="http://localhost/supermarkethub/public/brand/1734453366.jpg"
                                                                    class="img-fluid" alt="">
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div class="table-image">
                                                                <img src="http://localhost/supermarkethub/public/brand/1734453366.jpg"
                                                                    class="img-fluid" alt="">
                                                            </div>
                                                        </td>

                                                        <td class="menu-status">
                                                            <div class="col-sm-9">
                                                                <label class="switch">
                                                                    <input type="checkbox" data-id="1"
                                                                        class="status-checkbox" checked="">
                                                                    <span class="switch-state"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>17-12-2024</td>
                                                        <td>84%</td>
                                                        <td>
                                                            <ul>
                                                                <li>
                                                                    <a
                                                                        href="http://localhost/supermarkethub/admin/edit-brand/1">
                                                                        <i class="ri-pencil-line"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a onclick="confirmDelete('http://localhost/supermarkethub/admin/delete-brand/1')"
                                                                        href="#">
                                                                        <i class="ri-delete-bin-line"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" id="data-table-list_info" role="status"
                                                aria-live="polite">Showing 1 to 1 of 1 entries</div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers"
                                                id="data-table-list_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled"
                                                        id="data-table-list_previous"><a href="#"
                                                            aria-controls="data-table-list" data-dt-idx="0"
                                                            tabindex="0" class="page-link">Previous</a></li>
                                                    <li class="paginate_button page-item active"><a href="#"
                                                            aria-controls="data-table-list" data-dt-idx="1"
                                                            tabindex="0" class="page-link">1</a></li>
                                                    <li class="paginate_button page-item next disabled"
                                                        id="data-table-list_next"><a href="#"
                                                            aria-controls="data-table-list" data-dt-idx="2"
                                                            tabindex="0" class="page-link">Next</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination End -->
                </div>
            </div>
        </div>
    </div>
@endsection
