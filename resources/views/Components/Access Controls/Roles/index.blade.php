@extends('layouts.app')
@section('content')
    <div class="row">

        <div class="container col-7">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ردیف</th>
                    <th>نقش</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a class="btn btn-primary" href="/roles/{!! $role->id !!}/edit">ویرایش</a>
                            <a class="btn btn-danger" href="/roles/{!! $role->id !!}">حذف</a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection