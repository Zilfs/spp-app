<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spp;
use App\Exports\SppExport;
use Maatwebsite\Excel\Facades\Excel;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayaran = Spp::all();
        $data = [
            'title' => 'Spp | MyApp',
            'active' => 'Spp',
            'pembayaran' => $pembayaran,
        ];

        return view('pembayaran.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Spp::create($data);
        return redirect()->route('pembayaran');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $pembayaran = Spp::find($id);
        // return view('pembayaran.index', $pembayaran);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $item = Spp::find($id);
        $item->update($data);
        
        return redirect()->route('pembayaran');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Spp::destroy($id);
        return redirect()->route('pembayaran');
    }

    public function exportExcel()
    {
        return Excel::download(new SppExport, 'spp-excel.xlsx');
        return view('pembayaran.index');
    }
}
