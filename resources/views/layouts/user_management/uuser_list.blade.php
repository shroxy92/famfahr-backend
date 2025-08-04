@extends('layouts.master')

@section('title','User List')

@section('content')
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="container mt-5">
                <div class="card shadow-sm">
                    <div class="card-header text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0" style="color: #375555 !important;font-weight: bold;"><i class="fas fa-users me-2"></i>User List</h4>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search user..." aria-label="Search">
                            <button class="btn btn-light" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover align-middle">
                            <thead class="table-dark">
                            <tr>
                                <th>Username</th>
                                <th>Employee Name</th>
                                <th>Department</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($userList as $user)
                                <tr>
                                    <td>{{ $user['username'] }}</td>
                                    <td>{{ $user['name'] }}</td>
                                    <td>{{ $user['dept'] }}</td>
                                    <td>{{ $user['role'] }}</td>
                                    <td>
                                <span class="badge {{ $user['status'] === 'Active' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $user['status'] }}
                                </span>
                                    </td>
                                    <td>
{{--                                        <a href="{{ route('users.edit', ['id' => 1]) }}" class="btn btn-sm btn-outline-primary">--}}
{{--                                            <i class="fas fa-pen"></i> Edit--}}
                                        <a href="{{url('user_edit')}}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-pen"></i> Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>

@endsection
