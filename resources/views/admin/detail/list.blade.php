
@extends('admin.master')
@section('content')

@include('admin.logs.error')
<!-- /.col-lg-12 -->
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>Id</th>
            <th>Product_id</th>
            <th>Size_id</th>
            <th>Color_id</th>
            <th>Quantity</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=0; ?>
        @foreach($listDetail as $item)
        <?php $i++; ?>
        <tr class="odd gradeX" align="center">
            <td>{{$item['id']}}</td>
            <td>{{$item['product_id']}}</td>
            <td>{{$item['size_id']}}</td>
            <td>{{$item['color_id']}}</td>
            <td>{{$item['quantity']}}</td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/product/delete/{{$item['id']}}"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/edit/{{$item['id']}}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection()