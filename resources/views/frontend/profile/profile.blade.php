@extends('frontend.layouts.master')


@section('content')

@include('frontend.products.header')


<div class="container center-aligned">
    <div class="col-sm-12">
                                
        <ul class="nav nav-tabs tpl-tabs animate" role="tablist">
            
            <li class="nav-item">
                <a href="#item-1" aria-controls="item-1" class="nav-link active" data-bs-toggle="tab" role="tab" aria-selected="true">Account Information</a>
            </li>
            
            <li class="nav-item">
                <a href="#item-2" aria-controls="item-2" class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false">APPLICANT INFORMATION</a>
            </li>
            
            <li class="nav-item">
                <a href="#item-3" aria-controls="item-3" class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false">SHAREHOLDER/DIRECTOR INFORMATION</a>
            </li>

            <li class="nav-item">
                <a href="#item-4" aria-controls="item-4" class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false">AUTHORIZED TRADING REPRESENTATIVE</a>
            </li>

            <li class="nav-item">
                <a href="#item-5" aria-controls="item-5" class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false">BANK ACCOUNT FOR RECEIVING PAYMENTS</a>
            </li>
            
        </ul>                                
        <div class="tab-content tpl-tabs-cont section-text">
            
            <div class="tab-pane fade active show" id="item-1" role="tabpanel">

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
            
            <div class="tab-pane fade" id="item-2" role="tabpanel">
                <div class="card card-default form-card">
                    <div class="card-header">
                        Sec#2A <span>Applicant Info</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Full Legal Name of Business">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Business Phone">
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label">Type of Organization</label>
                                <div class="form-group ">
                                    <label class="radio-inline ">
                                        <input type="radio" name="type-of-org" value="Corporation">
                                        <span></span>Corporation
                                    </label>
                                    <label class="radio-inline ">
                                        <input type="radio" name="type-of-org" value="Partnership">
                                        <span></span>Partnership
                                    </label>
                                    <label class="radio-inline ">
                                        <input type="radio" name="type-of-org" value="Limited Company">
                                        <span></span>Limited Company
                                    </label>
                                    <label class="radio-inline ">
                                        <input type="radio" name="type-of-org" value="Sole Proprietor">
                                        <span></span>Sole Proprietor
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Business Fax">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Business Email">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Business Address">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="City">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Country">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Zip Code">
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label">Type of Business</label>
                                <div class="form-group">
                                    <label class="radio-inline ">
                                        <input type="radio" name="type-of-business" value="Coin Dealer">
                                        <span></span>Coin Dealer
                                    </label>
                                    <label class="radio-inline ">
                                        <input type="radio" name="type-of-business" value="Jewellery Repair">
                                        <span></span>Jewellery Repair
                                    </label>
                                    <label class="radio-inline ">
                                        <input type="radio" name="type-of-business" value="Jewellery Manufacturer">
                                        <span></span>Jewellery Manufacturer
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label">Jewellery Retails</label>
                                <div class="form-group ">
                                    <label class="radio-inline ">
                                        <input type="radio" name="Retails" value="Goldy/Precious Metal Trading">
                                        <span></span>Goldy / Precious Metal Trading
                                    </label>
                                    <label class="radio-inline ">
                                        <input type="radio" name="Retails" value="Others">
                                        <span></span>Others
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Company Incorporation / Business Number">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Country / Incorporation">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Year in Business">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Do you Import / Export precious metals</label>
                                <div class="form-group ">
                                    <label class="radio-inline ">
                                        <input type="radio" name="agree" value="Yes">
                                        <span></span>Yes
                                    </label>
                                    <label class="radio-inline ">
                                        <input type="radio" name="agree" value="No">
                                        <span></span>No
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="If yes, What are the country you are trading with">
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <button class="btn btn-custom">Previous</button>
                            <div class="ml-auto">
                                <button class="btn btn-default">Cancel</button>
                                <button class="btn btn-custom">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane fade" id="item-3" role="tabpanel">
                <div class="card card-default form-card">
                    <div class="card-header">
                        Sec#2B <span>Shareholders/Directors Info</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Full Name Shareholder / Director">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Title">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Phone No.">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="HKID No. / Passport No.">
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
                            <button class="btn btn-custom">Previous</button>
                            <div class="ml-auto">
                                <button class="btn btn-default">Cancel</button>
                                <button class="btn btn-custom">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="item-4" role="tabpanel">

                <div class="card card-default form-card">
                    <div class="card-header">
                        Sec#3 <span>Other Info</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>How did you hear about MG</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Title">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Phone No.">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Signature">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nationality">
                                </div>
                            </div>
          
                        </div>
                        <div class="footer">
                            <button class="btn btn-custom">Previous</button>
                            <div class="ml-auto">
                                <button class="btn btn-default">Cancel</button>
                                <button class="btn btn-custom">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="tab-pane fade" id="item-5" role="tabpanel">

                <div class="card card-default form-card">
                    <div class="card-header">
                        Sec#4 <span>Bank Account for Reactiving Payments</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Bank Name">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>Country in which Bank is located</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Account Name">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>Select Language</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Branch Name">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Account Number">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Swift Code">
                                </div>
                            </div>
          
                        </div>
                        <div class="footer">
                            <button class="btn btn-custom">Previous</button>
                            <div class="ml-auto">
                                <button class="btn btn-default">Cancel</button>
                                <button class="btn btn-custom">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
        
    </div>
</div>

@endsection