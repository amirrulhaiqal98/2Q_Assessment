@extends('layouts.companies')

@section('title', 'Companies List')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Companies</h2>
                <a class="btn btn-success" href="{{ route('companies.create') }}">Add New Company</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th width="280px">Action</th>
                </tr>
                @forelse ($companies as $company)
                <tr>
                    <td>
                        @if($company->logo)
                            <img src="{{ $company->logo_url }}" alt="{{ $company->name }}" width="50" height="50" class="img-thumbnail">
                        @else
                            <span class="text-muted">No Logo</span>
                        @endif
                    </td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>
                        <a href="{{ $company->website }}" target="_blank" class="text-decoration-none">
                            {{ $company->website }}
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="delete-form" data-company-name="{{ $company->name }}">
                            <a class="btn btn-info btn-sm" href="{{ route('companies.show', $company->id) }}">Show</a>
                            <a class="btn btn-primary btn-sm" href="{{ route('companies.edit', $company->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No companies found.</td>
                </tr>
                @endforelse
            </table>
            
            {!! $companies->links() !!}
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Success Toast
        @if(session('success'))
            Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            }).fire({
                icon: 'success',
                title: @json(session('success'))
            });
        @endif

        // Delete Confirmation
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                const companyName = this.getAttribute('data-company-name');
                Swal.fire({
                    title: 'Are you sure?',
                    text: `You are about to delete ${companyName}. You won't be able to revert this!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                })
            });
        });
    });
</script>
@endpush