<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Update Agent</h4>
            </div>

            <div class="card-body">
                <form class="row g-3 needs-validation" action="{{ route('agents.update', $agent->id) }}" method="POST"
                    enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <div class="form-label-group in-border">
                            <label for="user_id" class="form-label">Agents</label>
                            <select class="form-select mb-3" name="agent_id" required>
                                <option value="" @if ($agent->parent_id == '') {{ 'selected' }} @endif selected
                                    disabled>
                                    Select One
                                </option>
                                @foreach ($agents as $user)
                                    <option value="{{ $user->id }}"
                                        @if ($agent->parent_id == $user->id) {{ 'selected' }} @endif>
                                        {{ $user->user->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-tooltip">Select the Agent!</div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-label-group in-border">
                            <label for="user_id" class="form-label">Users</label>
                            <select class="form-select mb-3" name="user_id" required>
                                <option value="" @if ($agent->user_id == '') {{ 'selected' }} @endif selected
                                    disabled>
                                    Select One
                                </option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        @if ($agent->user_id == $user->id) {{ 'selected' }} @endif>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>

                            <div class="invalid-tooltip">Select the User!</div>
                        </div>
                    </div>

                    <div class="col-12 text-end">
                        <button class="btn btn-primary" type="submit">Save Changes</button>
                        <a href="{{ route('agents.index') }}" type="button"
                            class="btn btn-light bg-gradient waves-effect waves-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
