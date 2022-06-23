 <div class="card card-default form-card">
     <div class="card-header">
         SECTION 2A (第2A項) <span>Applicant InfoAPPLICANT INFORMATION (CORPORATE) ( 申請人資料
             (公司客戶))</span>
     </div>
     <div class="card-body">
         <form class="row g-3 needs-validation" action="{{ route('customer-profile-data.update', $customer->id) }}"
             method="POST" novalidate>
             @csrf
             @method('PUT')
             {{-- @if (isset($customer)) --}}
             {{-- <input type="text" name="customer_id" value="{{ $customer->id }}" hidden> --}}
             <input type="text" name="form_info" value="corporate" hidden>
             {{-- @endif --}}
             <div class="col-12 col-md-12">
                 <div class="form-group">
                     <input type="text" class="form-control @if ($errors->has('business_name')) is-invalid @endif"
                         id="business_name" name="business_name" placeholder="FULL LEGAL NAME OF BUSINESS (企業法定名稱)"
                         value="{{ $customer->business_name }}" required>

                 </div>
             </div>

             <div class="col-12 col-md-12">
                 <label class="form-label">TYPE OR ORGANIZATION (組織類型)</label>
                 <div class="form-group ">
                     <label class="radio-inline ">
                         <input type="radio" name="type_of_organization" value="Corporation"
                             @if ($customer->type_of_organization == 'Corporation') checked @endif>
                         <span></span>CORPORATION (法團)
                     </label>
                     <label class="radio-inline ">
                         <input type="radio" name="type_of_organization" value="Partnership"
                             @if ($customer->type_of_organization == 'Partnership') checked @endif>
                         <span></span>PARTNERSHIP (合夥)
                     </label>
                     <label class="radio-inline ">
                         <input type="radio" name="type_of_organization" value="Limited Company"
                             @if ($customer->type_of_organization == 'Limited Company') checked @endif>
                         <span></span> Limited Company (有限公司)
                     </label>
                     <label class="radio-inline ">
                         <input type="radio" name="type_of_organization" value="Sole Proprietor"
                             @if ($customer->type_of_organization == 'Sole Proprietor') checked @endif>
                         <span></span>SOLE PROPRIETOR (獨資經營)
                     </label>
                     <label class="radio-inline ">
                         <input type="radio" name="type_of_organization" value="other"
                             @if ($customer->type_of_organization == 'other') checked @endif>
                         <span></span>Others (其他):
                     </label>
                 </div>
             </div>
             <div class="col-12 col-md-4">
                 <div class="form-group">
                     <input type="text" class="form-control @if ($errors->has('business_phone_num')) is-invalid @endif"
                         id="business_phone_num" name="business_phone_num" placeholder="BUSINESS PHONE (業務電話)"
                         value="{{ $customer->business_phone_num }}" required>

                 </div>
             </div>
             <div class="col-12 col-md-4">
                 <div class="form-group">
                     <input type="text" class="form-control @if ($errors->has('business_fax')) is-invalid @endif"
                         id="business_fax" name="business_fax" value="{{ $customer->business_fax }}"
                         placeholder="BUSINESS FAX (業務傳真)" required>

                 </div>
             </div>
             <div class="col-12 col-md-4">
                 <div class="form-group">
                     <input type="email" id="business_email" name="business_email"
                         class="form-control @if ($errors->has('business_email')) is-invalid @endif"
                         value="{{ $customer->business_email }}" placeholder="BUSINESS EMAIL (業務電郵)" required>

                 </div>
             </div>
             <div class="col-12 col-md-12">
                 <div class="form-group">
                     <textarea type="text" class="form-control @if ($errors->has('business_address')) is-invalid @endif" id="business_address"
                         name="business_address" placeholder="BUSINESS ADDRESS (營業地址)" required>{{ $customer->business_address }}</textarea>

                 </div>
             </div>
             <div class="col-12 col-md-4">
                 <div class="form-group">
                     <input type="text" id="city" name="city"
                         class="form-control @if ($errors->has('city')) is-invalid @endif"
                         value="{{ $customer->city }}" placeholder="CITY (城市)" required>

                 </div>
             </div>
             <div class="col-12 col-md-4">
                 <div class="form-group">
                     <input type="text" id="country" name="country" value="{{ $customer->country }}"
                         class="form-control orm-control @if ($errors->has('country')) is-invalid @endif"
                         placeholder="COUNTRY (所在國家)">

                 </div>
             </div>
             <div class="col-12 col-md-4">
                 <div class="form-group">
                     <input id="zip_code" name="zip_code" type="text" value="{{ $customer->zip_code }}"
                         class="form-control @if ($errors->has('zip_code')) is-invalid @endif"
                         placeholder="ZIP CODE (郵政編碼)">

                 </div>
             </div>

             <div class="col-12 col-md-6">
                 <label class="form-label">TYPE OF BUSINESS (業務類別)</label>
                 <div class="form-group">
                     <label class="radio-inline ">
                         <input type="radio" name="type_of_business" value="Coin Dealer"
                             @if ($customer->type_of_business == 'Coin Dealer') checked @endif>
                         <span></span> COIN DEALER (錢幣商)
                     </label>
                     <label class="radio-inline ">
                         <input type="radio" name="type_of_business" value="Jewellery Repair"
                             @if ($customer->type_of_business == 'Jewellery Repair') checked @endif>
                         <span></span>JEWELLERY REPAIR (珠寶修理)
                     </label>
                     <label class="radio-inline ">
                         <input type="radio" name="type_of_business" value="Jewellery Manufacturer"
                             @if ($customer->type_of_business == 'Jewellery Manufacturer') checked @endif>
                         <span></span>JEWELLERY MANUFACTURER (珠寶製造商)
                     </label>
                 </div>
             </div>
             <div class="col-12 col-md-6">
                 <label class="form-label">JEWELLERY RETAIL (珠寶零售)</label>
                 <div class="form-group ">
                     <label class="radio-inline ">
                         <input type="radio" name="retails" value="Goldy/Precious Metal Trading"
                             @if ($customer->retails == 'Goldy/Precious Metal Trading') checked @endif>
                         <span></span>GOLD/PRECIOUS METAL TRADING (黃金/貴金屬貿易)
                     </label>
                     <label class="radio-inline ">
                         <input type="radio" name="retails" value="Others"
                             @if ($customer->retails == 'Others') checked @endif>
                         <span></span>OTHER (其他) :
                     </label>
                 </div>
             </div>
             <div class="col-12 col-md-12">
                 <div class="form-group">
                     <input type="text" id="business_reg_num" name="business_reg_num"
                         value="{{ $customer->business_reg_num }}"
                         class="form-control @if ($errors->has('business_reg_num')) is-invalid @endif"
                         placeholder="COMPANY INCORPORATION NUMBER / BUSINESS REGISTRATION CERTIFICATE NUMBER (公司註冊號碼 /商業登記證書號碼)">

                 </div>
             </div>
             <div class="col-12 col-md-6">
                 <div class="form-group">
                     <input type="text" class="form-control @if ($errors->has('country_of_incorporation')) is-invalid @endif"
                         id="country_of_incorporation" name="country_of_incorporation"
                         value="{{ $customer->country_of_incorporation }}"
                         placeholder="COUNTRY OF INCORPORATION (註冊國家)">

                 </div>
             </div>
             <div class="col-12 col-md-6">
                 <div class="form-group">
                     <input type="text" value="{{ $customer->years_in_business }}"
                         class="form-control @if ($errors->has('years_in_business')) is-invalid @endif"
                         name="years_in_business" id="years_in_business" placeholder="YEARS IN BUSINESS (經營年期) ">

                 </div>
             </div>
             <div class="col-12 col-md-4">
                 <label class="form-label">DO YOU IMPORT / EXPORT PRECIOUS METAL?
                     (貴公司有否進口或出口貴重金屬)</label>
                 <div class="form-group ">
                     <label class="radio-inline ">
                         <input type="radio" name="import" value="Yes"
                             @if ($customer->import == 'Yes') checked @endif>
                         <span></span>YES (有)
                     </label>
                     <label class="radio-inline ">
                         <input type="radio" name="import" value="No"
                             @if ($customer->import == 'No') checked @endif>
                         <span></span> NO (沒有)
                     </label>
                 </div>
             </div>
             <div class="col-12 col-md-8">
                 <div class="form-group">
                     <input type="text" class="form-control @if ($errors->has('countries_of_import')) is-invalid @endif"
                         id="countries_of_import" name="countries_of_import"
                         value="{{ $customer->countries_of_import }}"
                         placeholder="IF YES, WHAT ARE THE COUNTRIES YOU ARE TRADING WITH? (倘若有，是哪些地方?)">
                 </div>
             </div>
             <div class="footer">
                 <a href="{{ route('customer-profile-data.edit', $customer->id) . '?tab=individual' }}"
                     class="btn btn-custom">Previous</a>
                 <div class="ml-auto">
                     <button class="btn btn-default" type="reset">Cancel</button>
                     <button class="btn btn-custom" type="submit">Next</button>
                 </div>
             </div>
         </form>
     </div>
 </div>
