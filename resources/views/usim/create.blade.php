@extends('layouts.admin1')

@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif
    
<h3>Insert New Record</h3>
<form action="{{route('usim.store')}}" method="post">
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
    <select class="form-control" name="faculty">
    @foreach ($fusims as $fusim)
   <option value="{{ $fusim->name }}">{{$fusim->name}} </option>   
@endforeach
</select>
  
  Program Level
  <select class="form-control" name="level">
   <option value="Undergraduate">Undergraduate Studies</option>   
   <option value="Postgraduate">Postgraduate Studies</option>  
</select>
  
    Program Name
    <select class="form-control" name="degree">
    @foreach ($pusims as $pusim)
   <option value="{{ $pusim->name }}">{{$pusim->name}} </option>   
@endforeach
</select>
 
   
    
    University
    <input type="text" name="university" value="Univeristi Sains Islam Malaysia"
    class="form-control">
    Conferral Year
    <div>     
    <select class="form-control" aria-label="Default select example" name="year">
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

    <td><a href="{{route('usim.index')}}" 
            class="btn btn-primary">Back 
            <i class="fas fa-edit"></i> </a>
        </td>

</form>

<script>
var subjectObject = {
  "Faculty of Quranic and Sunnah": {
    "Postgraduate Studies": ["Doctor of Philosophy in Quranic and Sunnah Studies","Master of Quranic and Sunnah Studies",],
    "Undergraduate Studies": [" Bachelor of Qiraat Studies with Honours"," Bachelor of Quranic and Sunnah Studies with Honours"," Bachelor of Quranic Studies with Multimedia with Honours"," Bachelor of Sunnah Studies with Information Management with Honours",],
   
     
  },
  "Faculty of Science and Technology": {
    "Undergraduate Studies": ["Bachelor of Science (Hons) – Food Biotechnology", "Bachelor of Science (Hons) – Actuarial Science and Risk Management", "Bachelor of Science (Hons) – Financial Mathematics","Bachelor of Computer Science (Hons) – Information Security and Assurance","Bachelor of Science (Hons) – Industrial Chemical Technology","Bachelor of Science (Hons) – Applied Physics","Bachelor of Health Industrial Technology (Hons)"],
    "Postgraduate Studies": ["Master of Science (Food Biotechnology)", "Master of Science (Actuarial Science)", "Master of Science (Financial Mathematics)","Master of Computer Science (Information Security and Assurance)","Master of Science (Risk Management)","Doctor of Philosophy in Science and Technology",]
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


