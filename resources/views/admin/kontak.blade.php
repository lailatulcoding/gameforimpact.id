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
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{ $v->id }}">Edit</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@foreach($val as $v)

    <div id="edit{{ $v->id }}" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Edit {{ $v->code }}</h5>
                </div>
                <form method="post" action="/admin/editkontak/{{$v->id}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label>Value</label>
                        <input type="hidden" name="id" value="{{ $v->id }}">
                        <input type="text" class="form-control"name="value" value="{{ $v->value }}">
                    </div>
                    <div class="form-group">
                        Show <input type="checkbox" @if($v->shown == 1) checked @endif onchange="edit_show(this,{{ $v->id }})">
                        <input type="hidden" name="shown" value="{{ $v->shown }}" id="show{{ $v->id }}">
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
    <script>
        function edit_show(cek,id){
            if(cek.checked)
                document.getElementById('show'+id).value = 1
            else
                document.getElementById('show'+id).value = 0
        }
    </script>
@endforeach
@endsection
