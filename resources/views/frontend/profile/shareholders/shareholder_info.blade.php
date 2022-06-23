<div class="card card-default form-card">
    <div class="card-header">
        SECTION 2B (第2B項) <span>SHAREHOLDER/DIRECTOR INFORMATION (股東/ 董事資料)</span>
    </div>
    <div class="card-body">
        <h3>SHAREHOLDER/DIRECTOR (股東/董事)</h3>
        <form class="row g-3 needs-validation" action="{{ route('customer-shareholders.store', $customer->id) }}"
            method="POST" novalidate>
            @csrf
            <input type="text" name="form_info" value="shareholder" hidden>
            <input type="text" id="customer_id" name="customer_id" value="{{ $customer->id }}" hidden>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="form-control  @if ($errors->has('name')) is-invalid @endif"
                        placeholder="FULL NAME (全名) " required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="form-control @if ($errors->has('title')) is-invalid @endif"
                        placeholder="TITLE (職銜) " required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <input type="text" value="{{ old('email') }}" name="email"
                        class="form-control @if ($errors->has('email')) is-invalid @endif"
                        placeholder="EMAIL (電郵)" required>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <input type="text" name="phone_number" value="{{ old('phone_number') }}"
                        class="form-control @if ($errors->has('phone_number')) is-invalid @endif"
                        placeholder="PHONE NUMBER (電話號碼) " required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <input type="text" name="passport_no" value="{{ old('passort_no') }}"
                        class="form-control @if ($errors->has('passport_no')) is-invalid @endif"
                        placeholder="HKID NO. / PASSPORT NO  (香港身份證號碼 / 護照號碼) " required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <input type="text" name="nationality" value="{{ old('nationality') }}"
                        class="form-control @if ($errors->has('nationality')) is-invalid @endif"
                        placeholder="NATIONALITY (國籍)" required>
                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="form-group">
                    <input type="text" name="address" value="{{ old('address') }}"
                        class="form-control @if ($errors->has('address')) is-invalid @endif"
                        placeholder="ADDRESS (地址)" required>
                </div>
            </div>

            <div class="footer">
                <a href="{{ route('customer-profile-data.edit', $customer->id) . '?tab=corporate' }}"
                    class="btn btn-custom">Previous</a>
                <div class="ml-auto">
                    <button class="btn btn-default" type="reset">Cancel</button>
                    <button class="btn btn-custom" type="submit">Save</button>
                    <a href="{{ route('customer-profile-data.edit', $customer->id) . '?tab=trading' }}"
                        class="btn btn-primary">Next </a>
                </div>
            </div>
        </form>
        <table id="shareholders-data-table" class="table table-bordered table-striped align-middle table-nowrap mb-0"
            style="width:100%">
            <thead>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>Name</th>
                    <th>Title</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Passport Number</th>
                    <th>Nationality</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>Name</th>
                    <th>Title</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Passport Number</th>
                    <th>Nationality</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@push('frontend.layouts.footer_scripts')
    <script>
        $(document).ready(function() {
            var customer_id = $("#customer_id").val();
            console.log(customer_id);
            $("#shareholders-data-table").DataTable({
                processing: true,
                serverSide: true,
                responsive: true,

                scrollX: true,
                language: {
                    search: "",
                    searchPlaceholder: "Search...",
                },
                ajax: {
                    url: "{{ route('customer-shareholders.index') }}",
                    data: function(d) {
                        d.customer_id = customer_id;
                    },
                },
                columns: [{
                        data: "name",
                        name: "name",
                    },
                    {
                        data: "title",
                        name: "title",
                    },
                    {
                        data: "email",
                        name: "email",
                        width: "15%",
                    },
                    {
                        data: "phone_number",
                        name: "phone_number",
                        width: "15%",
                    },
                    {
                        data: "passport_no",
                        name: "passport_no",
                        width: "15%",
                    },
                    {
                        data: "nationality",
                        name: "nationality",
                        width: "15%",
                    },

                ],
            });

        });
    </script>
@endpush
