@extends('layouts.app')
<?php
use App\Http\Controllers\CompanyController;
use App\Models\Companies;
?>
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Editing Company</h1>
 
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('company.update', $company->id) }}" enctype="multipart/form-data">
            @method('PATCH') 
            @csrf
            <div class="form-group">
 
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $company->name }}" />
            </div>
 
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value="{{ $company->email }}" />
            </div>
 
            <div class="form-group">
                <label for="logo">Logo:</label>
                <input type="file" class="form-control" name="logo" value="{{ $company->logo }}" />
            </div>
            <div class="form-group">
                <label for="website">Website:</label>
                <input type="text" class="form-control" name="website" value="{{ $company->website }}" />
            </div>
            <button style="margin-top: 10px;" type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection