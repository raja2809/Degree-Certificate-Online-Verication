@extends('layouts.admin1')

@section('content')

<br>
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
@foreach ($fusims as $fusim)
   <option value="{{ $fusim->name }}">{{$fusim->name}} </option>   
@endforeach
</datalist>
 
<input type="text" id="myInput4" onkeyup="myFunction4()" placeholder="program name" title="Type in a name" list="cityname1">      
<datalist id="cityname1">
@foreach ($pusims as $pusim)
   <option value="{{ $pusim->name }}">{{$pusim->name}} </option>   
@endforeach
    
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
<a href="{{route('usim.create')}}" 
            class="btn btn-primary" style="margin:10px;">Create New 
            <i class="fas fa-edit"></i> </a>
<a href="{{route('fusim.create')}}" 
          class="btn btn-primary" style="margin:1px;">Add New Faculty 
            <i class="fas fa-edit"></i> </a>
            <a href="{{route('pusim.create')}}" 
          class="btn btn-primary" style="margin:1px;">Add New Program 
            <i class="fas fa-edit"></i> </a>

<button class="btn btn-success" onclick="exportTableToExcel('dataTable', 'members-data')">Export Displayed Data</button>
<a class="btn btn-success" href="{{ route('file-export3') }}">Export All Data</a>

           


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
        <th>Edit</th>
        <th>Delete</th>
    
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
        <td><a href="{{route('usim.edit',$usim->id)}}" 
            class="btn btn-success">
            <i class="fas fa-edit"></i> </a>
        </td>
        <td>
            <form method="POST" 
            action="{{route('usim.destroy',$usim->id)}}">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button class="btn btn-danger"
            onclick="return confirm('Are you sure to delete the record?')">
            
            <i class="fas fa-trash"></i> </button>
            </form>
        </td>
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
        <th>Edit</th>
        <th>Delete</th>
        </tr>
        </tfoot>
    </table>
    
    
    
   
    <form action="{{ route('file-import3') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
    <label for="exampleFormControlFile1"></label>
    <input type="file" name="file" class="" id="exampleFormControlFile1">
    
    <button class="btn btn-primary" style="margin:10px" >Import data</button> 


           


    
  
    
        
 








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



</script>
 <!-- Page level plugins -->
 <script src="{{asset('admin1/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin1/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admin1/js/demo/datatables-demo.js')}}"></script>

@endsection



