
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
                            {{hidden}}
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-primary edit" title=" edit {{ $value->name}}"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-danger delete" title=" delete {{ $value->name}}"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
</div>

</div>
@endsection
