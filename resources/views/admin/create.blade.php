@extends('layouts.admin1')

@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif
    
<h3>Insert New Record</h3>
<form action="{{route('admin.store')}}" method="post">
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
    Conferral Year
    <input type="text" name="year"
    class="form-control">
Subjects 
<select name="faculty" id="subject">
    <option value="" selected="selected">Select subject</option>
  </select>
  <br><br>
Topics 
<select name="degree" id="topic">
    <option value="" selected="selected">Please select subject first</option>
  </select>
  <br><br>
Chapters 
<select name="university" id="chapter">
    <option value="" selected="selected">Please select topic first</option>
  </select>

    <button type="submit" class="btn btn-primary">Save Record
    </button>

    <td><a href="{{route('admin.index')}}" 
            class="btn btn-primary">Back 
            <i class="fas fa-edit"></i> </a>
        </td>

</form>

<script>
var subjectObject = {
  "Front-end1": {
    "HTML1": ["Links1", "Images", "Tables", "Lists"],
    "CSS": ["Borders", "Margins", "Backgrounds", "Float"],
    "JavaScript": ["Variables", "Operators", "Functions", "Conditions"]    
  },
  "Back-end": {
    "PHP": ["Variables", "Strings", "Arrays"],
    "SQL": ["SELECT", "UPDATE", "DELETE"]
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