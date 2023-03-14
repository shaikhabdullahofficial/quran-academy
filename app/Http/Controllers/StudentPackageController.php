<?php

namespace App\Http\Controllers;

use App\Models\Student_Package;
use App\Http\Requests\StoreStudent_PackageRequest;
use App\Http\Requests\UpdateStudent_PackageRequest;
use Exception;

class StudentPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_packages = Student_Package::all();
        return view('backend.student_packages.index')->with('student_packages',$student_packages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.student_packages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudent_PackageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudent_PackageRequest $request)
    {
        try
        {
            $student_package = Student_Package::create($request->validated());

            if($student_package)
            {
                return redirect()->route('studet-package-index');
            }
            else{
                return redirect()->back();
            }
        }
        catch(Exception $ex)
        {
            return back()->withError($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student_Package  $student_Package
     * @return \Illuminate\Http\Response
     */
    public function show(Student_Package $student_Package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student_Package  $student_Package
     * @return \Illuminate\Http\Response
     */
    // public function edit(Student_Package $student_Package)
    // {

    //     return view('backend.student_packages.edit')->with('student_Package',$student_Package);
    // }

         public function edit($id)
         {
            $student_Package = Student_Package::find($id);
            return view('backend.student_packages.edit', compact('student_Package'));
         }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudent_PackageRequest  $request
     * @param  \App\Models\Student_Package  $student_Package
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudent_PackageRequest $request, Student_Package $studentPackage)
    {
        try {
            $studentPackage->update($request->validated());
            return redirect()->route('studet-package-index')->with('success', 'Student package updated successfully');
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student_Package  $student_Package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student_Package $student_package)
    {
        try {
            $result = $student_package->delete();
            if ($result) {
                return redirect()->route('studet-package-index')->with('success', 'Package deleted successfully!');
            } else {
                return redirect()->back()->with('error', 'Failed to delete package!');
            }
        } catch (Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }
    }
}
