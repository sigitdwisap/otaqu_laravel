<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Employee Edit</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Employee</div>
                    <div class="card-body">
                        <h5>Edit Employee Data</h5>
                        <form method="POST" action="{{url('employee/'.$employee->id)}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                        <div class="col-md-8">
                                            <input id="name" type="text" class="form-control" name="name" value="{{$employee->name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group row">
                                        <label for="phone_number" class="col-md-4 col-form-label text-md-right">Phone</label>
                                        <div class="col-md-8">
                                            <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{$employee->phone_number}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                        <div class="col-md-8">
                                            <input id="email" type="text" class="form-control" name="email" value="{{$employee->email}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group row">
                                        <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                                        <div class="col-md-8">
                                            <input id="address" type="text" class="form-control" name="address" value="{{$employee->address}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group row">
                                        <div class="col-md-8">
                                            <button class="btn btn-success">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>