<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\mhs;

class mhsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs = mhs::all()->toArray();
       return view('mhs.index', compact('mhs'));   

    //    $total = DB::table('mhs')->get();
    //     $data = [];
    //     $label = [];

    //     foreach ($mhs as $i => $v) {
    //         $value[$i] = DB::table('mhs')->where('id',$v->id)->count();
    //         $label[$i] = $v->nama;
    //     }
    //     return view('mhs')
    //     ->with('value',json_encode($value))
    //     ->with('label',json_encode($label));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mhs.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mhs = $this->validate(request(), [
            'nama'=>'required',
            'nim' => 'required|numeric'
        ]);

        mhs::create($mhs);
        return redirect('mhs')->with('success', 'Data Mahasiswa telah ditambahkan');
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
        $mhs = mhs::find($id);
        return view('mhs.edit',compact('mhs','id'));
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
        $mhs = mhs::find($id);
        $this->validate(request(), [
            'nama' => 'required',
            'nim' => 'required|numeric'
        ]);
            $mhs->nama = $request->get('nama');
            $mhs->nim = $request->get('nim');
            $mhs->save();
            return redirect('mhs')->with('success','Data Mahasiswa telah di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mhs = mhs::find($id);
        $mhs->delete();
        return redirect('mhs')->with('success','Data Mahasiswa telah dihapus');
    }


}
