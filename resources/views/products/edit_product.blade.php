@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Update Product</h4>
                </div>

                <div class="card-body">
                    <form class="row g-3 needs-validation" action="{{ route('products.update', $product->id) }}"
                        method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="sku" class="form-label">SKU (庫存單位)</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('sku')) is-invalid @endif" id="sku"
                                    name="sku" placeholder="Enter SKU" value="{{ $product->sku }}">
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
                                <label for="name" class="form-label">Product Name (物品名稱)</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('name')) is-invalid @endif" id="name"
                                    name="name" placeholder="Product Name" value="{{ $product->name }}" required>
                                <div class="invalid-tooltip">
                                    @if ($errors->has('name'))
                                        {{ $errors->first('name') }}
                                    @else
                                        Product Name is required!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-label-group in-border">
                                <label for="catergory_id" class="form-label">Categories (物品類別)</label>
                                <select class="form-select mb-3" name="catergory_id" required>
                                    <option value="" @if ($product->catergory_id == '') {{ 'selected' }} @endif
                                        selected disabled>
                                        Select One
                                    </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if ($product->catergory_id == $category->id) {{ 'selected' }} @endif>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-tooltip">Select the Category!</div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-label-group in-border">
                                <label for="manufacturer_id" class="form-label">Manufacturers</label>
                                <select class="form-select mb-3" name="manufacturer_id" required>
                                    <option value="" @if ($product->manufacturer_id == '') {{ 'selected' }} @endif
                                        selected disabled>
                                        Select One
                                    </option>
                                    @foreach ($manufacturers as $manufacturer)
                                        <option value="{{ $manufacturer->id }}"
                                            @if ($product->manufacturer_id == $manufacturer->id) {{ 'selected' }} @endif>
                                            {{ $manufacturer->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-tooltip">Select the Manufacturer!</div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="pricing_type" class="form-label">Pricing Type (價格類別)</label>
                                <select class="form-select mb-3" name="pricing_type" required>
                                    <option value="" @if ($product->pricing_type == '') {{ 'selected' }} @endif
                                        selected disabled>
                                        Select One
                                    </option>
                                    <option value="use_feed" @if ($product->pricing_type == 'use_feed') {{ 'selected' }} @endif>
                                        Use Feed (餵價)
                                    </option>
                                    <option value="fix_price"
                                        @if ($product->pricing_type == 'fix_price') {{ 'selected' }} @endif>
                                        Fix Price (定價)
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

                        <div class="col-md-4 col-sm-12" id="fixed_amount_div"
                            @if ($product->pricing_type == 'fix_price') style="display: block" @else style="display: none" @endif>
                            <div class="form-label-group in-border">
                                <label for="fixed_amount" class="form-label">Fixed Amount (固定金額)</label>

                                <input type="text"
                                    class="form-control @if ($errors->has('fixed_amount')) is-invalid @endif"
                                    id="fixed_amount" name="fixed_amount" placeholder="Please enter Fixed Amount"
                                    value="{{ $product->fixed_amount }}" required>
                                <div class="invalid-tooltip">
                                    @if ($errors->has('fixed_amount'))
                                        {{ $errors->first('fixed_amount') }}
                                    @else
                                        Fixed Amount is required!
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-md-4 col-sm-12" id="promo_amount_div"
                            @if ($product->pricing_type == 'use_feed') style="display: block" @else style="display: none" @endif>
                            <div class="form-label-group in-border">
                                <label for="promo_amount" class="form-label">Promo Amount</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('promo_amount')) is-invalid @endif"
                                    id="promo_amount" name="promo_amount" placeholder="Please enter Promo Amount"
                                    value="{{ $product->promo_amount }}" required>
                                <div class="invalid-tooltip">
                                    @if ($errors->has('promo_amount'))
                                        {{ $errors->first('promo_amount') }}
                                    @else
                                        Promo Amount is required!
                                    @endif
                                </div>
                            </div>
                        </div> --}}

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="surcharge_at_product" class="form-label">Mark up at Product Level</label>
                                <select id="surcharge_at_product" class="form-select mb-3" name="surcharge_at_product"
                                    required>
                                    <option value="" @if ($product->surcharge_at_product == '') {{ 'selected' }} @endif
                                        selected disabled>
                                        Select One
                                    </option>
                                    <option value="yes" @if ($product->surcharge_at_product == 'yes') {{ 'selected' }} @endif>
                                        Yes
                                    </option>
                                    <option value="no" @if ($product->surcharge_at_product == 'no') {{ 'selected' }} @endif>
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
                        <div id="mark_up_div"
                            @if ($product->surcharge_at_product == 'yes') style="display: block" @else style="display: none" @endif>

                            <div class="col-md-4 col-sm-12">
                                <div class="form-label-group in-border">
                                    <label for="markup_type" class="form-label">Mark up Type (價格類別)</label>
                                    <select id="markup_type" class="form-select mb-3" name="markup_type" required>
                                        <option value=""
                                            @if ($product->markup_type == '') {{ 'selected' }} @endif selected
                                            disabled>
                                            Select One
                                        </option>
                                        <option value="flat"
                                            @if ($product->markup_type == 'flat') {{ 'selected' }} @endif>
                                            Flat (餵價)
                                        </option>
                                        <option value="percentage"
                                            @if ($product->markup_type == 'percentage') {{ 'selected' }} @endif>
                                            Percentage (定價)
                                        </option>
                                    </select>
                                    <div class="invalid-tooltip">
                                        @if ($errors->has('markup_type'))
                                            {{ $errors->first('markup_type') }}
                                        @else
                                            Mark up Type is required!
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="form-label-group in-border">
                                    <label for="mark_up" class="form-label">Mark Up Amount</label>
                                    <input type=number step=any
                                        class="form-control @if ($errors->has('mark_up')) is-invalid @endif"
                                        id="mark_up" name="mark_up" placeholder="Please Enter Mark Up Amount"
                                        value="{{ $product->mark_up }}" required>
                                    <div class="invalid-tooltip">
                                        @if ($errors->has('mark_up'))
                                            {{ $errors->first('mark_up') }}
                                        @else
                                            Mark Up Amount is required!
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="weight" class="form-label">Product Weight (Ounces) (產品重量（盎司）)</label>
                                <input type="number" step="0.001"
                                    class="form-control @if ($errors->has('weight')) is-invalid @endif"
                                    id="weight" name="weight" placeholder="Please enter Weight of Product"
                                    value="{{ $product->weight }}" required>
                                <div class="invalid-tooltip">
                                    @if ($errors->has('weight'))
                                        {{ $errors->first('weight') }}
                                    @else
                                        Weight of Product is required!
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
                                    value="{{ $product->product_picture }}">
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
                                <textarea class="form-control" name="description" id="description" placeholder="Enter product description here...">{{ $product->description }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="mark_up" class="form-label">Tier 1 Commission (佣金層級-1)</label>
                                <input type=number step=any
                                    class="form-control @if ($errors->has('mark_up')) is-invalid @endif"
                                    id="mark_up" name="" placeholder="Please Enter Tier 1 Commission"
                                    value="{{ old('mark_up') }}">
                                <div class="invalid-tooltip">
                                    @if ($errors->has('mark_up'))
                                        {{ $errors->first('mark_up') }}
                                    @else
                                        Tier 1 Commission is required!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="mark_up" class="form-label">Tier 2 Commission (佣金層級-2)</label>
                                <input type=number step=any
                                    class="form-control @if ($errors->has('mark_up')) is-invalid @endif"
                                    id="mark_up" name="" placeholder="Please Enter Tier 2 Commission"
                                    value="{{ old('mark_up') }}">
                                <div class="invalid-tooltip">
                                    @if ($errors->has('mark_up'))
                                        {{ $errors->first('mark_up') }}
                                    @else
                                        Tier 2 Commission is required!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="mark_up" class="form-label">Tier 3 Commission (佣金層級-3)</label>
                                <input type=number step=any
                                    class="form-control @if ($errors->has('mark_up')) is-invalid @endif"
                                    id="mark_up" name="" placeholder="Please Enter Tier 3 Commission"
                                    value="{{ old('mark_up') }}">
                                <div class="invalid-tooltip">
                                    @if ($errors->has('mark_up'))
                                        {{ $errors->first('mark_up') }}
                                    @else
                                        Tier 3 Commission is required!
                                    @endif
                                </div>
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
@push('footer_scripts')
    <script>
        $(document).ready(function() {
            $("#pricing_type").change(function() {
                var selected_option = $('#pricing_type').val();
                if (selected_option == 'fix_price') {
                    document.getElementById("promo_amount_div").style.display = "none";
                    document.getElementById("fixed_amount_div").style.display = "block";
                }
                if (selected_option == 'use_feed') {
                    document.getElementById("fixed_amount_div").style.display = "none";
                    document.getElementById("promo_amount_div").style.display = "block";
                }
            });

            $("#surcharge_at_product").change(function() {
                var selected_option = $('#surcharge_at_product').val();
                if (selected_option == 'yes') {
                    document.getElementById("mark_up_div").style.display = "block";
                }
                if (selected_option == 'no') {
                    document.getElementById("mark_up_div").style.display = "none";
                }
            });
        })
    </script>
@endpush
