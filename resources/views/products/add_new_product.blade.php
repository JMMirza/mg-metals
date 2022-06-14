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
                    <div class="col-md-6 col-sm-12">
                        <div class="form-label-group in-border">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control @if ($errors->has('name')) is-invalid @endif"
                                id="name" name="name" placeholder="Product Name" value="{{ old('name') }}" required>
                            <div class="invalid-tooltip">
                                @if ($errors->has('name'))
                                    {{ $errors->first('name') }}
                                @else
                                    Product Name is required!
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="form-label-group in-border">
                            <label for="abbreviation" class="form-label">Abbreviation</label>
                            <input type="text" class="form-control @if ($errors->has('abbreviation')) is-invalid @endif"
                                id="abbreviation" name="abbreviation" placeholder="Abbreviation"
                                value="{{ old('abbreviation') }}">
                            <div class="invalid-tooltip">
                                @if ($errors->has('abbreviation'))
                                    {{ $errors->first('abbreviation') }}
                                @else
                                    Abbreviation is required!
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-label-group in-border">
                            <label for="catergory_id" class="form-label">Categories</label>
                            <select class="form-select mb-3" name="catergory_id" required>
                                <option value="" @if (old('catergory_id') == '') {{ 'selected' }} @endif selected
                                    disabled>
                                    Select One
                                </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if (old('catergory_id') == $category->id) {{ 'selected' }} @endif>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-tooltip">Select the Category!</div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="form-label-group in-border">
                            <label for="type" class="form-label">Type</label>
                            <input type="text" class="form-control @if ($errors->has('type')) is-invalid @endif"
                                id="type" name="type" placeholder="Please Enter Type" value="{{ old('type') }}"
                                required>
                            <div class="invalid-tooltip">
                                @if ($errors->has('type'))
                                    {{ $errors->first('type') }}
                                @else
                                    Type is required!
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-label-group in-border">
                            <label for="mark_up" class="form-label">Mark Up</label>
                            <input type=number step=any
                                class="form-control @if ($errors->has('mark_up')) is-invalid @endif" id="mark_up"
                                name="mark_up" placeholder="Please Enter Mark Up" value="{{ old('mark_up') }}"
                                required>
                            <div class="invalid-tooltip">
                                @if ($errors->has('mark_up'))
                                    {{ $errors->first('mark_up') }}
                                @else
                                    Mark Up is required!
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 col-sm-12">
                        <div class="form-label-group in-border">
                            <label for="product_picture" class="form-label">Product Picture</label>
                            <input type="file" class="form-control @if ($errors->has('product_picture')) is-invalid @endif"
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
                        <a href="{{ route('customers.index') }}" type="button"
                            class="btn btn-light bg-gradient waves-effect waves-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
