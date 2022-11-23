@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div style="display: flex; justify-content: center; gap: 20px; padding-bottom: 25px">
                <a href="{{ route('employees') }}"><button type="button" class="btn btn-outline-secondary">Manage Employees</button>
                <a href="{{ route('companies') }}"><button type="button" class="btn btn-outline-secondary">Manage Companies</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
