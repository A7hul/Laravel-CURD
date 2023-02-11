@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Employees</div>
                    <div class="card-body">
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Willing to work</th>
                                    <th scope="col">Languages Known</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->willing_to_work ? 'Yes' : 'No' }}</td>
                                        <td>
                                              @foreach (explode(',',$employee->languages_known) as $language)
                                                  {{ App\Models\Language::where('id',$language)->pluck('language_name')->first(); }},
                                              @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('employees.edit', $employee->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            <form action="{{ route('employees.destroy', $employee->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('employees.create') }}" class="btn btn-primary">Add Employee</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
