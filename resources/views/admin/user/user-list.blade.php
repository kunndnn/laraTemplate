@extends('admin.layouts.master')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account/</span>Users List</h4>
    <div class="card">
        <h5 class="card-header">Users List</h5>
        <div class="table-responsive text-nowrap pb-2">
            {{-- <table class="table"> --}}
                <table class="table" style="width:100%" id="user_list">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Full Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Create At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($users as $key => $item)
                        <tr>
                            <td>{{ '#' . $key + 1 }}</td>
                            <td>
                                <strong>{{ Str::ucfirst($item->first_name) . ' ' . Str::ucfirst($item->last_name ??
                                    ' ') }} </strong>
                            </td>
                            <td>
                                @if ($item->profile_image)
                                <img src="{{ $item->profile_image }}" alt="user" style="width:35px"
                                    class="rounded mr-2">
                                @else
                                <img src="{{ asset('admin/assets/img/avatars/1.png') }}" alt="user" style="width:35px"
                                    class="rounded mr-2">
                                @endif
                            </td>
                            <td><span class="badge bg-label-primary me-1">Active</span></td>
                            <td>
                                {{ $item->created_at->format('d/m/Y') }}
                            </td>
                            <td>
                                {{-- <a onclick="confirmDelete('{{ route('delete.user', $item->id) }}')">
                                    <i class="bx bx-trash me-1"></i>Delete</a> --}}
                                <button type="button" class="btn btn-danger deleteUserBtn" data-href="{{ route('delete.user', $item->id) }}">
                                    <i class="bx bx-trash me-1"></i>Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>

    </div>
</div>

@endsection
@push('script')
<script>
    $('.deleteUserBtn').click(function (){
       let deleteUrl = $(this).data('href');
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = deleteUrl;
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                });
            }
        });
    });
    $(function() {
        $('#user_list').DataTable({
            pageLength: 10,
        });
    });
</script>
@endpush
