@extends('layouts.companies')

@section('title', 'Company Details')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Company Details</h2>
                <a class="btn btn-primary" href="{{ route('companies.index') }}">Back</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group mb-3">
                        <strong>Name:</strong>
                        <p>{{ $company->name }}</p>
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group mb-3">
                        <strong>Email:</strong>
                        <p>{{ $company->email }}</p>
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group mb-3">
                        <strong>Logo:</strong>
                        @if($company->logo)
                            <br>
                            <img src="{{ $company->logo_url }}" alt="{{ $company->name }}" class="img-thumbnail" style="max-width: 200px;">
                        @else
                            <p class="text-muted">No logo uploaded</p>
                        @endif
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group mb-3">
                        <strong>Website:</strong>
                        <p><a href="{{ $company->website }}" target="_blank" class="text-decoration-none">{{ $company->website }}</a></p>
                    </div>
                </div>
            </div>
            
            <div class="mt-3">
                <a class="btn btn-primary" href="{{ route('companies.edit', $company->id) }}">Edit</a>
            </div>
        </div>
    </div>
@endsection