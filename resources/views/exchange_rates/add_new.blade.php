<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Add Exchange Rate</h4>
            </div>

            <div class="card-body">
                <form class="row  needs-validation" action="{{ route('exchange-rate.store') }}" method="POST" novalidate>
                    @csrf
                    <div class="col-md-4 col-sm-12">
                        <div class="form-label-group in-border">
                            <label for="from_currency" class="form-label">From Currency</label>
                            <input type="text"
                                class="form-control @if ($errors->has('from_currency')) is-invalid @endif"
                                id="from_currency" name="from_currency" placeholder="From Currency"
                                value="{{ old('from_currency') }}" required>
                            <div class="invalid-tooltip">
                                @if ($errors->has('from_currency'))
                                    {{ $errors->first('from_currency') }}
                                @else
                                    From Currency is required!
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-label-group in-border">
                            <label for="to_currency" class="form-label">To Currency</label>
                            <input type="text"
                                class="form-control @if ($errors->has('to_currency')) is-invalid @endif"
                                id="to_currency" name="to_currency" placeholder="To Currency"
                                value="{{ old('to_currency') }}" required>
                            <div class="invalid-tooltip">
                                @if ($errors->has('to_currency'))
                                    {{ $errors->first('to_currency') }}
                                @else
                                    To Currency is required!
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 mb-3">
                        <div class="form-label-group in-border">
                            <label for="rate" class="form-label">Rate</label>
                            <input type="float"
                                class="form-control @if ($errors->has('rate')) is-invalid @endif" id="rate"
                                name="rate" placeholder="Rate" value="{{ old('rate') }}" required>
                            <div class="invalid-tooltip">
                                @if ($errors->has('rate'))
                                    {{ $errors->first('rate') }}
                                @else
                                    Rate is required!
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-12 text-end">
                        <button class="btn btn-primary" type="submit">Save Changes</button>
                        <a href="{{ route('manufacturers.index') }}" type="button"
                            class="btn btn-light bg-gradient waves-effect waves-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
