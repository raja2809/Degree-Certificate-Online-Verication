@extends('layouts.user1')

@section('content')
    
<br>
<div class="p-1 text-left ">
    <h3 class="mb-3">Degree Certificate Online Verification System</h3>
    <div class="card bg-light mb-3 " style="max-width: ;">
  <div class="card-body">
    <h9 class="mb-3">Welcome to Degree Certificate Online Verification System.
<br>
This online service can be used to verify qualifications that have been conferred by University Council.</h9>
  </div>
</div>
<br>
    
    <form action="{{ route('user.index')}}" 
method="GET" class="form-inline">
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Search For Graduates</h5>
    <div class="card bg-light mb-3" style="max-width: 18rem;">
  <div class="card-body">
    <h10 class="card-title">Search for a graduate by any of the fields below.
        <br>
Searches can be conducted on one or multiple fields.</h10>
    </div>
</div>    
    First Name 
    <div>    
    <input type="text" name="keyword">
    <label>And/Or</label>
    </div>
    Last Name 
    <div>    
    <input type="text" name="secondname">
    <label>And/Or</label>
    </div>
    Matric Number
    <div>     
    <input type="text" name="studentno">
    <label>And/Or</label>
    </div>
    Certificate Number
    <div>     
    <input type="text" name="certino">
    <label>And/Or</label>
    </div>
    Conferral Year
    <div>     
    <select class="form-select" aria-label="Default select example" name="year">
  <option selected>Year</option>
  <option value="2021">2021</option>
  <option value="2020">2020</option>
  <option value="2019">2019</option>
  <option value="2018">2018</option>
  <option value="2017">2017</option>
  <option value="2016">2016</option>
  <option value="2015">2015</option>
  <option value="2014">2014</option>
  <option value="2013">2013</option>
  <option value="2012">2012</option>
  <option value="2011">2011</option>
  <option value="2010">2010</option>
</select>
    </div>
    <br>
    <button type="submit" class="btn btn-success">Search</button>   
</div>
</div>



@endsection