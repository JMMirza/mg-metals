@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Add Products</h4>

                    <div class="flex-shrink-0">
                        <a href="{{ route('products.index') }}" class="btn btn-success btn-label btn-sm">
                            <i class="bx bx-arrow-back label-icon align-middle fs-16 me-2"></i> Back
                        </a>
                    </div>
                </div>

                <div class="card-body">

                    <form class="row  needs-validation" action="{{ route('products.store') }}" method="POST"
                        enctype='multipart/form-data' novalidate>
                        @csrf

                        <div class="col-md-4 col-sm-12 mb-3">
                            <div class="form-label-group in-border">
                                <label for="sku" class="form-label">SKU (庫存單位)</label>
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
                                <label for="catergory_id" class="form-label">Categories (物品類別)</label>
                                <select class="form-select form-control mb-3" name="catergory_id" required>
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
                                <select class="form-select form-control mb-3" name="manufacturer_id" required>
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

                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-pills nav-justified mb-3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab"
                                            aria-selected="true">
                                            English
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#product1" role="tab"
                                            aria-selected="false">
                                            Simplified Chinese
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab"
                                            aria-selected="false">
                                            Traditional Chinese
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12  mb-3">
                                        <div class="form-label-group in-border">
                                            <label for="name" class="form-label">Product Name (物品名稱)</label>
                                            <input type="text"
                                                class="form-control @if ($errors->has('name')) is-invalid @endif"
                                                id="name" name="name" placeholder="Product Name"
                                                value="{{ old('name') }}" required>
                                            <div class="invalid-tooltip">
                                                @if ($errors->has('name'))
                                                    {{ $errors->first('name') }}
                                                @else
                                                    Product Name is required!
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-label-group in-border">
                                            <label for="description" class="form-label">Description (物品描述)</label>
                                            <textarea class="form-control mb-3" name="description" id="description" placeholder="Enter product description here...">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="product1" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12  mb-3">
                                        <div class="form-label-group in-border">
                                            <label for="name" class="form-label">Product Name (Simplified
                                                Chinese)</label>
                                            <input type="text"
                                                class="form-control @if ($errors->has('name_s_ch')) is-invalid @endif"
                                                id="name_s_ch" name="name_s_ch"
                                                placeholder="Product name (Simplified Chinese)"
                                                value="{{ old('name_s_ch') }}">
                                            <div class="invalid-tooltip">
                                                @if ($errors->has('name_s_ch'))
                                                    {{ $errors->first('name_s_ch') }}
                                                @else
                                                    Name (Simplified Chinese) is required!
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-label-group in-border">
                                            <label for="description" class="form-label">Description (Simplified
                                                Chinese)</label>
                                            <textarea class="form-control mb-3" name="description_s_ch" id="description"
                                                placeholder="Enter product description here...">{{ old('description_s_ch') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="messages" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12  mb-3">
                                        <div class="form-label-group in-border">
                                            <label for="name" class="form-label">Product Name (Traditional
                                                Chinese)</label>
                                            <input type="text"
                                                class="form-control @if ($errors->has('name_t_ch')) is-invalid @endif"
                                                id="name_t_ch" name="name_t_ch"
                                                placeholder="Product name (Traditional Chinese)"
                                                value="{{ old('name_t_ch') }}">
                                            <div class="invalid-tooltip">
                                                @if ($errors->has('name_t_ch'))
                                                    {{ $errors->first('name_t_ch') }}
                                                @else
                                                    Name (Traditional Chinese) is required!
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-label-group in-border">
                                            <label for="description" class="form-label">Description (Traditional
                                                Chinese)</label>
                                            <textarea class="form-control mb-3" name="description_t_ch" id="description"
                                                placeholder="Enter product description here...">{{ old('description_t_ch') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-6 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="pricing_type" class="form-label">Pricing Type (價格類別)</label>
                                <select id="pricing_type" class="form-select form-control mb-3" name="pricing_type"
                                    required>
                                    <option value="" @if (old('pricing_type') == '') {{ 'selected' }} @endif
                                        selected disabled>
                                        Select One
                                    </option>
                                    <option value="use_feed"
                                        @if (old('pricing_type') == 'use_feed') {{ 'selected' }} @endif>
                                        Use Feed (餵價)
                                    </option>
                                    <option value="fix_price"
                                        @if (old('pricing_type') == 'fix_price') {{ 'selected' }} @endif>
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

                        <div class="col-md-6 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="fixed_amount" class="form-label">Fixed Amount (固定金額)</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">USD</span>
                                    </div>
                                    <input type="decimal" step="0.001"
                                        class="form-control @if ($errors->has('fixed_amount')) is-invalid @endif"
                                        id="fixed_amount" name="fixed_amount" placeholder="Please enter Fixed Amount"
                                        value="{{ old('fixed_amount') }}" disabled>
                                </div>
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
                                <label for="weight_unit" class="form-label">Weight Unit
                                </label>
                                <select id="weight_unit" class="form-select form-control mb-3" name="weight_unit"
                                    required>
                                    <option value="" @if (old('weight_unit') == '') {{ 'selected' }} @endif
                                        selected disabled>
                                        Select One
                                    </option>
                                    <option value="grams" @if (old('weight_unit') == 'grams') {{ 'selected' }} @endif>
                                        Grams
                                    </option>
                                    <option value="ounces" @if (old('weight_unit') == 'ounces') {{ 'selected' }} @endif>
                                        Ounces
                                    </option>
                                </select>
                                <div class="invalid-tooltip">
                                    @if ($errors->has('weight_unit'))
                                        {{ $errors->first('weight_unit') }}
                                    @else
                                        Weight Unit is required!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="weight" class="form-label">Product Weight (Grams)
                                    (產品重量（盎司）)</label>
                                <input type="decimal"
                                    class="form-control @if ($errors->has('weight')) is-invalid @endif"
                                    id="weight_in_grams" name="weight_in_grams"
                                    placeholder="Please enter Weight of Product" value="{{ old('weight_in_grams') }}"
                                    disabled>
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
                                <label for="weight" class="form-label">Product Weight (Ounces)
                                    (產品重量（盎司）)</label>
                                <input type="decimal"
                                    class="form-control @if ($errors->has('weight')) is-invalid @endif"
                                    id="weight_in_ounces" name="weight" placeholder="Please enter Weight of Product"
                                    value="{{ old('weight') }}" readonly>
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
                                <label for="surcharge_at_product" class="form-label">Mark up at Product
                                    Level</label>
                                <select id="surcharge_at_product" class="form-select form-control mb-3"
                                    name="surcharge_at_product" required>
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
                                        Mark up at Product Level is required!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="markup_type" class="form-label">Mark up Type (加價類型)</label>
                                <select id="markup_type" class="form-select form-control mb-3" name="markup_type"
                                    disabled>
                                    <option value="" @if (old('markup_type') == '') {{ 'selected' }} @endif
                                        selected disabled>
                                        Select One
                                    </option>
                                    <option value="flat" @if (old('markup_type') == 'flat') {{ 'selected' }} @endif>
                                        Flat (餵價)
                                    </option>
                                    <option value="percentage"
                                        @if (old('markup_type') == 'percentage') {{ 'selected' }} @endif>
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
                                    value="{{ old('mark_up') }}" disabled>
                                <div class="invalid-tooltip">
                                    @if ($errors->has('mark_up'))
                                        {{ $errors->first('mark_up') }}
                                    @else
                                        Mark Up Amount is required!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8 col-sm-12 mb-3">
                            <div class="form-label-group in-border">
                                <label for="product_picture" class="form-label">Product Picture (產品圖片)</label>
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

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="session_duration" class="form-label">Session Duration</label>
                                <div class="input-group">
                                    <input type="decimal" step="0.001"
                                        class="form-control @if ($errors->has('session_duration')) is-invalid @endif"
                                        id="session_duration" name="session_duration"
                                        placeholder="Please enter Session Duration"
                                        value="{{ old('session_duration') }}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Mins</span>
                                    </div>
                                </div>
                                <div class="invalid-tooltip">
                                    @if ($errors->has('session_duration'))
                                        {{ $errors->first('session_duration') }}
                                    @else
                                        Session Duration is empty or incorrect!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="status" class="form-label">Status</label>
                                <select id="" class="form-select form-control mb-3" name="status">
                                    <option value="" @if (old('status') == '') {{ 'selected' }} @endif
                                        selected disabled>
                                        Select One
                                    </option>
                                    <option value="active" @if (old('status') == 'active') {{ 'selected' }} @endif>
                                        Active
                                    </option>
                                    <option value="inactive"
                                        @if (old('status') == 'inactive') {{ 'selected' }} @endif>
                                        In-Active
                                    </option>
                                </select>
                                <div class="invalid-tooltip">
                                    @if ($errors->has('status'))
                                        {{ $errors->first('status') }}
                                    @else
                                        Status is required!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12 mb-3">
                            <div class="form-label-group in-border">
                                <label for="on_hold" class="form-label">Minimum in Stock</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('on_hold')) is-invalid @endif"
                                    id="on_hold" name="on_hold" placeholder="Enter Minimum in Stock"
                                    value="{{ old('on_hold') }}">
                                <div class="invalid-tooltip">
                                    @if ($errors->has('on_hold'))
                                        {{ $errors->first('on_hold') }}
                                    @else
                                        Minimum in Stock is required!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="status" class="form-label">Valid Till</label>
                                <input type="date" name="valid_till" value="{{ old('valid_till') }}"
                                    class="form-control mb-3 @if ($errors->has('valid_till')) is-invalid @endif">
                                <div class="invalid-tooltip">
                                    @if ($errors->has('valid_till'))
                                        {{ $errors->first('valid_till') }}
                                    @else
                                        Valid till is required!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div id="invalid-tooltip-tiers" style="font-size:15px ;text-align:center;color: red">
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="tier_commission_1" class="form-label">Tier 1 Commission
                                    (佣金層級-1)</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">%</span>
                                    </div>
                                    <input type=number step=any name="tier_commission_1"
                                        class="form-control @if ($errors->has('tier_commission_1')) is-invalid @endif"
                                        id="tier_commission_1" placeholder="Please Enter Tier 1 Commission"
                                        value="{{ old('tier_commission_1') }}">
                                </div>

                                <div class="invalid-tooltip">
                                    @if ($errors->has('tier_commission_1'))
                                        {{ $errors->first('tier_commission_1') }}
                                    @else
                                        Tier 1 Commission is required!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="tier_commission_2" class="form-label">Tier 2 Commission
                                    (佣金層級-2)</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">%</span>
                                    </div>
                                    <input type=number step=any name="tier_commission_2"
                                        class="form-control @if ($errors->has('tier_commission_2')) is-invalid @endif"
                                        id="tier_commission_2" placeholder="Please Enter Tier 2 Commission"
                                        value="{{ old('tier_commission_2') }}">
                                </div>

                                <div class="invalid-tooltip">
                                    @if ($errors->has('tier_commission_2'))
                                        {{ $errors->first('tier_commission_2') }}
                                    @else
                                        Tier 2 Commission is required!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="tier_commission_3" class="form-label">Tier 3 Commission
                                    (佣金層級-3)</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">%</span>
                                    </div>
                                    <input type=number step=any
                                        class="form-control mb-3 @if ($errors->has('tier_commission_3')) is-invalid @endif"
                                        id="tier_commission_3" name="tier_commission_3"
                                        placeholder="Please Enter Tier 3 Commission"
                                        value="{{ old('tier_commission_3') }}">
                                </div>

                                <div class="invalid-tooltip">
                                    @if ($errors->has('tier_commission_3'))
                                        {{ $errors->first('tier_commission_3') }}
                                    @else
                                        Tier 3 Commission is required!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="tier_commission_4" class="form-label">Tier 4 Commission
                                    (佣金層級-4)</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">%</span>
                                    </div>
                                    <input type=number step=any
                                        class="form-control mb-3 @if ($errors->has('tier_commission_4')) is-invalid @endif"
                                        id="tier_commission_4" name="tier_commission_4"
                                        placeholder="Please Enter Tier 4 Commission"
                                        value="{{ old('tier_commission_4') }}">
                                </div>

                                <div class="invalid-tooltip">
                                    @if ($errors->has('tier_commission_4'))
                                        {{ $errors->first('tier_commission_4') }}
                                    @else
                                        Tier 4 Commission is required!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-label-group in-border">
                                <label for="tier_commission_5" class="form-label">Tier 5 Commission
                                    (佣金層級-5)</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">%</span>
                                    </div>
                                    <input type=number step=any
                                        class="form-control mb-3 @if ($errors->has('tier_commission_5')) is-invalid @endif"
                                        id="tier_commission_5" name="tier_commission_5"
                                        placeholder="Please Enter Tier 5 Commission"
                                        value="{{ old('tier_commission_5') }}" readonly>
                                </div>
                                <div class="invalid-tooltip">
                                    @if ($errors->has('tier_commission_5'))
                                        {{ $errors->first('tier_commission_5') }}
                                    @else
                                        Tier 5 Commission is required!
                                    @endif
                                </div>

                            </div>
                        </div>

                        <div class="col-12 text-end">
                            <button id="submit_btn" class="btn btn-primary" type="submit">Save Changes</button>
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
                    // document.getElementById("promo_amount_div").style.display = "none";
                    $('#fixed_amount').attr('disabled', false);
                }
                if (selected_option == 'use_feed') {
                    $('#fixed_amount').attr('disabled', true);
                    $('#fixed_amount').val(0);
                    // document.getElementById("promo_amount_div").style.display = "block";
                }
            });

            $("#weight_unit").change(function() {
                var selected_option = $('#weight_unit').val();
                if (selected_option == 'grams') {
                    // document.getElementById("promo_amount_div").style.display = "none";
                    $("#weight_in_grams").attr("disabled", false);
                    $("#weight_in_ounces").attr("readonly", true);
                    // $("#weight_in_ounces").val(0);
                }
                if (selected_option == 'ounces') {
                    $("#weight_in_grams").attr("disabled", true);
                    $("#weight_in_grams").val(0);
                    $("#weight_in_ounces").attr("readonly", false);
                    // document.getElementById("promo_amount_div").style.display = "block";
                }
            });

            $("#weight_in_grams").change(function() {
                var value = $("#weight_in_grams").val();
                value = parseFloat(value)
                $("#weight_in_ounces").val(value * 0.0321507);
            });

            $("#surcharge_at_product").change(function() {
                var selected_option = $('#surcharge_at_product').val();
                if (selected_option == 'yes') {
                    $('#markup_type').attr('disabled', false);
                    $('#mark_up').attr('disabled', false);
                }
                if (selected_option == 'no') {
                    $('#markup_type').attr('disabled', true);
                    $('#mark_up').attr('disabled', true);
                }
            });
            var tier_1_init = $('#tier_commission_1').val();
            if (tier_1_init) {
                tier_1_init = parseInt(tier_1_init);
            }
            var tier_2_init = $('#tier_commission_2').val();
            if (tier_2_init) {
                tier_2_init = parseInt(tier_2_init);
            }
            var tier_3_init = $('#tier_commission_3').val();
            if (tier_3_init) {
                tier_3_init = parseInt(tier_3_init);
            }
            var tier_4_init = $('#tier_commission_4').val();
            if (tier_4_init) {
                tier_4_init = parseInt(tier_4_init);
            }
            var sum = tier_1_init + tier_2_init + tier_3_init + tier_4_init;
            $('#tier_commission_5').val(100 - sum);

            $('#tier_commission_1').change(function() {
                var tier_1 = parseInt($('#tier_commission_1').val());
                var tier_2 = $('#tier_commission_2').val();
                var tier_3 = $('#tier_commission_3').val();
                var tier_4 = $('#tier_commission_4').val();
                if (tier_2) {
                    tier_2 = parseInt(tier_2);
                }
                if (tier_3) {
                    tier_3 = parseInt(tier_3);
                }
                if (tier_4) {
                    tier_4 = parseInt(tier_4);
                }
                var sum = tier_1 + tier_2 + tier_3 + tier_4;

                if (sum <= 100) {
                    $('#submit_btn').attr('disabled', false);
                    $('#tier_commission_5').val(100 - sum);
                } else {
                    $('#submit_btn').attr('disabled', true);
                    $("#tier_commission_1").addClass("is-invalid");
                    $("#tier_commission_2").addClass("is-invalid");
                    $("#tier_commission_3").addClass("is-invalid");
                    $("#tier_commission_4").addClass("is-invalid");
                    $('#invalid-tooltip-tiers').html(`<strong>
                                    Value Exeed from the limit
                                    </strong>`);
                }
            });

            $('#tier_commission_2').change(function() {
                var tier_2 = parseInt($('#tier_commission_2').val());
                var tier_1 = $('#tier_commission_1').val();
                var tier_3 = $('#tier_commission_3').val();
                var tier_4 = $('#tier_commission_4').val();
                if (tier_1) {
                    // alert('tier1', tier_1);
                    tier_1 = parseInt(tier_1);
                }
                if (tier_3) {
                    tier_3 = parseInt(tier_3);
                }
                if (tier_4) {
                    tier_4 = parseInt(tier_4);
                }

                var sum = tier_1 + tier_2 + tier_3 + tier_4;

                if (sum <= 100) {
                    $('#submit_btn').attr('disabled', false);
                    $('#tier_commission_5').val(100 - sum);
                } else {
                    $('#submit_btn').attr('disabled', true);
                    $("#tier_commission_1").addClass("is-invalid");
                    $("#tier_commission_2").addClass("is-invalid");
                    $("#tier_commission_3").addClass("is-invalid");
                    $("#tier_commission_4").addClass("is-invalid");
                    $('#invalid-tooltip-tiers').html(`<strong>
                                    Value Exeed from the limit
                                    </strong>`);
                }
            });

            $('#tier_commission_3').change(function() {
                var tier_1 = $('#tier_commission_1').val();
                var tier_2 = $('#tier_commission_2').val();
                var tier_4 = $('#tier_commission_4').val();
                var tier_3 = parseInt($('#tier_commission_3').val());
                if (tier_2) {
                    tier_2 = parseInt(tier_2);
                }
                if (tier_1) {
                    tier_1 = parseInt(tier_1);
                }
                if (tier_4) {
                    tier_4 = parseInt(tier_4);
                }
                var sum = tier_1 + tier_2 + tier_3 + tier_4;
                // alert(sum);
                if (sum <= 100) {
                    $('#submit_btn').attr('disabled', false);
                    $('#tier_commission_5').val(100 - sum);
                } else {
                    $('#submit_btn').attr('disabled', true);
                    $("#tier_commission_1").addClass("is-invalid");
                    $("#tier_commission_2").addClass("is-invalid");
                    $("#tier_commission_3").addClass("is-invalid");
                    $("#tier_commission_4").addClass("is-invalid");
                    $('#invalid-tooltip-tiers').html(`<strong>
                                    Value Exeed from the limit
                                    </strong>`);
                }
            });

            $('#tier_commission_4').change(function() {
                var tier_1 = $('#tier_commission_1').val();
                var tier_2 = $('#tier_commission_2').val();
                var tier_3 = $('#tier_commission_3').val();
                var tier_4 = parseInt($('#tier_commission_4').val());
                if (tier_2) {
                    tier_2 = parseInt(tier_2);
                }
                if (tier_1) {
                    tier_1 = parseInt(tier_1);
                }
                if (tier_3) {
                    tier_3 = parseInt(tier_3);
                }
                var sum = tier_1 + tier_2 + tier_3 + tier_4;
                if (sum <= 100) {
                    $('#submit_btn').attr('disabled', false);
                    $('#tier_commission_5').val(100 - sum);
                } else {
                    $('#submit_btn').attr('disabled', true);
                    $("#tier_commission_1").addClass("is-invalid");
                    $("#tier_commission_2").addClass("is-invalid");
                    $("#tier_commission_3").addClass("is-invalid");
                    $("#tier_commission_4").addClass("is-invalid");
                    $('#invalid-tooltip-tiers').html(`<strong>
                                    Value Exeed from the limit
                                    </strong>`);
                }
            });
        });
    </script>
@endpush
