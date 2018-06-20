@extends('admin.master')
@section('content')
<!-- /.col-lg-12 -->
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>Index</th>
            <th>Username</th>
            <th>Pass</th>
            <th>Email</th>
            <th>Level</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=0;?>
        @foreach($users as $us)
        <?php $i++; ?>
        <tr class="odd gradeX" align="center">
            <td>{{$i}}</td>
            <td>{{$us['name']}}</td>
            <td>{{$us['password']}}</td>
            <td>{{$us['email']}}</td>
            <td>{{$us['level']}}</td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/delete/{{$us['id']}}"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/edit/{{$us['id']}}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection