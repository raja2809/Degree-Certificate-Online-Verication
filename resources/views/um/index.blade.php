@extends('layouts.admin3')

@section('content')

<br>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif
    
   
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
    <option value="Doctor of Management">
    <option value="Doctor of Philosophy">
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

    

    
</div>
</div>


<br> 

</br>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tblData" width="100%" cellspacing="0">
                                <tr class="header">
        <th>First Name</th>
        <th>Last Name</th>
        <th>Matric Number</th>
       
        <th>Conferral Date</th>
        <th>Faculty</th>
        <th>Program Name</th>
        <th>Program Level</th>
        <th>University</th>
        <th>Conferral Year</th>
        <th>Edit</th>
        <th>Delete</th>
    
        </tr>
    @foreach ($ums as $um)
    
    <tr>
    <tbody>
    <td class="block">{{ $um->name }}</td>
    <td>{{ $um->secondname }}</td>
    <td>{{ $um->studentno }}</td>
        
        <td>{{ $um->date }}</td>
        <td>{{ $um->faculty }}</td>
        <td>{{ $um->degree }}</td>
        <td>{{ $um->level }}</td>
        <td>{{ $um->university }}</td>
        <td>{{ $um->year }}</td>
        <td><a href="{{route('um.edit',$um->id)}}" 
            class="btn btn-success">
            <i class="fas fa-edit"></i> </a>
        </td>
        <td>
            <form method="POST" 
            action="{{route('um.destroy',$um->id)}}">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button class="btn btn-danger"
            onclick="return confirm('Are you sure to delete the record?')">
            
            <i class="fas fa-trash"></i> </button>
            </form>
        </td>
</tbody>
        
    
    </tr>
    
    @endforeach

    <a href="{{route('um.create')}}" 
            class="btn btn-primary" style="margin-right:500px;">Create New 
            <i class="fas fa-edit"></i> </a>

            <form action="{{ route('file-import1') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
    <label for="exampleFormControlFile1"></label>
    <input type="file" name="file" class="" id="exampleFormControlFile1">
    <button class="btn btn-primary"  style="margin-left:630px" >Import data</button> 
  
            
        
</table>
{{ $ums->links('pagination::bootstrap-4') }}
<button class="btn btn-success" onclick="exportTableToExcel('tblData', 'members-data')">Export Displayed Data</button>
<a class="btn btn-success" href="{{ route('file-export1') }}">Export All Data</a>

<script>

function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
</script>

</script>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("tblData");
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
  table = document.getElementById("tblData");
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
  table = document.getElementById("tblData");
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
  table = document.getElementById("tblData");
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
  table = document.getElementById("tblData");
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
  table = document.getElementById("tblData");
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
  table = document.getElementById("tblData");
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




 <!-- Page level plugins -->
 <script src="{{asset('admin1/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin1/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admin1/js/demo/datatables-demo.js')}}"></script>


 <!-- Page level plugins -->
 <script src="{{asset('admin1/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin1/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admin1/js/demo/datatables-demo.js')}}"></script>

@endsection

