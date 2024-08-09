@extends('layout.index')
@section('title')
Nhân viên
@endsection
@section('body')
<div class="container" style="min-height: 90vh;">
    <div class="row py-3">
        <div class="col-md-12">
            <h2>
                Nhân viên
            </h2>
            @if (!$users)
            <div class="alert alert-primary" role="alert">
                Chưa có nhân viên
            </div>
            @else
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->email}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection