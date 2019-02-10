@extends('layouts.app')
@section('content')
    <div class="row">

        <div class="container col-7">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>دسرسی</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($permissions as $permission)
                <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>
                            <a class="btn btn-warning" href="/permission/{!! $permission->id !!}/edit">ویرایش</a>
                            <a class="btn btn-danger" href="/permission/{!! $permission->id !!}">حذف</a>
                        </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection