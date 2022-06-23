<div class="card card-default form-card">
    <div class="card-header">
        SECTION 2C (第2C項 ) <span>AUTHORIZED TRADING REPRESENTATIVE (授權交易代表)</span>
    </div>
    <div class="card-body">
        <form class="row g-3 needs-validation" action="{{ route('customer-trading.store', $customer->id) }}"
            method="POST" novalidate>
            @csrf
            <input type="text" name="form_info" value="trading" hidden>
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
            <div class="col-12 col-md-12">
                <div class="form-group">
                    <input type="text" name="signature" value="{{ old('signature') }}"
                        class="form-control @if ($errors->has('signature')) is-invalid @endif"
                        placeholder="SIGNATURE (簽署)" required>
                </div>
            </div>
            <div class="footer">
                <a href="{{ route('customer-profile-data.edit', $customer->id) . '?tab=shareholder' }}"
                    class="btn btn-custom">Previous</a>
                <div class="ml-auto">
                    <button class="btn btn-default" type="reset">Cancel</button>
                    <button class="btn btn-custom" type="submit">Save</button>
                    <a href="{{ route('customer-profile-data.edit', $customer->id) . '?tab=other_info' }}"
                        class="btn btn-primary">Next </a>
                </div>
            </div>
        </form>
        <table id="trading-data-table" class="table table-bordered table-striped align-middle table-nowrap mb-0"
            style="width:100%">
            <thead>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>Name</th>
                    <th>Title</th>
                    <th>Email</th>
                    <th>Phone Number</th>
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

            $("#trading-data-table").DataTable({
                processing: true,
                serverSide: true,
                responsive: true,

                scrollX: true,
                language: {
                    search: "",
                    searchPlaceholder: "Search...",
                },
                ajax: {
                    url: "{{ route('customer-trading.index') }}",
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
                ],
            });
        });
    </script>
@endpush
