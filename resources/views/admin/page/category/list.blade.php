
@extends('admin.layouts.master')

@section('title')
Danh sach danh muc san pham
@endsection

@section('content')
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Category</h6>
</div>
<div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>Stt</th>
            <th>name</th>
            <th>slug</th>
            <th>status</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($category as $key =>$value)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->slug}}</td>
                    <td>
                        @if($value->status == 1)
                            {{"show"}}
                        @else 
                            {{"hidden"}}
                        @endif
                    </td>
                    <td>
                    <button class="btn btn-primary edit"  data-toggle="modal" data-id="{{$value->id}}" data-target="#edit" title=" edit {{ $value->name}}" type="button"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-danger delete" data-id="{{$value->id}}"  data-toggle="modal" data-target="#delete" title=" delete {{ $value->name}}"  type="button"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<div class="pull-right">{{$category->links()}}</div>
    </div>
</div>
    <!-- Edit Modal-->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin: 5px">
                        <div class="col-lg-12">
                            <form role="form">
                                <fieldset class="form-group">
                                    <label>name</label>
                                    <input class="form-control name" name="name" placeholder="Enter text">
                                    <span class="error" style="color:red;font-size:1rem;"></span>
                                </fieldset>
                                {{-- <fieldset class="form-group">
                                    <label>slug</label>
                                    <textarea class="form-control" rows="3"></textarea>
                                </fieldset> --}}
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control status" name="status">
                                        <option value="1" class="ht">show</option>
                                        <option value="0" class="kht">hidden</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success update">Save</button>
                    {{-- <button type="reset" class="btn btn-primary">Làm Lại</button> --}}
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
                    <button type="button" class="btn btn-success del">Có</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                <div>
            </div>
        </div>
    </div>
@endsection
