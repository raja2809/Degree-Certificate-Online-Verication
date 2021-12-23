@extends('layouts.admin3')

@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif
    
<h3>Edit existing record</h3>
<form action="{{route('um.update',$um->id)}}" 
    method="post">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="id" value="{{$um->id}}">
    First Name
    <input type="text" name="name"
    class="form-control" value="{{$um->name}}">
    Last Name
    <input type="text" name="secondname"
    class="form-control" value="{{$um->secondname}}">
    Matric Number 
    <input type="text" name="studentno"
    class="form-control" value="{{$um->studentno}}">
    Conferral Date
    <input type="date" name="date"
    class="form-control" value="{{$um->date}}">
    Faculty
    <div> 
    <select name="faculty" id="subject" value="{{$um->faculty}}">
    <option value="{{$um->faculty}}" selected="selected">{{$um->faculty}}</option>
  </select>
  
  </div>
  Program Level
    <div>     
    <select name="level" id="topic" value="{{$um->level}}">
    <option value="{{$um->level}}" selected="selected">{{$um->level}}</option>
  </select>
    </div>
    Program Name
    <div> 
    <select name="degree" id="chapter" value="{{$um->degree}}">
    <option value="{{$um->degree}}" selected="selected">{{$um->degree}}</option>
  </select>
 
  </div>
   
    
    University
    <input type="text" name="university" value="University of Malaysia"
    class="form-control">
    Conferral Year
    <div>     
    <select class="form-select" aria-label="Default select example" name="year" value="{{$um->year}}">
  <option selected>{{$um->year}}</option>
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
    <button type="submit" class="btn btn-primary">Save Record
    </button>

</form>

<script>
var subjectObject = {
  "Faculty of Business & Accountancy": {
    "Postgraduate Studies": ["Master of Accounting","Master of Business Administration","Doctor of Management","Doctor of Philosophy"],
    "Undergraduate Studies": [" Bachelor of Accounting (BAcc)"," Bachelor of Business Administration (BBA)"," Bachelor of Finance (BFin)"],
   
     
  },
  "Faculty of Built Enviroment": {
    "Undergraduate Studies": ["Bachelor of Science in Architecture", "Bachelor of Building Surveying", "Bachelor of Quantity Surveying","Bachelor of Real Estate","Bachelor of Urban & Regional Planning"],
    "Postgraduate Studies": ["Master of Project Management", "Master of Real Estate", "Doctor of Philosophy (Ph.D)"]
  }

  
}
window.onload = function() {
  var subjectSel = document.getElementById("subject");
  var topicSel = document.getElementById("topic");
  var chapterSel = document.getElementById("chapter");
  for (var x in subjectObject) {
    subjectSel.options[subjectSel.options.length] = new Option(x, x);
  }
  subjectSel.onchange = function() {
    //empty Chapters- and Topics- dropdowns
    chapterSel.length = 1;
    topicSel.length = 1;
    //display correct values
    for (var y in subjectObject[this.value]) {
      topicSel.options[topicSel.options.length] = new Option(y, y);
    }
  }
  topicSel.onchange = function() {
    //empty Chapters dropdown
    chapterSel.length = 1;
    //display correct values
    var z = subjectObject[subjectSel.value][this.value];
    for (var i = 0; i < z.length; i++) {
      chapterSel.options[chapterSel.options.length] = new Option(z[i], z[i]);
    }
  }
}
</script>

@endsection

