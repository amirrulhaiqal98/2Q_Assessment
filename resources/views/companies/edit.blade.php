@extends('layouts.companies')

@section('title', 'Edit Company')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Edit Company</h2>
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
            <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group mb-3">
                            <strong>Name: <span class="text-danger">*</span></strong>
                            <input type="text" name="name" value="{{ old('name', $company->name) }}" class="form-control" placeholder="Company Name">
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group mb-3">
                            <strong>Email: <span class="text-danger">*</span></strong>
                            <input type="email" name="email" value="{{ old('email', $company->email) }}" class="form-control" placeholder="Company Email">
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group mb-3">
                            <strong>Logo: <small class="text-muted">(minimum 100x100 pixels)</small></strong>
                            <input type="file" name="logo" class="form-control" accept="image/*">
                            @if($company->logo)
                                <div class="mt-2">
                                    <small class="text-muted">Current logo:</small><br>
                                    <img src="{{ $company->logo_url }}" alt="{{ $company->name }}" class="img-thumbnail" style="max-width: 100px;">
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group mb-3">
                            <strong>Website: <span class="text-danger">*</span></strong>
                            <input type="url" name="website" value="{{ old('website', $company->website) }}" class="form-control" placeholder="https://example.com">
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection