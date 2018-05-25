@extends('layouts.app')

@section('content')
<div class="panel">
    <div class="panel-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Value</th>
                    <th>Last Update</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach($val as $v)
                <tr>
                    <td>{{ $v->code }}</td>
                    <td>{{ $v->value }}</td>
                    <td>{{ $v->updated_at }}</td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{ $v->code }}">Edit</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@foreach($val as $v)

    <div id="edit{{ $v->code }}" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Edit Informasi {{ $v->code }}</h5>
                </div>
                <form method="post" action="/admin/editinformasi/{{$v->id}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label>Value</label>
                        <input type="hidden" name="id" value="{{ $v->id }}">
                        @if($v->code=='video')
                        <input type="file" name="value" value="{{ $v->value }}">
                        @else
                        <textarea name="value" class="form-control">{{ $v->value }}</textarea>

                        @endif
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
@endsection
