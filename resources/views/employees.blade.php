@extends('layouts.app')

@section('content')




<!-- Sort -->


	
<!-- Sort -->


<br>
<div class="container">
    
    	<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="row">
						<div class="panel-heading">
						<h3 class="panel-title">Employees</h3>

						</div>

						 <div class="btn-group" role="group" style="margin-left: 50px; height: 38px">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Sort by
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
    	@foreach($departments as $department)
      <li><a href="/employees/sort/{{ $department->dept_name }}">{{ $department->dept_name }}</a></li>

      @endforeach
      
    </ul>
  </div>
  <div class="col-md-5">
	 <form class="navbar-form navbar-left" action="/employees" method="get">
                                    <div class="form-group ">
                                      <input type="text" name="search" class="form-control" placeholder="Search">

                                    </div>
                                    
                                  </form>
</div>
					</div>
					<br>
					
					<table class="table table-hover">
						<thead>
							<tr>
								<th>ID</th>
					            <th>Birthday</th>
					            <th>First name</th>
					            <th>Last name</th>
					            <th>Gender</th>
					            <th>Hire date</th>
					            <th>Dept name</th>
					            <th>Salary</th>
					            <th>Job title</th>
					            <th>From date</th>
					            <th>To date</th>
							</tr>
						</thead>
						<tbody>
							@foreach($employees as $employee)

					            <tr>
					                <td>{{ $employee->emp_no }}</td>
					                <td>{{ $employee->birth_date }}</td>
					                <td>{{ $employee->first_name }}</td>
					                <td>{{ $employee->last_name }}</td>
					                <td>{{ $employee->gender }}</td>
					                <td>{{ $employee->hire_date }}</td>
					                <td>{{ $employee->dept_name }}</td>
					                <td>{{ $employee->salary }}</td>
					                <td>{{ $employee->title }}</td>
					                <td>{{ $employee->from_date }}</td>
					                <td>{{ $employee->to_date }}</td>
					            </tr>

        
        @endforeach    
							
						</tbody>
					</table>
				</div>
			</div>
			
			<div class="row">
				
					{{ $employees->links() }}
				
			</div>
			
		
		</div>
	</div>










    
   

@endsection