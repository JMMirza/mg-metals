@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Add Products</h4>
                </div>

                <div class="card-body">
                    <form class="row g-3 needs-validation" action="{{ route('products.store') }}" method="POST"
                        enctype='multipart/form-data' novalidate>
                        @csrf

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="sku" class="form-label">SKU</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('sku')) is-invalid @endif" id="sku"
                                    name="sku" placeholder="Enter SKU" value="{{ old('sku') }}" required>
                                <div class="invalid-tooltip">
                                    @if ($errors->has('sku'))
                                        {{ $errors->first('sku') }}
                                    @else
                                        SKU is required!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('name')) is-invalid @endif" id="name"
                                    name="name" placeholder="Product Name" value="{{ old('name') }}" required>
                                <div class="invalid-tooltip">
                                    @if ($errors->has('name'))
                                        {{ $errors->first('name') }}
                                    @else
                                        Product Name is required!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="catergory_id" class="form-label">Categories</label>
                                <select class="form-select mb-3" name="catergory_id" required>
                                    <option value="" @if (old('catergory_id') == '') {{ 'selected' }} @endif
                                        selected disabled>
                                        Select One
                                    </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if (old('catergory_id') == $category->id) {{ 'selected' }} @endif>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-tooltip">
                                    @if ($errors->has('catergory_id'))
                                        {{ $errors->first('catergory_id') }}
                                    @else
                                        Select the Category!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="manufacturer_id" class="form-label">Manufacturer</label>
                                <select class="form-select mb-3" name="manufacturer_id" required>
                                    <option value="" @if (old('manufacturer_id') == '') {{ 'selected' }} @endif
                                        selected disabled>
                                        Select One
                                    </option>
                                    @foreach ($manufacturers as $manufacturer)
                                        <option value="{{ $manufacturer->id }}"
                                            @if (old('manufacturer_id') == $manufacturer->id) {{ 'selected' }} @endif>
                                            {{ $manufacturer->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-tooltip">
                                    @if ($errors->has('manufacturer_id'))
                                        {{ $errors->first('manufacturer_id') }}
                                    @else
                                        Select the Manufacturer!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="pricing_type" class="form-label">Pricing Type</label>
                                <select class="form-select mb-3" name="pricing_type" required>
                                    <option value="" @if (old('pricing_type') == '') {{ 'selected' }} @endif
                                        selected disabled>
                                        Select One
                                    </option>
                                    <option value="use_feed" @if (old('pricing_type') == 'use_feed') {{ 'selected' }} @endif>
                                        Use Feed
                                    </option>
                                    <option value="fix_price"
                                        @if (old('pricing_type') == 'fix_price') {{ 'selected' }} @endif>
                                        Fix Price
                                    </option>
                                </select>
                                <div class="invalid-tooltip">
                                    @if ($errors->has('pricing_type'))
                                        {{ $errors->first('pricing_type') }}
                                    @else
                                        Pricing Type is required!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="fixed_amount" class="form-label">Fixed Amount</label>
                                <input type="number" step="0.001"
                                    class="form-control @if ($errors->has('fixed_amount')) is-invalid @endif"
                                    id="fixed_amount" name="fixed_amount" placeholder="Please enter Fixed Amount"
                                    value="{{ old('fixed_amount') }}" required>
                                <div class="invalid-tooltip">
                                    @if ($errors->has('fixed_amount'))
                                        {{ $errors->first('fixed_amount') }}
                                    @else
                                        Fixed Amount is empty or incorrect!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="promo_amount" class="form-label">Promo Amount</label>
                                <input type="number" step="0.001"
                                    class="form-control @if ($errors->has('promo_amount')) is-invalid @endif"
                                    id="promo_amount" name="promo_amount" placeholder="Please enter Promo Amount"
                                    value="{{ old('promo_amount') }}" required>
                                <div class="invalid-tooltip">
                                    @if ($errors->has('promo_amount'))
                                        {{ $errors->first('promo_amount') }}
                                    @else
                                        Promo Amount is required!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="weight" class="form-label">Weight of Product</label>
                                <input type="number" step="0.001"
                                    class="form-control @if ($errors->has('weight')) is-invalid @endif"
                                    id="weight" name="weight" placeholder="Please enter Weight of Product"
                                    value="{{ old('weight') }}" required>
                                <div class="invalid-tooltip">
                                    @if ($errors->has('weight'))
                                        {{ $errors->first('weight') }}
                                    @else
                                        Weight of Product is required!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="mark_up" class="form-label">Mark Up</label>
                                <input type=number step=any
                                    class="form-control @if ($errors->has('mark_up')) is-invalid @endif"
                                    id="mark_up" name="mark_up" placeholder="Please Enter Mark Up"
                                    value="{{ old('mark_up') }}" required>
                                <div class="invalid-tooltip">
                                    @if ($errors->has('mark_up'))
                                        {{ $errors->first('mark_up') }}
                                    @else
                                        Mark Up is required!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="surcharge_at_product" class="form-label">Surcharge at Product Level</label>
                                <select class="form-select mb-3" name="surcharge_at_product" required>
                                    <option value="" @if (old('surcharge_at_product') == '') {{ 'selected' }} @endif
                                        selected disabled>
                                        Select One
                                    </option>
                                    <option value="yes" @if (old('surcharge_at_product') == 'yes') {{ 'selected' }} @endif>
                                        Yes
                                    </option>
                                    <option value="no" @if (old('surcharge_at_product') == 'no') {{ 'selected' }} @endif>
                                        No
                                    </option>
                                </select>
                                <div class="invalid-tooltip">
                                    @if ($errors->has('surcharge_at_product'))
                                        {{ $errors->first('surcharge_at_product') }}
                                    @else
                                        Surcharge at Product Level is required!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="product_picture" class="form-label">Product Picture</label>
                                <input type="file"
                                    class="form-control @if ($errors->has('product_picture')) is-invalid @endif"
                                    id="product_picture" name="product_picture" placeholder="Please Enter Account Name"
                                    value="{{ old('product_picture') }}" required>
                                <div class="invalid-tooltip">
                                    @if ($errors->has('product_picture'))
                                        {{ $errors->first('product_picture') }}
                                    @else
                                        Product Picture is required!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Enter product description here...">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="col-12 text-end">
                            <button class="btn btn-primary" type="submit">Save Changes</button>
                            <a href="{{ route('products.index') }}" type="button"
                                class="btn btn-light bg-gradient waves-effect waves-light">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
