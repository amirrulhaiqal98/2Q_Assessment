<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Companies</h2>
                    <a class="btn btn-success" href="{{ route('companies.create') }}">Add New Company</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

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
                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                <a class="btn btn-info btn-sm" href="{{ route('companies.show', $company->id) }}">Show</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('companies.edit', $company->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
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
    </div>
</body>
</html>