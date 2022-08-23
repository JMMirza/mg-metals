@extends('frontend.layouts.master')


@section('content')

    @include('layouts.flash_message')

    <div class="container center-aligned  vert-center">
        <div class="card card-default form-card">
          
            <div class="card-body">
                <h3 class="dark playfare mb-20">Account Verification</h3>
                <form method="POST" action="{{ route('verify-code') }}" class="needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-3">
                            {{-- <div class="form-group"> --}}
                            <input type="hidden" name="email" value="{{ $email }}">
                            <input id="code" type="code" placeholder="{{ __('Verification Code') }}"
                                class="form-control @error('code') is-invalid @enderror" name="code"
                                value="{{ old('code') }}" required>

                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            {{-- </div> --}}
                        </div>
                    </div>
                    <div class="footer mt-3">
                        <button class="= btn btn-custom w-100" type="submit">Verify Code</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
