 <div class="card card-default form-card">
     <div class="card-header">
         SECTION 4 (第4項) <span>BANK ACCOUNT FOR RECEIVING PAYMENTS (收款銀行資料)</span>
     </div>
     <div class="card-body">
         <form class="row g-3 needs-validation" action="{{ route('customer-profile-data.update', $customer->id) }}"
             method="POST" novalidate>
             @csrf
             @method('PUT')
             <input type="text" name="form_info" value="bank_info" hidden>
             <div class="col-12 col-md-6">
                 <div class="form-group">
                     <input type="text" name="bank_name" value="{{ $customer->bank_name }}"
                         class="form-control @if ($errors->has('bank_name')) is-invalid @endif"
                         placeholder="BANK NAME (銀行名稱)">
                 </div>
             </div>
             <div class="col-12 col-md-6">
                 <div class="form-group">
                     <input type="text" name="bank_country_name" value="{{ $customer->bank_country_name }}"
                         class="form-control @if ($errors->has('bank_country_name')) is-invalid @endif"
                         placeholder="COUNTRY IN WHICH BANK IS LOCATED (銀行所在國家)">

                 </div>
             </div>
             <div class="col-12 col-md-6">
                 <div class="form-group">
                     <input type="text" name="bank_account_name" value="{{ $customer->bank_account_name }}"
                         class="form-control @if ($errors->has('bank_account_name')) is-invalid @endif"
                         placeholder="ACCOUNT NAME (戶口名稱)">
                 </div>
             </div>

             <div class="col-12 col-md-6">
                 <div class="form-group">
                     <input type="text" name="bank_branch_number" value="{{ $customer->bank_branch_number }}"
                         class="form-control @if ($errors->has('bank_branch_number')) is-invalid @endif"
                         placeholder="BRANCH NUMBER (分行號碼) ">
                 </div>
             </div>
             <div class="col-12 col-md-6">
                 <div class="form-group">
                     <input type="text" name="bank_account_number" value="{{ $customer->bank_account_number }}"
                         class="form-control @if ($errors->has('bank_account_number')) is-invalid @endif"
                         placeholder="ACCOUNT NUMBER (戶口號碼) ">
                 </div>
             </div>
             <div class="col-12 col-md-6">
                 <div class="form-group">
                     <input type="text" name="bank_swift_code" value="{{ $customer->bank_swift_code }}"
                         class="form-control @if ($errors->has('bank_swift_code')) is-invalid @endif"
                         placeholder="SWIFT CODE (跨國匯款國際銀行代碼)">
                 </div>
             </div>

             <div class="footer">
                 <a href="{{ route('customer-profile-data.edit', $customer->id) . '?tab=other_info' }}"
                     class="btn btn-custom">Previous</a>
                 <div class="ml-auto">
                     <button class="btn btn-default" type="reset">Cancel</button>
                     <button class="btn btn-custom" type="submit">Next</button>
                 </div>
             </div>
         </form>
     </div>
 </div>
