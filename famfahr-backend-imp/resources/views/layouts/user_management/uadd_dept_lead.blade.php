@extends('layouts.master')

@section('title', 'Application Details')

@section('content')
    <div class = "row">
        <div class = "col-1"></div>
        <div class = "col-10">
            <div class="container mt-5">
                <div class="card shadow-sm">
                    <div class="card-header text-white d-flex align-items-center" style="color: #375555 !important;font-weight: bold;">
                        <h4 class="mb-0"><i class="fas fa-user-tie me-2"></i>Add Department Lead</h4>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{route('hr.lead.assigned')}}" method="post">
                            @csrf
                            <!-- Employee Select -->
                            <div class="mb-4">
                                <label for="employee" class="form-label">Select Employee</label>
                                <select class="form-select" id="employee" name="employee_id" required>
                                    <option selected disabled>-- Choose an employee --</option>
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->id }}">
                                            {{ $employee->first_name.' '.$employee->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Role Select -->
                            <div class="mb-4">
                                <label for="role" class="form-label">Assign Department</label>
                                <select class="form-select" id="role" name="department_id" required>
                                    <option selected disabled>-- Select Department --</option>
                                    @foreach($department as $dep)
                                        <option value="{{ $dep->id }}">{{ ucfirst($dep->name) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-check-circle me-1"></i> Assign Lead
                                </button>
                            </div>
                        </form>
{{--                        start--}}
                        @if($leads->count())
                            <div class="card mt-4">
                                <div class="card-header" style="background-color: #f0f0f0;">
                                    <h5 class="mb-0">Current Department Leads</h5>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Employee Name</th>
                                            <th>Department</th>
                                            <th>Assigned At</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($leads as $index => $lead)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $lead->employee->first_name }} {{ $lead->employee->last_name }}</td>
                                                <td>{{ $lead->department->name ?? '—' }}</td>
                                                <td>{{ $lead->created_at->format('d M Y') }}</td>
                                                <td class="text-end">
                                                    <form action="{{ route('hr.lead.destroy', $lead->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to remove this lead?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger" type="submit">
                                                            <i class="fas fa-trash-alt"></i> Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif

                        {{--                        End --}}
                    </div>
                </div>
            </div>
        </div>
        <div class = "col-1"></div>
    </div>

@endsection
