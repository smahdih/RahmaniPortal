@extends('layouts.app')


@section('content')

    <div class='container'>
        <h2>ایجاد یک نقش</h2>
        <form action="{!! route('roles.store') !!}" method="post">
            <div class="form-group row">
                <label for="roleName">نوع نقش</label>
                <input type="text" id="roleName" name="roleName" class="form-control">
            </div>
            <div class="custom-control custom-checkbox">
                <h4>انتخاب دسترسی</h4>
                @foreach( $permissions as $permission)
                    <label for="permission{{ $permission->id }}" class="custom-control-label">{{ $permission->name }}</label>
                    <input class="custom-control-input" type="checkbox" id="permission{{ $permission->id }}" name="permissions">
                @endforeach
            </div>
            <button type="submit" class="btn btn-success">ذخیره</button>
        </form>


    </div>

@endsection