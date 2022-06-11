{{-- @permission('edit-course') --}}
<a href="{{ route('course.edit', $row->id) }}" class="btn btn-sm btn-success btn-icon waves-effect waves-light">
    <i class="mdi mdi-lead-pencil"></i>
</a>
{{-- @endpermission --}}

{{-- @permission('delete-course') --}}
<a href="{{ route('course.destroy') }}" data-rowid="{{ $row->id }}" data-table="course-data-table"
    class="btn btn-sm btn-danger btn-icon waves-effect waves-light delete-record-post-method">
    <i class="ri-delete-bin-5-line"></i>
</a>
{{-- @endpermission --}}

{{-- @if (!auth()->user()->hasPermission('edit-course') &&
    !auth()->user()->hasPermission('delete-course'))
    <span>N/A</span>
@endif --}}
