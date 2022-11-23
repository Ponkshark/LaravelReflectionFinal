@extends('layouts.app')
<?php
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\CompanyController;
use App\Models\Companies;
use Illuminate\Support\Str;
?>

@section('content')

<div class="container">
  <h2 class="text-center">Company Database</h2>
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
  <form action = "/companies/create" method = "post" enctype="multipart/form-data" class="form-group" style="width:70%; margin-left:15%;">

  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

    <label class="form-group">Company Name:*</label>
    <input type="text" class="form-control" placeholder="Company Name" name="name">
    <label style="margin-top:10px;">Email:*</label>
    <input type="text" class="form-control" placeholder="Email" name="email">
    <label style="margin-top:10px;">Logo:*</label>
    <input type="file" class="form-control" placeholder="Logo" name="logo">
    <label style="margin-top:10px;">Website:*</label>
    <input type="text" class="form-control" placeholder="Website" name="website">
    <button type="submit" style="margin-bottom:20px; margin-top:20px" value = "Add company" class="btn btn-primary">Submit</button>
  </form>
</div>
<div style="text-align: center; margin-bottom:10px">
        {{$companies->links()}}
</div>

<div style="margin-right:50px; margin-left:50px">
<table class="table table-striped table-bordered table-light">
    <tr>
        <th>Company Name</th>
        <th>Email</th>
        <th>Logo</th>
        <th>Website</th>
        <th>Update Company</th>
        <th>Delete Company</th>
    </tr>
    @foreach ($companies as $c)
    <tr>
        <td>{{$c->name}}</td>
        <td>{{$c->email}}</td>
        <td><img style="height: 100px; width: 100px;" src="{{ asset('storage/' .  Illuminate\Support\Str::substr($c->logo, 7)) }}"></td>
        <td>{{$c->website}}</td>
        <td style="text-align: center;">
                <a href="{{ route('company.edit',$c->id)}}" class="btn btn-primary">Edit</a>
        </td>
        <td>
                <form style="text-align: center;" action="{{ route('company.destroy', $c->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
        </td>
    <tr>
    @endforeach
</table>
</div>
@endsection