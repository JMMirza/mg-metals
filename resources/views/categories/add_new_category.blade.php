<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Add Category</h4>
            </div>

            <div class="card-body">
                <form class="row g-3 needs-validation" action="{{ route('categories.store') }}" method="POST"
                    novalidate>
                    @csrf
                    <div class="col-md-4 col-sm-12">
                        <div class="form-label-group in-border">
                            <label for="name" class="form-label">First Name</label>
                            <input type="text" class="form-control @if ($errors->has('name')) is-invalid @endif"
                                id="name" name="name" placeholder="Category name" value="{{ old('name') }}" required>
                            <div class="invalid-tooltip">
                                @if ($errors->has('name'))
                                    {{ $errors->first('name') }}
                                @else
                                    Name is required!
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-label-group in-border">
                            <label for="abbreviation" class="form-label">Abbreviation</label>
                            <input type="text" class="form-control @if ($errors->has('abbreviation')) is-invalid @endif"
                                id="abbreviation" name="abbreviation" placeholder="Abbreviation"
                                value="{{ old('abbreviation') }}">
                            <div class="invalid-tooltip">
                                {{ $errors->first('abbreviation') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-label-group in-border">
                            <label for="user_id" class="form-label">Categories</label>
                            <select class="form-select mb-3" name="parent_id" required>
                                <option value="" @if (old('parent_id') == '') {{ 'selected' }} @endif selected
                                    disabled>
                                    Select One
                                </option>
                                @foreach ($categories as $user)
                                    <option value="{{ $user->id }}"
                                        @if (old('parent_id') == $user->id) {{ 'selected' }} @endif>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-tooltip">Select the User!</div>
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
