@extends('frontend.layouts.master')

@section('content')
    @include('frontend.contact_us.header')

    {{-- <div class="google-map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12286.715636833376!2d-75.59837531200412!3d39.65694025682884!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c703f3d191cf13%3A0xf4674106f987fe3a!2s245+Quigley+Blvd+Ste+K%2C+New+Castle%2C+DE+19720%2C+USA!5e0!3m2!1sen!2sua!4v1530266633608"
            width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div> --}}
    <section class="page-section" id="about">
        <div class="container relative">

            <div class="section-text mb-60 mb-sm-40">
                <div class="row">
                    <div class="col-sm-12 mb-sm-50 mb-xs-30">
                        <div class="container relative">
                            {{-- <div class="row">
                                <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                                    <div class="section-text align-center mb-70 mb-xs-40">
                                        Curabitur eu adipiscing lacus, a iaculis diam. Nullam placerat blandit auctor. Nulla
                                        accumsan ipsum et nibh rhoncus, eget tempus sapien ultricies. Donec mollis lorem
                                        vehicula.
                                    </div>
                                </div>
                            </div> --}}

                            <div class="row mb-60 mb-xs-40">

                                <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                                    <div class="row">

                                        <!-- Phone -->
                                        <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
                                            <div class="contact-item">
                                                <div class="ci-icon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <div class="ci-title font-alt">
                                                    {{ __('home_page.call_us') }}
                                                </div>
                                                <div class="ci-text">
                                                    (852) 3998 4916
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Phone -->

                                        <!-- Address -->
                                        <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
                                            <div class="contact-item">
                                                <div class="ci-icon">
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                                <div class="ci-title font-alt">
                                                    {{ __('home_page.Address') }}
                                                </div>
                                                <div class="ci-text">
                                                    Unit F, 18F, MG Tower, 133 Hoi Bun Road, Kwun Tong, Kowloon, Hong Kong
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Address -->

                                        <!-- Email -->
                                        <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
                                            <div class="contact-item">
                                                <div class="ci-icon">
                                                    <i class="fa fa-envelope"></i>
                                                </div>
                                                <div class="ci-title font-alt">
                                                    {{ __('home_page.Email') }}
                                                </div>
                                                <div class="ci-text">
                                                    <a href="mailto:account@mgmetals.com.hk">account@mgmetals.com.hk</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Email -->

                                    </div>
                                </div>

                            </div>

                            <!-- Contact Form -->
                            <div class="row">
                                <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">

                                    <form class="form contact-form" id="contact_form">
                                        <div class="clearfix">

                                            <div class="cf-left-col">

                                                <!-- Name -->
                                                <div class="form-group">
                                                    <input type="text" name="name" id="name"
                                                        class="input-md round form-control"
                                                        placeholder="{{ __('home_page.Name') }}" pattern=".{3,100}"
                                                        required aria-required="true">
                                                </div>

                                                <!-- Email -->
                                                <div class="form-group">
                                                    <input type="email" name="email" id="email"
                                                        class="input-md round form-control"
                                                        placeholder="{{ __('home_page.Email') }}" pattern=".{5,100}"
                                                        required aria-required="true">
                                                </div>

                                            </div>

                                            <div class="cf-right-col">

                                                <!-- Message -->
                                                <div class="form-group">
                                                    <textarea name="message" id="message" class="input-md round form-control" style="height: 88px;"
                                                        placeholder="{{ __('Message') }}"></textarea>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="clearfix">

                                            <div class="cf-left-col">

                                                <!-- Inform Tip -->
                                                <div class="form-tip pt-20">
                                                    <i class="fa fa-info-circle"></i> All the fields are required
                                                </div>

                                            </div>

                                            <div class="cf-right-col">

                                                <!-- Send Button -->
                                                <div class="align-right pt-10">
                                                    <button class="submit_btn btn btn-mod btn-medium btn-round"
                                                        id="submit_btn" aria-controls="result">Submit Message</button>
                                                </div>

                                            </div>

                                        </div>



                                        <div id="result" role="region" aria-live="polite" aria-atomic="true"></div>
                                    </form>

                                </div>
                            </div>
                            <!-- End Contact Form -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
