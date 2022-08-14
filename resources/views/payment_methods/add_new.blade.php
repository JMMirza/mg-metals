<div class="col-lg-12">
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Add New Payment Setup</h4>
        </div>

        <div class="card-body">

            <form class="row  needs-validation" action="{{ route('payment-methods.store') }}" method="POST"
                enctype='multipart/form-data' novalidate>
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-12  mb-3">
                        <div class="form-label-group in-border">
                            <label for="payment_method" class="form-label">Payment Method</label>
                            <select class="form-select form-control @if ($errors->has('payment_method')) is-invalid @endif"
                                name="payment_method" required>
                                <option value="" @if (old('payment_method') == '') {{ 'selected' }} @endif
                                    disabled>
                                    Select One
                                </option>
                                <option value="bank_transfer"
                                    @if (old('payment_method') == 'bank_transfer') {{ 'selected' }} @endif>
                                    Bank Transfer
                                </option>
                                <option value="credit_card"
                                    @if (old('payment_method') == 'credit_card') {{ 'selected' }} @endif>
                                    Credit Card
                                </option>
                            </select>
                            <div class="invalid-tooltip">
                                @if ($errors->has('payment_method'))
                                    {{ $errors->first('payment_method') }}
                                @else
                                    Payment Method is required!
                                @endif
                            </div>
                        </div>
                    </div>
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

                            <div class="col-md-12 col-sm-12 mb-3">
                                <div id="snow-editor-des" style="height: 300px;"></div>
                                <input type="hidden" name="description" id="description">
                                {{-- <div class="form-label-group in-border">
                                    <label for="description" class="form-label">Description (物品描述)</label>
                                    <textarea class="form-control mb-3" name="description" id="description" placeholder="Enter product description here...">{{ old('description') }}</textarea>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="product1" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 mb-3">
                                <div id="snow-editor-des-s-ch" style="height: 300px;"></div>
                                <input type="hidden" name="description_s_ch" id="description_s_ch">
                                {{-- <div class="form-label-group in-border">
                                    <label for="description" class="form-label">Description (Simplified
                                        Chinese)</label>
                                    <textarea class="form-control mb-3" name="description_s_ch" id="description"
                                        placeholder="Enter product description here...">{{ old('description_s_ch') }}</textarea>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="messages" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 mb-3">
                                <div id="snow-editor-des-ch" style="height: 300px;"></div>
                                <input type="hidden" name="description_ch" id="description_ch">
                                {{-- <div class="form-label-group in-border">
                                    <label for="description" class="form-label">Description (Traditional
                                        Chinese)</label>
                                    <textarea class="form-control mb-3" name="description_t_ch" id="description"
                                        placeholder="Enter product description here...">{{ old('description_t_ch') }}</textarea>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 text-end">
                    <button id="submit_btn" class="btn btn-primary" type="submit">Save Changes</button>
                    <a href="{{ route('payment-methods.index') }}" type="button"
                        class="btn btn-light bg-gradient waves-effect waves-light">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>