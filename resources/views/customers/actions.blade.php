{{-- @permission('edit-course') --}}
<a href="{{ route('customers.edit', $row->id) }}" class="btn btn-sm btn-success btn-icon waves-effect waves-light">
    <i class="mdi mdi-lead-pencil"></i>
</a>
{{-- @endpermission --}}

{{-- @permission('delete-course') --}}
<a href="{{ route('customers.destroy', $row->id) }}" data-rowid="{{ $row->id }}" data-table="customers-data-table"
    class="btn btn-sm btn-danger btn-icon waves-effect waves-light delete-record">
    <i class="ri-delete-bin-5-line"></i>
</a>
<a href="{{ route('customer-product', $row->id) }}" class="btn btn-sm btn-primary btn-icon waves-effect waves-light">
    <i class=" ri-customer-service-2-fill"></i>
</a>
{{-- @endpermission --}}

{{-- @if (!auth()->user()->hasPermission('edit-course') &&
    !auth()->user()->hasPermission('delete-course'))
    <span>N/A</span>
@endif --}}
