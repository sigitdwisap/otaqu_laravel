<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Exports\EmployeesExport;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::limit(10000)->get();
        return view('employee.index', compact('employees'));
    }

    public function json()
    {
        return Datatables::of(Employee::limit(10))->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->phone_number = $request->phone_number;
        $employee->email = $request->email;
        $employee->address = $request->address;
        $employee->save();
        return Redirect('/employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::where('id', $id)->first();
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::where('id', $id)->first();
        $employee->name = $request->name;
        $employee->phone_number = $request->phone_number;
        $employee->email = $request->email;
        $employee->address = $request->address;
        $employee->save();
        return Redirect('/employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::where('id', $id)->first();
        $employee->delete();
        return Redirect('/employee');
    }

    public function destroy_checklist(Request $request, $id)
    {
        if (isset($request->delete_employee)) {
            $id_checklist = $_POST['delete_employee'];
            foreach ($id_checklist as $key => $value) {
                $employee = Employee::where('id', $value)->first();
                $employee->delete();
            }
        }
        return Redirect('/employee');
    }

    public function export()
    {
        return Excel::download(new EmployeesExport, 'employee-datas.xlsx');
    }
}
