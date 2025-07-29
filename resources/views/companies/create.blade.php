@extends('layouts.companies')

@section('title', 'Add New Company')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Add New Company</h2>
                <a class="btn btn-primary" href="{{ route('companies.index') }}">Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group mb-3">
                            <strong>Name: <span class="text-danger">*</span></strong>
                            <input type="text" name="name" class="form-control" placeholder="Company Name" value="{{ old('name') }}">
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group mb-3">
                            <strong>Email: <span class="text-danger">*</span></strong>
                            <input type="email" name="email" class="form-control" placeholder="Company Email" value="{{ old('email') }}">
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group mb-3">
                            <strong>Logo: <small class="text-muted">(minimum 100x100 pixels)</small></strong>
                            <input type="file" name="logo" class="form-control" accept="image/*">
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group mb-3">
                            <strong>Website: <span class="text-danger">*</span></strong>
                            <input type="url" name="website" class="form-control" placeholder="https://example.com" value="{{ old('website') }}">
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection