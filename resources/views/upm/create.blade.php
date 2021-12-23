@extends('layouts.admin2')

@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif
    
<h3>Insert New Record</h3>
<form action="{{route('upm.store')}}" method="post">
    @csrf
    First name
    <input type="text" name="name"
    class="form-control">
    Last name
    <input type="text" name="secondname"
    class="form-control">
    Matric Number
    <input type="text" name="studentno"
    class="form-control">
    Conferral Date
    <input type="date" name="date"
    class="form-control">
    Faculty
    <div> 
    <select name="faculty" id="subject">
    <option value="" selected="selected">Select faculty</option>
  </select>
  
  </div>
  Program Level
    <div>     
    <select name="level" id="topic">
    <option value="" selected="selected">Please select faculty first</option>
  </select>
    </div>
    Program Name
    <div> 
    <select name="degree" id="chapter">
    <option value="" selected="selected">Please select level first</option>
  </select>
 
  </div>
   
    
    University
    <input type="text" name="university" value="University of Putra Malaysia"
    class="form-control">
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
    <button type="submit" class="btn btn-primary">Save Record
    </button>

    <td><a href="{{route('upm.index')}}" 
            class="btn btn-primary">Back 
            <i class="fas fa-edit"></i> </a>
        </td>

</form>

<script>
var subjectObject = {
  "Faculty of Agriculture": {
    "Postgraduate Studies": ["Master of Science","Doctor of Philosophy (PhD)","Master of Plantation Management","Master of Land Resource Management"],
    "Undergraduate Studies": [" Bachelor of Agricultural Science with Honours"," Bachelor of Horticultural Science with Honours"," Bachelor of Science in Aquaculture with Honours"," Bachelor of Animal Science with Honours",],
   
     
  },
  "Faculty of Forestry and Enviroment": {
    "Undergraduate Studies": ["Bachelor of Forestry Science with Honours", "Bachelor of Wood Science and Technology with Honours", "Bachelor of Parks and Recreation Science with Honours","Bachelor of Environmental Management with Honours","Bachelor of Environmental Science and Technology with Honours"],
    "Postgraduate Studies": ["Doctor of Philosophy", "Master of Science", "Master of Environment"]
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

