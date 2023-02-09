@extends('layouts.app')
<?php
use App\Http\Controllers\EmployeeController;
use App\Models\Employees;
?>

@section('content')

<div class="container">
  <h2 class="text-center">Employee Database</h2>
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
  <form action = "/employees/create" method = "post" class="form-group" style="width:70%; margin-left:15%;" action="/action_page.php">

  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

    <label class="form-group">First Name:*</label>
    <input type="text" class="form-control" placeholder="First Name" name="firstname">
    <label style="margin-top:10px;">Last Name:*</label>
    <input type="text" class="form-control" placeholder="Last Name" name="lastname">
    <label style="margin-top:10px;">Company:*</label>
    <input type="text" class="form-control" placeholder="Company" name="company">
    <label style="margin-top:10px;">Email:*</label>
    <input type="text" class="form-control" placeholder="Email" name="email">
    <label style="margin-top:10px;">Phone:*</label>
    <input type="text" class="form-control" placeholder="Phone" name="phone">
    <button type="submit" style="margin-bottom:20px; margin-top:20px" value = "Add employee" class="btn btn-primary">Submit</button>
  </form>
</div>
<div style="text-align: center; margin-bottom:10px">
        {{$employees->links()}}
</div>
<div style="margin-right:50px; margin-left:50px">
<table class="table table-striped table-bordered table-light">
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Company</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Update Employee</th>
        <th>Delete Employee</th>
    </tr>
    @foreach ($employees as $e)
    <tr>
        <td>{{$e->firstname}}</td>
        <td>{{$e->lastname}}</td>
        <td>{{$e->company}}</td>
        <td>{{$e->email}}</td>
        <td>{{$e->phone}}</td>
        <td style="text-align: center;">
                <a href="{{ route('employee.edit',$e->id)}}" class="btn btn-primary">Edit</a>
        </td>
        <td>
                <form style="text-align: center;" action="{{ route('employee.destroy', $e->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
        </td>
    </tr>
    @endforeach
</table>
</div>
@endsection