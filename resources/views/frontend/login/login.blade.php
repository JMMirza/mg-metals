@extends('frontend.layouts.master')


@section('content')
<section class="small-section bg-dark-lighter">
    <div class="relative container align-left">
        
        <div class="row">
            
            <div class="col-md-8">
                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">My Account</h1>
                <div class="hs-line-4 font-alt">
                    Lorem ipsum dolor sit amet, consectetur adipiscing
                </div>
            </div>
            
            <div class="col-md-4 mt-30">
                <div class="mod-breadcrumbs font-alt align-right">
                    <a href="#">Home</a>&nbsp;/&nbsp;<a href="#">Pages</a>&nbsp;/&nbsp;<span>My Account</span>
                </div>
            </div>
        </div>
        
    </div>
</section>

<div class="container center-aligned">
    <div class="card card-default form-card">
        <div class="card-header">
            Sec#1 <span>Account Info</span>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Full Name">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <select class="form-control" placeholder="Select Language">
                            <option value="">Select Language</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group ht-70">
                        <label class="radio-inline mr-3">
                            <input type="radio" name="gender" value="male">
                            <span></span>Male
                        </label>
                        <label class="radio-inline mr-3">
                            <input type="radio" name="gender" value="female">
                            <span></span>Female
                        </label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Accupation &amp; Business Background">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="HKID No. / Passport No.">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Phone No.">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nationality">
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Address">
                    </div>
                </div>
            </div>
            <div class="footer">
                <button class="btn btn-custom" disabled="true">Previous</button>
                <div class="ml-auto">
                    <button class="btn btn-default">Cancel</button>
                    <button class="btn btn-custom">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection