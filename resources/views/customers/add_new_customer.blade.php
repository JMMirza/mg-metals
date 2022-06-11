@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Add Course</h4>
                </div>

                <div class="card-body">
                    <form class="row g-3 needs-validation" action="{{ route('course.store') }}" method="POST"
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <input type="text" class="form-control @if ($errors->has('name')) is-invalid @endif"
                                    id="name" name="name" placeholder="Name" value="{{ old('name') }}" required>
                                <label for="name" class="form-label">Name</label>
                                <div class="invalid-tooltip">
                                    @if ($errors->has('name'))
                                        {{ $errors->first('name') }}
                                    @else
                                        Name is required!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <input type="text" class="form-control @if ($errors->has('abbreviation')) is-invalid @endif"
                                    id="abbreviation" name="abbreviation" placeholder="Please Enter abbreviation"
                                    value="{{ old('abbreviation') }}">
                                <label for="abbreviation" class="form-label">Abbreviation</label>
                                <div class="invalid-tooltip">
                                    @if ($errors->has('abbreviation'))
                                        {{ $errors->first('abbreviation') }}
                                    @else
                                        Abbreviation is required!
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-label-group in-border">
                                <select class="form-select mb-3" name="status_id" required>
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}"
                                            @if (old('status_id') == $status->id) {{ 'selected' }} @endif>
                                            {{ $status->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="statusID" class="form-label">Status</label>
                                <div class="invalid-tooltip">Select the status!</div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div id="snow-editor" style="height: 300px;"></div>
                        </div>
                        <div class="col-12 text-end">
                            <input type="hidden" name="description" id="description">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                            <a href="{{ route('course.index') }}" type="button"
                                class="btn btn-light bg-gradient waves-effect waves-light">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
