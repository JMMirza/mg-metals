<?php

namespace App\Http\Controllers;

use App\Models\Catergory;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Database\QueryException;

class CatergoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Catergory::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('categories.actions', ['row' => $row]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('categories.categories');
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
        $request->validate([
            'name' => 'required|string|max:255',
            'abbreviation' => 'string|max:255',
        ]);

        Catergory::create($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catergory  $catergory
     * @return \Illuminate\Http\Response
     */
    public function show(Catergory $catergory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catergory  $catergory
     * @return \Illuminate\Http\Response
     */
    public function edit(Catergory $catergory)
    {
        return view('categories.categories', ['catergory' => $catergory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catergory  $catergory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catergory $catergory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'abbreviation' => 'string|max:255',
        ]);

        $catergory->update($request->all());

        return redirect()->route('catergories.index')
            ->with('success', 'Catergory updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catergory  $catergory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catergory $catergory)
    {
        try {
            return $catergory->delete();
        } catch (QueryException $e) {
            print_r($e->errorInfo);
        }
    }
}
