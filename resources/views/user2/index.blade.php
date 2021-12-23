@extends('layouts.user1')

@section('content')

    
<form action="{{ route('user.index')}}" 
method="GET" class="form-inline">
<div class="card mb-4">
  <div class="card-body">
    
    <div class="card mb-4">
  <div class="card-body">
   Search for graduate by any fields
    </div>
</div>    

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="first name" title="Type in a name" >      


<input type="text" id="myInput1" onkeyup="myFunction1()" placeholder="second name" title="Type in a name" >      

<input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="matric number" title="Type in a name" >      


<input type="text" id="myInput3" onkeyup="myFunction3()" placeholder="faculty" title="Type in a name" list="cityname">      
<datalist id="cityname">
    <option value="Faculty of Business & Accountancy">
    <option value="Faculty of Built Enviroment">
</datalist>
 
<input type="text" id="myInput4" onkeyup="myFunction4()" placeholder="program name" title="Type in a name" list="cityname1">      
<datalist id="cityname1">
    <option value="Master of Accounting">
    <option value="Master of Business Administration">
    <option value="Bachelor of Accounting (BAcc)">
    <option value="Bachelor of Business Administration (BBA)">
    <option value="Bachelor of Finance (BFin)">
    <option value="Bachelor of Science in Architecture">
    <option value="Bachelor of Building Surveying">
    <option value="Bachelor of Quantity Surveying">
    <option value="Bachelor of Real Estate">
    <option value="Bachelor of Urban & Regional Planning">
    <option value="Master of Project Management">
    <option value="Master of Real Estate">
    <option value="Doctor of Philosophy (Ph.D)">
    
</datalist>
 
<input type="text" id="myInput5" onkeyup="myFunction5()" placeholder="program level" title="Type in a name" list="cityname2">      
<datalist id="cityname2">
    <option value="Postgraduate Studies">
    <option value="Undergraduate Studies">
</datalist>
    
<input type="text" id="myInput6" onkeyup="myFunction6()" placeholder="years" title="Type in a name" >      

    

    


<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
            <tr>
            <th>First Name</th>
        <th>Last Name</th>
        <th>Matric Number</th>
        <th>Conferral Date</th>
        <th>Faculty</th>
        <th>Program Name</th>
        <th>Program Level</th>
        <th>University</th>
        <th>Conferral Year</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($ums as $um)
    <tr>

        <td>{{ $um->name }}</td>
        <td>{{ $um->secondname }}</td>
        <td>{{ $um->studentno }}</td>
        
        <td>{{ $um->date }}</td>
        <td>{{ $um->faculty }}</td>
        <td>{{ $um->degree }}</td>
        <td>{{ $um->level }}</td>
        <td>{{ $um->university }}</td>
        <td>{{ $um->year }}</td>
    
    </tr>
    @endforeach
    
        </tbody>
        <tfoot>
            <tr>
            <th>First Name</th>
        <th>Last Name</th>
        <th>Matric Number</th>
        <th>Conferral Date</th>
        <th>Faculty</th>
        <th>Program Name</th>
        <th>Program Level</th>
        <th>University</th>
        <th>Conferral Year</th>
            </tr>
        </tfoot>
    </table>




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

</script>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("dataTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<script>
function myFunction1() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput1");
  filter = input.value.toUpperCase();
  table = document.getElementById("dataTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<script>
function myFunction2() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("dataTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<script>
function myFunction3() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput3");
  filter = input.value.toUpperCase();
  table = document.getElementById("dataTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<script>
function myFunction4() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput4");
  filter = input.value.toUpperCase();
  table = document.getElementById("dataTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<script>
function myFunction5() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput5");
  filter = input.value.toUpperCase();
  table = document.getElementById("dataTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[6];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<script>
function myFunction6() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput6");
  filter = input.value.toUpperCase();
  table = document.getElementById("dataTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[8];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

@endsection

