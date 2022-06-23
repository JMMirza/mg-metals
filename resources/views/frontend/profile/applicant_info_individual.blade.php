<div class="card card-default form-card">
    <div class="card-header">
        {{ __('individual.SECTION 1') }} <span>{{ __('individual.APPLICANT INFORMATION (INDIVIDUAL)') }}
        </span>
    </div>
    <div class="card-body">
        <form class="row g-3 needs-validation" action="{{ route('customer-profile-data.update', $customer->id) }}"
            method="POST" novalidate>
            @csrf
            @method('PUT')
            {{-- <input type="text" name="user_id" value="{{ $customer->id }}" hidden> --}}
            <input type="text" name="form_info" value="individual" hidden>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control @if ($errors->has('full_name')) is-invalid @endif"
                        id="full_name" name="full_name" placeholder="{{ __('individual.FULL NAME OF INDIVIDUAL') }}"
                        value="{{ $customer->full_name }}" required>

                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group ht-70">
                    <label class="radio-inline mr-3">
                        <input type="radio" name="gender" value="male"
                            @if ($customer->gender == 'male') checked @endif>
                        <span></span>{{ __('individual.MALE') }}
                    </label>
                    <label class="radio-inline mr-3">
                        <input type="radio" name="gender" value="female"
                            @if ($customer->gender == 'female') checked @endif>
                        <span></span>{{ __('individual.FEMALE') }}
                    </label>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <input type="email @if ($errors->has('email')) is-invalid @endif" id="email"
                        value="{{ \Auth::user()->email }}" name="email" class="form-control"
                        placeholder="{{ __('individual.Email') }}" disabled>

                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control @if ($errors->has('occupation')) is-invalid @endif"
                        name="occupation" id="occupation" value="{{ $customer->occupation }}"
                        placeholder="{{ __('individual.Occupation &amp; Business Background') }}" required>

                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control @if ($errors->has('passport_no')) is-invalid @endif"
                        id="passport_no" name="passport_no" value="{{ $customer->passport_no }}"
                        placeholder="{{ __('individual.HKID No. / Passport No.') }}" required>

                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <input type="text" id="phone_number" name="phone_number" value="{{ $customer->phone_number }}"
                        class="form-control @if ($errors->has('phone_number')) is-invalid @endif"
                        placeholder="{{ __('individual.PHONE NUMBER') }}" required>

                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <select class="form-select" name="nationality" required>
                        <option value="" @if ($customer->nationality == '') {{ 'selected' }} @endif disabled>
                            {{ __('individual.Nationality') }}
                        </option>
                        <option value="pakistan" @if ($customer->nationality == 'pakistan') {{ 'selected' }} @endif>
                            Pakistan
                        </option>
                        <option value="china" @if ($customer->nationality == 'china') {{ 'selected' }} @endif>
                            China
                        </option>
                        <option value="other" @if ($customer->nationality == 'other') {{ 'selected' }} @endif>
                            Other
                        </option>
                    </select>

                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="form-group">
                    <textarea id="address" name="address" class="form-control  @if ($errors->has('address')) is-invalid @endif"
                        placeholder="{{ __('individual.ADDRESS') }}">{{ $customer->address }}</textarea>

                </div>
            </div>
            @if (\Auth::user()->customer_type == 'corporate')
                <div class="footer">
                    <button class="btn btn-custom" disabled="true">Previous</button>
                    <div class="ml-auto">
                        <button class="btn btn-default" type="reset">Cancel</button>
                        <button class="btn btn-custom" type="submit" id="next">Next</button>
                    </div>
                </div>
            @else
                {{-- <button class="btn btn-default" type="reset"></button> --}}
                <div class="footer text-end" style="display: block;">
                    <button class="btn btn-default" type="reset">Cancel</button>
                    <button class="btn btn-custom" type="submit" id="next">Save</button>
                </div>
            @endif
        </form>
    </div>
</div>
