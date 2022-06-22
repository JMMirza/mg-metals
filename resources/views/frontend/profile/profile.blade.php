@extends('frontend.layouts.master')


@section('content')
    @include('frontend.profile.header')


    <div class="main-content">
        <div class="page-content">
            <div class="container-fuild center-aligned">
                <div class="row">

                    <div class="col-md-12">

                        <ul class="nav nav-tabs tpl-tabs animate" role="tablist">

                            <li class="nav-item">
                                <a href="#item-1" aria-controls="item-1" class="nav-link active" data-bs-toggle="tab"
                                    role="tab" aria-selected="true">APPLICANT INFORMATION (INDIVIDUAL)
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#item-2" aria-controls="item-2" class="nav-link" data-bs-toggle="tab"
                                    role="tab" aria-selected="false">APPLICANT INFORMATION (CORPORATE)
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#item-3" aria-controls="item-3" class="nav-link" data-bs-toggle="tab"
                                    role="tab" aria-selected="false">SHAREHOLDER/DIRECTOR INFORMATION </a>
                            </li>

                            <li class="nav-item">
                                <a href="#item-4" aria-controls="item-4" class="nav-link" data-bs-toggle="tab"
                                    role="tab" aria-selected="false">AUTHORIZED TRADING REPRESENTATIVE </a>
                            </li>

                            <li class="nav-item">
                                <a href="#item-5" aria-controls="item-5" class="nav-link" data-bs-toggle="tab"
                                    role="tab" aria-selected="false">OTHER INFORMATION </a>
                            </li>

                            <li class="nav-item">
                                <a href="#item-6" aria-controls="item-6" class="nav-link" data-bs-toggle="tab"
                                    role="tab" aria-selected="false">BANK ACCOUNT FOR RECEIVING PAYMENTS </a>
                            </li>

                        </ul>
                        <div class="tab-content tpl-tabs-cont section-text">

                            <div class="tab-pane fade active show" id="item-1" role="tabpanel">

                                <div class="card card-default form-card">
                                    <div class="card-header">
                                        SECTION 1 (第1項) <span>APPLICANT INFORMATION (INDIVIDUAL) (申請人資料 (個人客戶))</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text"
                                                        class="form-control @if ($errors->has('full_name')) is-invalid @endif"
                                                        id="full_name" name="full_name"
                                                        placeholder="FULL NAME OF INDIVIDUAL (個人全名)"
                                                        value="{{ old('full_name') }}" required>
                                                    <div class="invalid-tooltip">
                                                        @if ($errors->has('full_name'))
                                                            {{ $errors->first('full_name') }}
                                                        @else
                                                            Full Name is required!
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <select class="form-control" placeholder="Select Language">
                                                        <option value=""
                                                            @if (old('percentage') == '') {{ 'selected' }} @endif
                                                            selected disabled>
                                                            Select One
                                                        </option>
                                                        <option value="5"
                                                            @if (old('percentage') == '5') {{ 'selected' }} @endif>
                                                            5%
                                                        </option>
                                                        <option value="10"
                                                            @if (old('percentage') == '10') {{ 'selected' }} @endif>
                                                            10%
                                                        </option>
                                                        <option value="15"
                                                            @if (old('percentage') == '15') {{ 'selected' }} @endif>
                                                            15%
                                                        </option>
                                                    </select>
                                                </div>
                                            </div> --}}
                                            <div class="col-12 col-md-6">
                                                <div class="form-group ht-70">
                                                    <label class="radio-inline mr-3">
                                                        <input type="radio" name="gender" value="male"
                                                            @if (old('gender') == 'male') {{ 'selected' }} @endif>
                                                        <span></span>MALE (男性)
                                                    </label>
                                                    <label class="radio-inline mr-3">
                                                        <input type="radio" name="gender" value="female"
                                                            @if (old('gender') == 'female') {{ 'selected' }} @endif>
                                                        <span></span>FEMALE (女性)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="email @if ($errors->has('email')) is-invalid @endif"
                                                        id="email" value="{{ old('email') }}" name="email"
                                                        class="form-control" placeholder="Email (電郵)" required>
                                                    <div class="invalid-tooltip">
                                                        @if ($errors->has('email'))
                                                            {{ $errors->first('email') }}
                                                        @else
                                                            Email is required!
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text"
                                                        class="form-control @if ($errors->has('occupation')) is-invalid @endif"
                                                        name="occupation" id="occupation" value="{{ old('occupation') }}"
                                                        placeholder="Occupation &amp; Business Background (職業及業務背景)"
                                                        required>
                                                    <div class="invalid-tooltip">
                                                        @if ($errors->has('occupation'))
                                                            {{ $errors->first('occupation') }}
                                                        @else
                                                            Occupation is required!
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text"
                                                        class="form-control @if ($errors->has('passport_no')) is-invalid @endif"
                                                        id="passport_no" name="passport_no"
                                                        value="{{ old('passport_no') }}"
                                                        placeholder="HKID No. / Passport No. (香港身份證號碼 / 護照號碼)" required>
                                                    <div class="invalid-tooltip">
                                                        @if ($errors->has('passport_no'))
                                                            {{ $errors->first('passport_no') }}
                                                        @else
                                                            Passport number is required!
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" id="phone_number" name="phone_number"
                                                        class="form-control @if ($errors->has('phone_number')) is-invalid @endif"
                                                        placeholder="PHONE NUMBER  (電話)" required>
                                                    <div class="invalid-tooltip">
                                                        @if ($errors->has('phone_number'))
                                                            {{ $errors->first('phone_number') }}
                                                        @else
                                                            Phone number is required!
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <select class="form-select" name="nationality" required>
                                                        <option value=""
                                                            @if (old('nationality') == '') {{ 'selected' }} @endif
                                                            disabled>
                                                            Nationality (國籍)
                                                        </option>
                                                        <option value="pakistan"
                                                            @if (old('nationality') == 'pakistan') {{ 'selected' }} @endif>
                                                            Pakistan
                                                        </option>
                                                        <option value="china"
                                                            @if (old('nationality') == 'china') {{ 'selected' }} @endif>
                                                            China
                                                        </option>
                                                        <option value="other"
                                                            @if (old('nationality') == 'other') {{ 'selected' }} @endif>
                                                            Other
                                                        </option>
                                                    </select>
                                                    <div class="invalid-tooltip">
                                                        @if ($errors->has('nationality'))
                                                            {{ $errors->first('nationality') }}
                                                        @else
                                                            Nationality is required!
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <div class="form-group">
                                                    <textarea id="address" name="address" class="form-control  @if ($errors->has('address')) is-invalid @endif"
                                                        placeholder="ADDRESS (地址)">{{ old('address') }}</textarea>
                                                    <div class="invalid-tooltip">
                                                        @if ($errors->has('address'))
                                                            {{ $errors->first('address') }}
                                                        @else
                                                            Address is required!
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="footer">
                                            <button class="btn btn-custom" disabled="true">Previous</button>
                                            <div class="ml-auto">
                                                <button class="btn btn-default">Cancel</button>
                                                <button class="btn btn-custom" id="next">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="item-2" role="tabpanel">
                                <div class="card card-default form-card">
                                    <div class="card-header">
                                        SECTION 2A (第2A項) <span>Applicant InfoAPPLICANT INFORMATION (CORPORATE) ( 申請人資料
                                            (公司客戶))</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-md-12">
                                                <div class="form-group">
                                                    <input type="text"
                                                        class="form-control @if ($errors->has('business_name')) is-invalid @endif"
                                                        id="business_name" name="business_name"
                                                        placeholder="FULL LEGAL NAME OF BUSINESS (企業法定名稱)"
                                                        value="{{ old('business_name') }}" required>
                                                    <div class="invalid-tooltip">
                                                        @if ($errors->has('business_name'))
                                                            {{ $errors->first('business_name') }}
                                                        @else
                                                            Business Name is required!
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-12">
                                                <label class="form-label">TYPE OR ORGANIZATION (組織類型)</label>
                                                <div class="form-group ">
                                                    <label class="radio-inline ">
                                                        <input type="radio" name="type_of_organization"
                                                            value="Corporation">
                                                        <span></span>CORPORATION (法團)
                                                    </label>
                                                    <label class="radio-inline ">
                                                        <input type="radio" name="type_of_organization"
                                                            value="Partnership">
                                                        <span></span>PARTNERSHIP (合夥)
                                                    </label>
                                                    <label class="radio-inline ">
                                                        <input type="radio" name="type_of_organization"
                                                            value="Limited Company">
                                                        <span></span> Limited Company (有限公司)
                                                    </label>
                                                    <label class="radio-inline ">
                                                        <input type="radio" name="type_of_organization"
                                                            value="Sole Proprietor">
                                                        <span></span>SOLE PROPRIETOR (獨資經營)
                                                    </label>
                                                    <label class="radio-inline ">
                                                        <input type="radio" name="type_of_organization" value="other">
                                                        <span></span>Others (其他):
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                    <input type="text"
                                                        class="form-control @if ($errors->has('business_phone_num')) is-invalid @endif"
                                                        id="business_phone_num" name="business_phone_num"
                                                        placeholder="BUSINESS PHONE (業務電話)"
                                                        value="{{ old('business_phone_num') }}" required>
                                                    <div class="invalid-tooltip">
                                                        @if ($errors->has('business_phone_num'))
                                                            {{ $errors->first('business_phone_num') }}
                                                        @else
                                                            Business Phone Number is required!
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                    <input type="text"
                                                        class="form-control @if ($errors->has('business_fax')) is-invalid @endif"
                                                        id="business_fax" name="business_fax"
                                                        value="{{ old('business_fax') }}"
                                                        placeholder="BUSINESS FAX (業務傳真)" required>
                                                    <div class="invalid-tooltip">
                                                        @if ($errors->has('business_fax'))
                                                            {{ $errors->first('business_fax') }}
                                                        @else
                                                            Business Fax is required!
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                    <input type="email" id="business_email" name="business_email"
                                                        class="form-control @if ($errors->has('business_email')) is-invalid @endif"
                                                        value="{{ old('business_email') }}"
                                                        placeholder="BUSINESS EMAIL (業務電郵)" required>
                                                    <div class="invalid-tooltip">
                                                        @if ($errors->has('business_email'))
                                                            {{ $errors->first('business_email') }}
                                                        @else
                                                            Business Email is required!
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <div class="form-group">
                                                    <textarea type="text" class="form-control @if ($errors->has('business_address')) is-invalid @endif"
                                                        id="business_address" placeholder="BUSINESS ADDRESS (營業地址)" required>{{ old('business_address') }}</textarea>
                                                    <div class="invalid-tooltip">
                                                        @if ($errors->has('business_address'))
                                                            {{ $errors->first('business_address') }}
                                                        @else
                                                            Business Address is required!
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                    <input type="text" id="city" name="city"
                                                        class="form-control @if ($errors->has('city')) is-invalid @endif"
                                                        value="{{ old('city') }}" placeholder="CITY (城市)" required>
                                                    <div class="invalid-tooltip">
                                                        @if ($errors->has('city'))
                                                            {{ $errors->first('city') }}
                                                        @else
                                                            City is required!
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                    <input type="text" id="country" name="country"
                                                        value="{{ old('country') }}"
                                                        class="form-control orm-control @if ($errors->has('country')) is-invalid @endif"
                                                        placeholder="COUNTRY (所在國家)">
                                                    <div class="invalid-tooltip">
                                                        @if ($errors->has('country'))
                                                            {{ $errors->first('country') }}
                                                        @else
                                                            Country is required!
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                    <input id="zip_code" name="zip_code" type="text"
                                                        value="{{ old('zip_code') }}"
                                                        class="form-control @if ($errors->has('zip_code')) is-invalid @endif"
                                                        placeholder="ZIP CODE (郵政編碼)">
                                                    <div class="invalid-tooltip">
                                                        @if ($errors->has('zip_code'))
                                                            {{ $errors->first('zip_code') }}
                                                        @else
                                                            Zip Code is required!
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <label class="form-label">TYPE OF BUSINESS (業務類別)</label>
                                                <div class="form-group">
                                                    <label class="radio-inline ">
                                                        <input type="radio" name="type_of_business"
                                                            value="Coin Dealer">
                                                        <span></span> COIN DEALER (錢幣商)
                                                    </label>
                                                    <label class="radio-inline ">
                                                        <input type="radio" name="type_of_business"
                                                            value="Jewellery Repair">
                                                        <span></span>JEWELLERY REPAIR (珠寶修理)
                                                    </label>
                                                    <label class="radio-inline ">
                                                        <input type="radio" name="type_of_business"
                                                            value="Jewellery Manufacturer">
                                                        <span></span>JEWELLERY MANUFACTURER (珠寶製造商)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label">JEWELLERY RETAIL (珠寶零售)</label>
                                                <div class="form-group ">
                                                    <label class="radio-inline ">
                                                        <input type="radio" name="retails"
                                                            value="Goldy/Precious Metal Trading">
                                                        <span></span>GOLD/PRECIOUS METAL TRADING (黃金/貴金屬貿易)
                                                    </label>
                                                    <label class="radio-inline ">
                                                        <input type="radio" name="retails" value="Others">
                                                        <span></span>OTHER (其他) :
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <div class="form-group">
                                                    <input type="text" id="business_reg_num" name="business_reg_num"
                                                        value="{{ old('business_reg_num') }}"
                                                        class="form-control @if ($errors->has('business_reg_num')) is-invalid @endif"
                                                        placeholder="COMPANY INCORPORATION NUMBER / BUSINESS REGISTRATION CERTIFICATE NUMBER (公司註冊號碼 /商業登記證書號碼)">
                                                    <div class="invalid-tooltip">
                                                        @if ($errors->has('business_reg_num'))
                                                            {{ $errors->first('business_reg_num') }}
                                                        @else
                                                            Business Reg Number is required!
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text"
                                                        class="form-control @if ($errors->has('country_of_incorporation')) is-invalid @endif"
                                                        id="country_of_incorporation" name="country_of_incorporation"
                                                        value="{{ old('country_of_incorporation') }}"
                                                        placeholder="COUNTRY OF INCORPORATION (註冊國家)">
                                                    <div class="invalid-tooltip">
                                                        @if ($errors->has('country_of_incorporation'))
                                                            {{ $errors->first('country_of_incorporation') }}
                                                        @else
                                                            Country of Incorporation is required!
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" value="{{ old('years_in_business') }}"
                                                        class="form-control @if ($errors->has('years_in_business')) is-invalid @endif"
                                                        name="years_in_business" id="years_in_business"
                                                        placeholder="YEARS IN BUSINESS (經營年期) ">
                                                    <div class="invalid-tooltip">
                                                        @if ($errors->has('years_in_business'))
                                                            {{ $errors->first('years_in_business') }}
                                                        @else
                                                            Years in Business is required!
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">DO YOU IMPORT / EXPORT PRECIOUS METAL?
                                                    (貴公司有否進口或出口貴重金屬)</label>
                                                <div class="form-group ">
                                                    <label class="radio-inline ">
                                                        <input type="radio" name="import" value="Yes">
                                                        <span></span>YES (有)
                                                    </label>
                                                    <label class="radio-inline ">
                                                        <input type="radio" name="import" value="No">
                                                        <span></span> NO (沒有)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <div class="form-group">
                                                    <input type="text"
                                                        class="form-control @if ($errors->has('countries_of_import')) is-invalid @endif"
                                                        id="countries_of_import" name="countries_of_import"
                                                        value="{{ old('countries_of_import') }}"
                                                        placeholder="IF YES, WHAT ARE THE COUNTRIES YOU ARE TRADING WITH? (倘若有，是哪些地方?)">
                                                    <div class="invalid-tooltip">
                                                        @if ($errors->has('countries_of_import'))
                                                            {{ $errors->first('countries_of_import') }}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="footer">
                                            <button class="btn btn-custom">Previous</button>
                                            <div class="ml-auto">
                                                <button class="btn btn-default">Cancel</button>
                                                <button class="btn btn-custom">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="item-3" role="tabpanel">
                                <div class="card card-default form-card">
                                    <div class="card-header">
                                        SECTION 2B (第2B項) <span>SHAREHOLDER/DIRECTOR INFORMATION (股東/ 董事資料)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <h3>SHAREHOLDER/DIRECTOR (股東/董事)</h3>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="FULL NAME (全名) ">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="TITLE (職銜) ">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="EMAIL (電郵)">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="PHONE NUMBER (電話號碼) ">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="HKID NO. / PASSPORT NO  (香港身份證號碼 / 護照號碼) ">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="NATIONALITY (國籍)">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="ADDRESS (地址)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h3>SHAREHOLDER/DIRECTOR (股東/董事)</h3>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="FULL NAME (全名) ">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="TITLE (職銜) ">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="EMAIL (電郵)">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="PHONE NUMBER (電話號碼) ">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="HKID NO. / PASSPORT NO  (香港身份證號碼 / 護照號碼) ">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="NATIONALITY (國籍)">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="ADDRESS (地址)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h3>SHAREHOLDER/DIRECTOR (股東/董事)</h3>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="FULL NAME (全名) ">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="TITLE (職銜) ">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="EMAIL (電郵)">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="PHONE NUMBER (電話號碼) ">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="HKID NO. / PASSPORT NO  (香港身份證號碼 / 護照號碼) ">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="NATIONALITY (國籍)">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="ADDRESS (地址)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="footer">
                                            <button class="btn btn-custom">Previous</button>
                                            <div class="ml-auto">
                                                <button class="btn btn-default">Cancel</button>
                                                <button class="btn btn-custom">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="item-4" role="tabpanel">
                                <div class="card card-default form-card">
                                    <div class="card-header">
                                        SECTION 2C (第2C項 ) <span>AUTHORIZED TRADING REPRESENTATIVE (授權交易代表)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <h3>1.</h3>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="NAME (姓名)">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="TITLE (職銜) ">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="EMAIL (電郵) ">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="PHONE NUMBER (電話號碼)">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="SIGNATURE (簽署)">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <h3>2.</h3>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="NAME (姓名)">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="TITLE (職銜) ">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="EMAIL (電郵) ">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="PHONE NUMBER (電話號碼)">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="SIGNATURE (簽署)">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="footer">
                                            <button class="btn btn-custom">Previous</button>
                                            <div class="ml-auto">
                                                <button class="btn btn-default">Cancel</button>
                                                <button class="btn btn-custom">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="item-5" role="tabpanel">

                                <div class="card card-default form-card">
                                    <div class="card-header">
                                        SECTION 3 (第3項 )<span>OTHER INFORMATION (其他資料) </span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-md-12">
                                                <label class="form-label">HOW DID YOU HEAR ABOUT MG? (您從何處得悉MG?) </label>
                                                <div class="form-group ">
                                                    <label class="radio-inline ">
                                                        <input type="radio" name="type_of_organization"
                                                            value="Corporation">
                                                        <span></span> REFERRAL (轉介)
                                                    </label>
                                                    <label class="radio-inline ">
                                                        <input type="radio" name="type_of_organization"
                                                            value="Partnership">
                                                        <span></span>SALES REPRESENTATIVE (營業代表)
                                                    </label>
                                                    <label class="radio-inline ">
                                                        <input type="radio" name="type_of_organization"
                                                            value="Limited Company">
                                                        <span></span> INTERNET (互聯網)
                                                    </label>
                                                    <label class="radio-inline ">
                                                        <input type="radio" name="type_of_organization"
                                                            value="Sole Proprietor">
                                                        <span></span>ADVERTISEMENT (廣告)
                                                    </label>

                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="NAME OF SALES REPRESENTATIVE (營業代表名稱) ">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="SALES REPRESENTATIVE CODE (營業代表編號)">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="footer">
                                            <button class="btn btn-custom">Previous</button>
                                            <div class="ml-auto">
                                                <button class="btn btn-default">Cancel</button>
                                                <button class="btn btn-custom">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="item-6" role="tabpanel">

                                <div class="card card-default form-card">
                                    <div class="card-header">
                                        SECTION 4 (第4項) <span>BANK ACCOUNT FOR RECEIVING PAYMENTS (收款銀行資料)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="BANK NAME (銀行名稱)">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <select class="form-control">
                                                        <option>COUNTRY IN WHICH BANK IS LOCATED (銀行所在國家)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="ACCOUNT NAME (戶口名稱)">
                                                </div>
                                            </div>
                                            {{-- <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <select class="form-control">
                                                        <option>Select Language</option>
                                                    </select>
                                                </div>
                                            </div> --}}
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="BRANCH NUMBER (分行號碼) ">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="ACCOUNT NUMBER (戶口號碼) ">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="SWIFT CODE (跨國匯款國際銀行代碼)">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="footer">
                                            <button class="btn btn-custom">Previous</button>
                                            <div class="ml-auto">
                                                <button class="btn btn-default">Cancel</button>
                                                <button class="btn btn-custom">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')
    <script>
        $(document).ready(function() {
            // $("#tab").tabs();

            $("#next").click(function() {
                console.log("clicked");
                var active = $("#tab").tabs("option", "active");
                $("#tab").tabs("option", "active", active + 1);
            });
        })
    </script>
@endpush
