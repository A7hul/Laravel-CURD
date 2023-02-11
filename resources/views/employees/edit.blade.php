@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Employee</div>
                    <div class="card-body">
                        <form action="{{ route('employees.update', $employee->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="first_name">First Name:</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    value="{{ $employee->first_name }}">
                                @if($errors->has('first_name'))
                                    <div class="text-danger">{{ $errors->first('first_name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    value="{{ $employee->last_name }}">
                                @if($errors->has('last_name'))
                                    <div class="text-danger">{{ $errors->first('last_name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="willing_to_work">Willing to work:</label>
                                <input type="checkbox" class="form-control" id="willing_to_work" name="willing_to_work"
                                    {{ $employee->willing_to_work ? 'checked' : '' }} value=1>
                                @if($errors->has('willing_to_work'))
                                    <div class="text-danger">{{ $errors->first('willing_to_work') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                @php $languages_known= explode(',',$employee->languages_known); @endphp
                                <label for="languages">Languages Known:</label>
                                @foreach ($languages as $language)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="language_{{ $language->id }}"
                                            name="languages[]" value="{{ $language->id }}"
                                            {{ in_array($language->id,$languages_known) ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="language_{{ $language->id }}">{{ $language->language_name }}</label>
                                    </div>
                                @endforeach
                                @if($errors->has('languages'))
                                    <div class="text-danger">{{ $errors->first('languages') }}</div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
