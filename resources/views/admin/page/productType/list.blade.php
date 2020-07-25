@extends('admin.layouts.master')

@section('title')
Danh sach loai san pham
@endsection

@section('content')
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">ProductType</h6>
</div>
<div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>Stt</th>
            <th>name</th>
            <th>slug</th>
            <th>category</th>
            <th>status</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($producttype as $key =>$value)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->slug}}</td>
                    <td>{{$value->Category->name}}</td>
                    <td>
                        @if($value->status == 1)
                            {{"show"}}
                        @else 
                            {{"hidden"}}
                        @endif
                    </td>
                    <td>
                    <button class="btn btn-primary editProducttype"  data-toggle="modal" data-id="{{$value->id}}" data-target="#edit" title=" edit {{ $value->name}}" type="button"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-danger deleteProducttype" data-id="{{$value->id}}"  data-toggle="modal" data-target="#delete" title=" delete {{ $value->name}}"  type="button"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<div class="pull-right">{{$producttype->links()}}</div>
    </div>
</div>
    <!-- Edit Modal-->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit ProductType</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin: 5px">
                        <div class="col-lg-12">
                            <form class="form-horizontal" action="" method="post">
                                {{-- @csrf --}}
                              <div class="form-group">
                                <label class="control-label col-sm-5" for="name" >name</label>
                                <div class="col-sm-12">
                                  <input type="text" class="form-control name" id="name" placeholder="" name="name">
                                  {{-- <div class="alert alert-danger error"></div> --}}
                                </div>
                              </div>
                              {{-- <div class="form-group">
                                <label class="control-label col-sm-2" for="pwd">Password:</label>
                                <div class="col-sm-10">          
                                  <textarea type="text" class="form-control" id="pwd" placeholder="Enter password" name="pwd"></textarea>
                                </div>
                              </div> --}}
                              <div class="form-group">
                                <div class="col-sm-12">
                                <label class="control-label col-sm-5" for="idCategory">IDCategory</label>
                                <select class="form-control idCategory" name="idCategory"></select>
                                </div>
                              </div>
                        
                              <div class="form-group">
                                <div class="col-sm-12">
                                <label class="control-label col-sm-5" for="status">Status</label>
                                <select class="form-control" name="status">
                                  <option value="1" class="ht">show</option>
                                  <option value="0" class="kht">hidden</option>
                                </select>
                                </div>
                              </div>
                              {{-- <div class="form-group">        
                                <div class="col-sm-offset-2 col-sm-10">
                                  <button type="submit" class="btn btn-primary">Create</button>
                                  <button type="reset" class="btn btn-caution">Reset</button>
                                </div>
                              </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success updateProductType">Save</button>
                    <button type="reset" class="btn btn-primary">Reset</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- delete Modal-->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="margin-left: 183px;">
                    <button type="button" class="btn btn-success deletePro">Có</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                <div>
            </div>
        </div>
    </div>
@endsection
