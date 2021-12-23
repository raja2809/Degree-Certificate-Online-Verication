@extends('layouts.user1')

@section('content')

<div class="row">



<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Graduate</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Undergraduate-{{ $count3 }}</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Postgraduate-{{ $count4 }}</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Total of Graduate-{{ $count }}</div>
                </div>
                
                <div class="col-auto">
                   
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Total Of Faculty</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count1 }}</div>
                </div>
                <div class="col-auto">
                   
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Total of Program</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count2 }}</div>
                </div>
                <div class="col-auto">
                   
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Pending Requests Card Example -->

</div>
<link href="filter.css" rel="stylesheet">
<script src="filter.js"></script>

<div class="card mb-4">
  <div class="card-body">
    
    <div class="card mb-4">
  <div class="card-body">
  Search for graduate by any fields
    </div>
</div>    

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="first name" title="Type in a name" data-column="0">      


<input type="text" id="myInput1" onkeyup="myFunction1()" placeholder="second name" title="Type in a name" >      

<input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="matric number" title="Type in a name" >      


<input type="text" id="myInput3" onkeyup="myFunction3()" placeholder="faculty" title="Type in a name" list="cityname">      
<datalist id="cityname">
    <option value="Faculty of Quranic and Sunnah">
    <option value="Faculty of Science and Technology">
</datalist>
 
<input type="text" id="myInput4" onkeyup="myFunction4()" placeholder="program name" title="Type in a name" list="cityname1">      
<datalist id="cityname1">
    <option value="Doctor of Philosophy in Quranic and Sunnah Studies">
    <option value="Master of Quranic and Sunnah Studies">
    <option value="Bachelor of Qiraat Studies with Honours">
    <option value="Bachelor of Quranic and Sunnah Studies with Honours">
    <option value="Bachelor of Quranic Studies with Multimedia with Honours">
    <option value="Bachelor of Sunnah Studies with Information Management with Honours">
    <option value="Bachelor of Science (Hons) – Food Biotechnology">
    <option value="Bachelor of Science (Hons) – Actuarial Science and Risk Management">
    <option value="Bachelor of Science (Hons) – Financial Mathematics">
    <option value="Bachelor of Computer Science (Hons) – Information Security and Assurance">
    <option value="Bachelor of Science (Hons) – Industrial Chemical Technology">
    <option value="Bachelor of Science (Hons) – Applied Physics">
    <option value="Bachelor of Health Industrial Technology (Hons)">
    <option value="Master of Science (Food Biotechnology)">
    <option value="Master of Science (Actuarial Science)">
    <option value="Master of Science (Financial Mathematics)">
    <option value="Master of Computer Science (Information Security and Assurance)">
    <option value="Master of Science (Risk Management)">
    <option value="Doctor of Philosophy in Science and Technology">
    
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
        @foreach ($usims as $usim)
    <tr>

        <td>{{ $usim->name }}</td>
        <td>{{ $usim->secondname }}</td>
        <td>{{ $usim->studentno }}</td>
        
        <td>{{ $usim->date }}</td>
        <td>{{ $usim->faculty }}</td>
        <td>{{ $usim->degree }}</td>
        <td>{{ $usim->level }}</td>
        <td>{{ $usim->university }}</td>
        <td>{{ $usim->year }}</td>
    
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

<script>
  $(document).ready (function () {
    var table = $( '#datatable').DataTable({
      'processing': true,
      'serverSide': true,
      
      'columns': [
        {'data': 'first_name'),
        {'data': 'last_nane'),
        {'data': 'email'}
        ],
    }):

    $('.filter-input'). keyup(function() {
     table.column( $( this).data( 'column'))
        .search( $(this).val() )
        .draw);
    });
   
  })
</script>


    @endsection








