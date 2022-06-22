@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Add Customers</h4>
                </div>

                <div class="card-body">
                    <form class="row g-3 needs-validation" action="{{ route('customers.store') }}" method="POST" novalidate>
                        @csrf
                        <div class="col-md-6 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="full_name" class="form-label">Full Name</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('full_name')) is-invalid @endif" id="full_name"
                                    name="full_name" placeholder="Full name" value="{{ old('full_name') }}" required>
                                <div class="invalid-tooltip">
                                    @if ($errors->has('full_name'))
                                        {{ $errors->first('full_name') }}
                                    @else
                                        Full Name is required!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-label-group in-border">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select mb-3" name="gender" required>
                                    <option value="" @if (old('gender') == '') {{ 'selected' }} @endif
                                        selected disabled>
                                        Select One
                                    </option>
                                    <option value="male" @if (old('gender') == 'male') {{ 'selected' }} @endif>
                                        Male
                                    </option>
                                    <option value="female" @if (old('gender') == 'female') {{ 'selected' }} @endif>
                                        Female
                                    </option>
                                    <option value="other" @if (old('gender') == 'other') {{ 'selected' }} @endif>
                                        Other
                                    </option>
                                </select>
                                <div class="invalid-tooltip">Select the gender!</div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-label-group in-border">
                                <label for="user_id" class="form-label">Users</label>
                                <select class="form-select mb-3" name="user_id" required>
                                    <option value="" @if (old('user_id') == '') {{ 'selected' }} @endif
                                        selected disabled>
                                        Select One
                                    </option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            @if (old('user_id') == $user->id) {{ 'selected' }} @endif>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-tooltip">Select the User!</div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('phone_number')) is-invalid @endif"
                                    id="phone_number" name="phone_number" placeholder="Please Enter Phone number"
                                    value="{{ old('phone_number') }}" required>
                                <div class="invalid-tooltip">
                                    @if ($errors->has('phone_number'))
                                        {{ $errors->first('phone_number') }}
                                    @else
                                        Phone Number is required!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-label-group in-border">
                                <label for="nationality" class="form-label">Nationality</label>
                                <select class="form-select mb-3" name="nationality" required>
                                    <option value="" @if (old('nationality') == '') {{ 'selected' }} @endif
                                        selected disabled>
                                        Select One
                                    </option>
                                    <option value="pakistan" @if (old('nationality') == 'pakistan') {{ 'selected' }} @endif>
                                        Pakistan
                                    </option>
                                    <option value="china" @if (old('nationality') == 'china') {{ 'selected' }} @endif>
                                        China
                                    </option>
                                    <option value="other" @if (old('nationality') == 'other') {{ 'selected' }} @endif>
                                        Other
                                    </option>
                                </select>
                                <div class="invalid-tooltip">Select the nationality!</div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="passport_no" class="form-label">Passport Number</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('passport_no')) is-invalid @endif"
                                    id="passport_no" name="passport_no" placeholder="Please Enter Passport number"
                                    value="{{ old('passport_no') }}" required>
                                <div class="invalid-tooltip">
                                    @if ($errors->has('passport_no'))
                                        {{ $errors->first('passport_no') }}
                                    @else
                                        Passport Number is required!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="bank_account_name" class="form-label">Bank Account Name</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('bank_account_name')) is-invalid @endif"
                                    id="bank_account_name" name="bank_account_name" placeholder="Please Enter Account Name"
                                    value="{{ old('bank_account_name') }}" required>
                                <div class="invalid-tooltip">
                                    @if ($errors->has('passport_no'))
                                        {{ $errors->first('bank_account_name') }}
                                    @else
                                        Bank Account Name is required!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="bank_account_number" class="form-label">Bank Account Number</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('bank_account_number')) is-invalid @endif"
                                    id="bank_account_number" name="bank_account_number"
                                    placeholder="Please Enter Bank Account Number"
                                    value="{{ old('bank_account_number') }}">
                                <div class="invalid-tooltip">
                                    {{ $errors->first('bank_account_number') }}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="bank_name" class="form-label">Bank Name</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('bank_name')) is-invalid @endif"
                                    id="bank_name" name="bank_name" placeholder="Please Enter Bank Name"
                                    value="{{ old('bank_name') }}">
                                <div class="invalid-tooltip">
                                    {{ $errors->first('bank_name') }}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="bank_branch_number" class="form-label">Bank Branch Number</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('bank_branch_number')) is-invalid @endif"
                                    id="bank_branch_number" name="bank_branch_number"
                                    placeholder="Please Enter Bank Branch Number"
                                    value="{{ old('bank_branch_number') }}">
                                <div class="invalid-tooltip">
                                    {{ $errors->first('bank_branch_number') }}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="bank_country_name" class="form-label">Bank Country Name</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('bank_country_name')) is-invalid @endif"
                                    id="bank_country_name" name="bank_country_name"
                                    placeholder="Please Enter Bank Branch Number"
                                    value="{{ old('bank_country_name') }}">
                                <div class="invalid-tooltip">
                                    {{ $errors->first('bank_country_name') }}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="bank_swift_code" class="form-label">Bank Swift Code</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('bank_swift_code')) is-invalid @endif"
                                    id="bank_swift_code" name="bank_swift_code"
                                    placeholder="Please Enter Bank Swift Code" value="{{ old('bank_swift_code') }}">
                                <div class="invalid-tooltip">
                                    {{ $errors->first('bank_swift_code') }}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="sales_rep_name" class="form-label">Sales Rep Name</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('sales_rep_name')) is-invalid @endif"
                                    id="sales_rep_name" name="sales_rep_name" placeholder="Please Enter Sales Rep Name"
                                    value="{{ old('sales_rep_name') }}">
                                <div class="invalid-tooltip">
                                    {{ $errors->first('sales_rep_name') }}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="sales_rep_number" class="form-label">Sales Rep Number</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('sales_rep_number')) is-invalid @endif"
                                    id="sales_rep_number" name="sales_rep_number"
                                    placeholder="Please Enter Sales Rep Number" value="{{ old('sales_rep_number') }}">
                                <div class="invalid-tooltip">
                                    {{ $errors->first('sales_rep_number') }}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="sales_rep_country" class="form-label">Sales Rep Country</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('sales_rep_country')) is-invalid @endif"
                                    id="sales_rep_country" name="sales_rep_country"
                                    placeholder="Please Enter Sales Rep Country"
                                    value="{{ old('sales_rep_country') }}">
                                <div class="invalid-tooltip">
                                    {{ $errors->first('sales_rep_country') }}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="storage_service" class="form-label">Storage Service</label>
                                <select class="form-select mb-3" name="storage_service" required>
                                    <option value="" @if (old('storage_service') == '') {{ 'selected' }} @endif
                                        selected disabled>
                                        Select One
                                    </option>
                                    <option value='true' @if (old('storage_service') == 'true') {{ 'selected' }} @endif>
                                        Yes
                                    </option>
                                    <option value='false' @if (old('storage_service') == 'false') {{ 'selected' }} @endif>
                                        No
                                    </option>
                                </select>
                                <div class="invalid-tooltip">Select the storage service!</div>
                            </div>
                        </div>

                        <div class="col-12 text-end">
                            <button class="btn btn-primary" type="submit">Save Changes</button>
                            <a href="{{ route('customers.index') }}" type="button"
                                class="btn btn-light bg-gradient waves-effect waves-light">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
