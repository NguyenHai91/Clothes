
@extends('admin.master')
@section('content')

@include('admin.logs.error')
<!-- /.col-lg-12 -->
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Preview</th>
            <th>Cate_id</th>
            <th>Brand</th>
            <th>Image</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=0; ?>
        @foreach($products as $item)
        <?php $i++; ?>
        <tr class="odd gradeX" align="center">
            <td>{{$item['id']}}</td>
            <td>{{$item['name']}}</td>
            <td>{{$item['price']}} VNĐ</td>
            <td>{{$item['preview']}}</td>
            <td>{{$item['category_id']}}</td>
            <td>{{$item['brand']}}</td>
            <td>{{$item['image']}}</td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/product/delete/{{$item['id']}}"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/edit/{{$item['id']}}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection()