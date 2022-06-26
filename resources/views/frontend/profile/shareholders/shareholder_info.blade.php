<div class="card card-default form-card">
    <div class="card-header">
        {{ __('shareholder.SECTION 2B') }} <span>{{ __('shareholder.SHAREHOLDER/DIRECTOR INFORMATION') }}</span>
    </div>
    <div class="card-body">
        <h3>{{ __('shareholder.SHAREHOLDER/DIRECTOR') }}</h3>
        <form class="row g-3 needs-validation" action="{{ route('customer-shareholders.store', $customer->id) }}"
            method="POST" novalidate>
            @csrf
            <input type="text" name="form_info" value="shareholder" hidden>
            <input type="text" id="customer_id" name="customer_id" value="{{ $customer->id }}" hidden>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="form-control  @if ($errors->has('name')) is-invalid @endif"
                        placeholder="{{ __('shareholder.full_name') }}" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="form-control @if ($errors->has('title')) is-invalid @endif"
                        placeholder="{{ __('shareholder.title') }}" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <input type="text" value="{{ old('email') }}" name="email"
                        class="form-control @if ($errors->has('email')) is-invalid @endif"
                        placeholder="{{ __('shareholder.email') }}" required>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <input type="text" name="phone_number" value="{{ old('phone_number') }}"
                        class="form-control @if ($errors->has('phone_number')) is-invalid @endif"
                        placeholder="{{ __('shareholder.phone_number') }}" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <input type="text" name="passport_no" value="{{ old('passort_no') }}"
                        class="form-control @if ($errors->has('passport_no')) is-invalid @endif"
                        placeholder="{{ __('shareholder.passport_no') }}" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <input type="text" name="nationality" value="{{ old('nationality') }}"
                        class="form-control @if ($errors->has('nationality')) is-invalid @endif"
                        placeholder="{{ __('shareholder.nationality') }}" required>
                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="form-group">
                    <input type="text" name="address" value="{{ old('address') }}"
                        class="form-control @if ($errors->has('address')) is-invalid @endif"
                        placeholder="{{ __('shareholder.address') }}" required>
                </div>
            </div>

            <div class="footer">
                <a href="{{ route('customer-profile-data.edit', $customer->id) . '?tab=corporate' }}"
                    class="btn btn-custom">{{ __('home_page.previous') }}</a>
                <div class="ml-auto">
                    <button class="btn btn-default" type="reset">{{ __('home_page.cancel') }}</button>
                    <button class="btn btn-custom" type="submit">{{ __('home_page.save') }}</button>
                    <a href="{{ route('customer-profile-data.edit', $customer->id) . '?tab=trading' }}"
                        class="btn btn-primary">{{ __('home_page.next') }} </a>
                </div>
            </div>
        </form>
        <table class="table table-bordered table-striped align-middle table-nowrap mb-0 mt-5"
            style="width:100%">
            <thead>
                <tr>
                    <th>{{ __('shareholder.full_name') }}</th>
                    <th>{{ __('shareholder.title') }}</th>
                    <th style="width:12%">{{ __('shareholder.email') }}</th>
                    <th style="width:12%">{{ __('shareholder.phone_number') }}</th>
                    <th style="width:20%">{{ __('shareholder.passport_no') }}</th>
                    <th style="width:12%">{{ __('shareholder.nationality') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($shareholders as $shareholder)
                    <tr>
                        <td>{{ $shareholder->name }}</td>
                        <td>{{ $shareholder->title }}</td>
                        <td>{{ $shareholder->email }}</td>
                        <td>{{ $shareholder->phone_number }}</td>
                        <td>{{ $shareholder->passport_no }}</td>
                        <td>{{ $shareholder->nationality }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No Record Found!</td>
                    </tr>
                @endforelse
            </tbody>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
@push('frontend.layouts.footer_scripts')
    <script>
        // $(document).ready(function() {
        //     var customer_id = $("#customer_id").val();
        //     console.log(customer_id);
        //     $("#shareholders-data-table").DataTable({
        //         processing: true,
        //         serverSide: true,
        //         responsive: true,

        //         scrollX: true,
        //         language: {
        //             search: "",
        //             searchPlaceholder: "Search...",
        //         },
        //         ajax: {
        //             url: "{{ route('customer-shareholders.index') }}",
        //             data: function(d) {
        //                 d.customer_id = customer_id;
        //             },
        //         },
        //         columns: [{
        //                 data: "name",
        //                 name: "name",
        //             },
        //             {
        //                 data: "title",
        //                 name: "title",
        //             },
        //             {
        //                 data: "email",
        //                 name: "email",
        //                 width: "15%",
        //             },
        //             {
        //                 data: "phone_number",
        //                 name: "phone_number",
        //                 width: "15%",
        //             },
        //             {
        //                 data: "passport_no",
        //                 name: "passport_no",
        //                 width: "15%",
        //             },
        //             {
        //                 data: "nationality",
        //                 name: "nationality",
        //                 width: "15%",
        //             },

        //         ],
        //     });

        // });
    </script>
@endpush
