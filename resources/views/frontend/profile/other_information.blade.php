<div class="card card-default form-card">
    <div class="card-header">
        SECTION 3 (第3項 )<span>OTHER INFORMATION (其他資料) </span>
    </div>
    <div class="card-body">
        <form class="row g-3 needs-validation" action="{{ route('customer-profile-data.update', $customer->id) }}"
            method="POST" novalidate>
            @csrf
            @method('PUT')

            <input type="text" name="form_info" value="other_info" hidden>
            <div class="col-12 col-md-12">
                <label class="form-label">HOW DID YOU HEAR ABOUT MG? (您從何處得悉MG?) </label>
                <div class="form-group ">
                    <label class="radio-inline ">
                        <input type="radio" name="hear_about_mg" value="REFERRAL"
                            @if ($customer->hear_about_mg == 'REFERRAL') checked @endif>
                        <span></span> REFERRAL (轉介)
                    </label>
                    <label class="radio-inline ">
                        <input type="radio" name="hear_about_mg" value="SALES REPRESENTATIVE"
                            @if ($customer->hear_about_mg == 'SALES REPRESENTATIVE') checked @endif>
                        <span></span>SALES REPRESENTATIVE (營業代表)
                    </label>
                    <label class="radio-inline ">
                        <input type="radio" name="hear_about_mg" value="INTERNET"
                            @if ($customer->hear_about_mg == 'INTERNET') checked @endif>
                        <span></span> INTERNET (互聯網)
                    </label>
                    <label class="radio-inline ">
                        <input type="radio" name="hear_about_mg" value="ADVERTISEMENT"
                            @if ($customer->hear_about_mg == 'ADVERTISEMENT') checked @endif>
                        <span></span>ADVERTISEMENT (廣告)
                    </label>

                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <input type="text" name="sales_rep_name" value="{{ $customer->sales_rep_name }}"
                        class="form-control @if ($errors->has('sales_rep_name')) is-invalid @endif"
                        placeholder="NAME OF SALES REPRESENTATIVE (營業代表名稱) ">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <input type="text" name="sales_rep_number" value="{{ $customer->sales_rep_number }}"
                        class="form-control @if ($errors->has('sales_rep_number')) is-invalid @endif"
                        placeholder="SALES REPRESENTATIVE CODE (營業代表編號)">
                </div>
            </div>


            <div class="footer">
                <a href="{{ route('customer-profile-data.edit', $customer->id) . '?tab=trading' }}"
                    class="btn btn-custom">Previous</a>
                <div class="ml-auto">
                    <button class="btn btn-default" type="reset">Cancel</button>
                    <button class="btn btn-custom" type="submit">Next</button>
                </div>
            </div>
        </form>
    </div>
</div>
