@extends('layouts.app')
<?php
use App\Http\Controllers\EmployeeController;
use App\Models\Employees;
?>

@section('content')

<div class="container">
  <h2 class="text-center">Entry added successfully</h2>
  <br>
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
    <div style="display: flex; justify-content: center;">
    <a href="{{ route('employees') }}"><button type="button" class="btn btn-outline-secondary">Return</button>
    </div>
</div>

@endsection