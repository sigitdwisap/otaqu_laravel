<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <title>Employees</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Employees</div>
                    <div class="card-body">
                        <h5>Add Employee Data</h5>
                        <form method="POST" action="{{url('employee')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label">Name</label>
                                        <div class="col-md-8">
                                            <input id="name" type="text" class="form-control" name="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group row">
                                        <label for="phone_number" class="col-md-4 col-form-label">Phone</label>
                                        <div class="col-md-8">
                                            <input id="phone_number" type="text" class="form-control" name="phone_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label">Email</label>
                                        <div class="col-md-8">
                                            <input id="email" type="text" class="form-control" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group row">
                                        <label for="address" class="col-md-4 col-form-label">Address</label>
                                        <div class="col-md-8">
                                            <input id="address" type="text" class="form-control" name="address">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group row">
                                        <div class="col-md-8">
                                            <button class="btn btn-success">Create</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-12">
                                <a href="{{url('employee_export')}}">
                                    <button class="btn btn-warning" type="button">Export</button>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="employeesTable" class="table table-responsive table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{$employee->name}}</td>
                                        <td>{{$employee->phone_number}}</td>
                                        <td>{{$employee->email}}</td>
                                        <td>{{$employee->address}}</td>
                                        <td>
                                            <a href="{{url('employee/edit/'.$employee->id)}}">
                                                <button class="btn btn-primary">Edit</button>
                                            </a>
                                            <a href="{{url('employee/delete/'.$employee->id)}}">
                                                <button class="btn btn-danger">Delete</button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach -->
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#employeesTable').DataTable({
                processing: true,
                searchable: true,
                serverSide: true,
                ajax: 'employee_json',
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'phone_number',
                        name: 'phone_number'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: '',
                        render: (data, type, row) => {
                            return `
                                <a href="<?php echo url('employee/edit'); ?>/${row.id}">
                                    <button class="btn btn-primary">Edit</button>
                                </a>
                                <a href="<?php echo url('employee/delete'); ?>/${row.id}">
                                    <button class="btn btn-danger">Delete</button>
                                </a>
                            `;
                        }
                    },
                ],
            });
        });
    </script>
</body>

</html>