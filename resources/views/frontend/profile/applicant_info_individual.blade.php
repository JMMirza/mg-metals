@if (isset($customer))
    <div class="card card-default form-card">
        <div class="card-header">
            SECTION 1 (第1項) <span>APPLICANT INFORMATION (INDIVIDUAL) (申請人資料 (個人客戶))</span>
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
                            id="full_name" name="full_name" placeholder="FULL NAME OF INDIVIDUAL (個人全名)"
                            value="{{ $customer->full_name }}" required>

                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group ht-70">
                        <label class="radio-inline mr-3">
                            <input type="radio" name="gender" value="male"
                                @if ($customer->gender == 'male') checked @endif>
                            <span></span>MALE (男性)
                        </label>
                        <label class="radio-inline mr-3">
                            <input type="radio" name="gender" value="female"
                                @if ($customer->gender == 'female') checked @endif>
                            <span></span>FEMALE (女性)
                        </label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="email @if ($errors->has('email')) is-invalid @endif" id="email"
                            value="{{ $customer->email }}" name="email" class="form-control"
                            placeholder="Email (電郵)" disabled>

                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control @if ($errors->has('occupation')) is-invalid @endif"
                            name="occupation" id="occupation" value="{{ $customer->occupation }}"
                            placeholder="Occupation &amp; Business Background (職業及業務背景)" required>

                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control @if ($errors->has('passport_no')) is-invalid @endif"
                            id="passport_no" name="passport_no" value="{{ $customer->passport_no }}"
                            placeholder="HKID No. / Passport No. (香港身份證號碼 / 護照號碼)" required>

                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="text" id="phone_number" name="phone_number"
                            value="{{ $customer->phone_number }}"
                            class="form-control @if ($errors->has('phone_number')) is-invalid @endif"
                            placeholder="PHONE NUMBER  (電話)" required>

                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <select class="form-select" name="nationality" required>
                            <option value="" @if ($customer->nationality == '') {{ 'selected' }} @endif
                                disabled>
                                Nationality (國籍)
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
                            placeholder="ADDRESS (地址)">{{ $customer->address }}</textarea>

                    </div>
                </div>

                <div class="footer">
                    <button class="btn btn-custom" disabled="true">Previous</button>
                    <div class="ml-auto">
                        <button class="btn btn-default" type="reset">Cancel</button>
                        <button class="btn btn-custom" type="submit" id="next">Next</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@else
    <div class="card card-default form-card">
        <div class="card-header">
            SECTION 1 (第1項) <span>APPLICANT INFORMATION (INDIVIDUAL) (申請人資料 (個人客戶))</span>
        </div>
        <div class="card-body">
            <form class="row g-3 needs-validation" action="{{ route('customer-profile-data.store') }}" method="POST"
                novalidate>
                @csrf
                <input type="text" name="user_id" value="{{ \Auth::user()->id }}" hidden>
                <input type="text" name="form_info" value="individual" hidden>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control @if ($errors->has('full_name')) is-invalid @endif"
                            id="full_name" name="full_name" placeholder="FULL NAME OF INDIVIDUAL (個人全名)"
                            value="{{ old('full_name') }}" required>

                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group ht-70">
                        <label class="radio-inline mr-3">
                            <input type="radio" name="gender" value="male"
                                @if (old('gender') == 'male') checked @endif>
                            <span></span>MALE (男性)
                        </label>
                        <label class="radio-inline mr-3">
                            <input type="radio" name="gender" value="female"
                                @if (old('gender') == 'female') checked @endif>
                            <span></span>FEMALE (女性)
                        </label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="email @if ($errors->has('email')) is-invalid @endif" id="email"
                            value="{{ \Auth::user()->email }}" name="email" class="form-control"
                            placeholder="Email (電郵)" disabled>

                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="text"
                            class="form-control @if ($errors->has('occupation')) is-invalid @endif"
                            name="occupation" id="occupation" value="{{ old('occupation') }}"
                            placeholder="Occupation &amp; Business Background (職業及業務背景)" required>

                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="text"
                            class="form-control @if ($errors->has('passport_no')) is-invalid @endif"
                            id="passport_no" name="passport_no" value="{{ old('passport_no') }}"
                            placeholder="HKID No. / Passport No. (香港身份證號碼 / 護照號碼)" required>

                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="text" id="phone_number" name="phone_number"
                            value="{{ old('phone_number') }}"
                            class="form-control @if ($errors->has('phone_number')) is-invalid @endif"
                            placeholder="PHONE NUMBER  (電話)" required>

                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <select class="form-select" name="nationality" required>
                            <option value="" @if (old('nationality') == '') {{ 'selected' }} @endif
                                disabled>
                                Nationality (國籍)
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

                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        <textarea id="address" name="address" class="form-control  @if ($errors->has('address')) is-invalid @endif"
                            placeholder="ADDRESS (地址)">{{ old('address') }}</textarea>

                    </div>
                </div>

                <div class="footer">
                    <button class="btn btn-custom" disabled="true">Previous</button>
                    <div class="ml-auto">
                        <button class="btn btn-default">Cancel</button>
                        <button class="btn btn-custom" type="submit" id="next">Next</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endif
