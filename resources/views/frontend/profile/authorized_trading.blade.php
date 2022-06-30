<div class="card card-default form-card">
    <div class="card-header">
        {{ __('trading.SECTION 2C') }}<span>{{ __('trading.AUTHORIZED TRADING REPRESENTATIVE') }}</span>
    </div>
    <div class="card-body">
        <form class="row  needs-validation" action="{{ route('customer-trading.store', $customer->id) }}"
            method="POST" novalidate>
            @csrf
            <input type="text" name="form_info" value="trading" hidden>
            <input type="text" id="customer_id" name="customer_id" value="{{ $customer->id }}" hidden>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="form-control  @if ($errors->has('name')) is-invalid @endif"
                        placeholder="{{ __('trading.full_name') }}" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="form-control @if ($errors->has('title')) is-invalid @endif"
                        placeholder="{{ __('trading.title') }}" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <input type="text" value="{{ old('email') }}" name="email"
                        class="form-control @if ($errors->has('email')) is-invalid @endif"
                        placeholder="{{ __('trading.email') }}" required>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <input type="text" name="phone_number" value="{{ old('phone_number') }}"
                        class="form-control @if ($errors->has('phone_number')) is-invalid @endif"
                        placeholder="{{ __('trading.phone_number') }}" required>
                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="form-group">
                    <input type="text" name="signature" value="{{ old('signature') }}"
                        class="form-control @if ($errors->has('signature')) is-invalid @endif"
                        placeholder="{{ __('trading.signature') }}" required>
                </div>
            </div>
            <div class="footer">
                <a href="{{ route('customer-profile-data.edit', $customer->id) . '?tab=shareholder' }}"
                    class="btn btn-custom">{{ __('home_page.previous') }}</a>
                <div class="ml-auto">
                    <button class="btn btn-default" type="reset">{{ __('home_page.cancel') }}</button>
                    <button class="btn btn-custom" type="submit">{{ __('home_page.save') }}</button>

                    <a href="{{ route('customer-profile-data.edit', $customer->id) . '?tab=other_info' }}"
                        class="btn btn-custom">{{ __('home_page.next') }} </a>
                </div>
            </div>
        </form>

        <table class="table table-bordered table-striped align-middle table-nowrap mb-0 mt-5" style="width:100%">
            <thead>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>{{ __('trading.full_name') }}</th>
                    <th style="width:25%">{{ __('trading.title') }}</th>
                    <th style="width:25%">{{ __('trading.email') }}</th>
                    <th style="width:20%">{{ __('trading.phone_number') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($representatives as $representative)
                    <tr>
                        <td>{{ $representative->name }}</td>
                        <td>{{ $representative->title }}</td>
                        <td>{{ $representative->email }}</td>
                        <td>{{ $representative->phone_number }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No Record Found!</td>
                    </tr>
                @endforelse
            </tbody>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
