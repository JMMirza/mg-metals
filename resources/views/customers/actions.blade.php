{{-- @permission('edit-course') --}}
<a href="{{ route('customers.edit', $row->id) }}" class="btn btn-sm btn-success btn-icon waves-effect waves-light">
    <i class="mdi mdi-lead-pencil"></i>
</a>
{{-- @endpermission --}}

{{-- @permission('delete-course') --}}
<a href="{{ route('tier-hierarchy', $row->id) }}" class="btn btn-sm btn-primary btn-icon waves-effect waves-light">
    <i class="ri-list-check"></i>
</a>
@if ($row->user->is_verified == 1)
    <button id="verified" value="{{ $row->user->id }}" data-url="{{ route('verify-user') }}"
        class="btn btn-sm btn-success btn-label waves-effect waves-light"><i
            class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Active</button>
@else
    <button id="unverified" value="{{ $row->user->id }}" data-url="{{ route('verify-user') }}"
        class="btn btn-sm btn-warning btn-label waves-effect waves-light"><i
            class="ri-error-warning-line label-icon align-middle fs-16 me-2"></i> In-Active</button>
@endif
<a href="{{ route('customers.destroy', $row->id) }}" data-rowid="{{ $row->id }}" data-table="customers-data-table"
    class="btn btn-sm btn-danger btn-icon waves-effect waves-light delete-record">
    <i class="ri-delete-bin-5-line"></i>
</a>
{{-- @endpermission --}}

{{-- @if (!auth()->user()->hasPermission('edit-course') &&
    !auth()->user()->hasPermission('delete-course'))
    <span>N/A</span>
@endif --}}
