@extends('admin.master')
@section('content')

<!-- Page Content -->

<!-- /.col-lg-12 -->
<div class="col-lg-12" style="padding-bottom:120px">

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>Index</th>
                <th>Name</th>
                <th>Category Parent</th>
                <th>Gender</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php $index=0; ?>
            @foreach($data as $item)
            <?php $index++; ?>
            <tr class="odd gradeX" align="center">
                <td>{{$index}}</td>
                <td>{{$item->name}}</td>
                <td>
                    @if($item->parent_id == 0)
                    {{'none'}}
                    @else
                    <?php $parent = DB::table('category')->where('id','=',$item['parent_id'])->first();
                    echo $parent->name;
                    ?>
                    @endif
                </td>
                <td>{{$item->gender}}</td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/category/delete/{{$item->id}}"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/category/edit/{{$item->id}}">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection()