@extends('layouts.app')

@section('content')
<div class="panel">
    <div class="panel-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>User</th>
                </tr>
            </thead>
            <tbody>
                @foreach($val as $v)
                <tr>
                    <td>{{ $v->name }}</td>
                    <td>{{ $v->description }}</td>
                    <td>{{ $v->category_id }}</td>
                    <td>{{ $v->type_id }}</td>
                    <td>{{ $v->user_id }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
