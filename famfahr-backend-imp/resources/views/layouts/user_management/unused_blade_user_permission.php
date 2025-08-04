@extends('layouts.master')

@section('title', 'Manage User Permissions')

@section('content')
<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        <div class="container mt-5">
            <div class="card permission-card">
                <div class="card-header text-white" style="background-color: #375555; font-weight: bold;">
                    <h4><i class="fas fa-user-shield me-2"></i> Manage User Permissions</h4>
                </div>

                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('user.permissions.update') }}">
                        @csrf
                        <!-- User Select -->
                        <div class="mb-4">
                            <label for="user_id" class="form-label">Select User</label>
                            <select class="form-select" id="user_id" name="user_id" required>
                                <option selected disabled>-- Choose a user --</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->role->name ?? 'No Role' }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            @foreach($permissionGroups as $group => $groupPermissions)
                            <div class="col-md-4 mb-4">
                                <div class="permission-section-title">{{ ucfirst(str_replace('_', ' ', $group)) }}</div>
                                @foreach($groupPermissions as $permission)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="{{ $permission->name }}">
                                    <label class="form-check-label" for="{{ $permission->name }}">
                                        {{ ucwords(str_replace('_', ' ', $permission->name)) }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success mt-3">
                                <i class="fas fa-save me-1"></i> Save Permissions
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-1"></div>
</div>
@endsection
