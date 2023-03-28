<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use Illuminate\Support\Facades\file;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    public function index (Request $request){

        if($request->has('search')){

            $data = Employee::where('nama','LIKE','%'.$request->search.'%')->paginate(3);

        }else{
            
            $data = Employee::paginate(3);
        }
        
        return view('datapegawai',compact('data'));
    }

    public function tambahDataPegawai (){
        return view('tambahDataPegawai');
    }

    public function insertData(Request $request){
        // dd($request->all()); 
        $data = Employee::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotoPegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();

        }
        return redirect()->route('pegawai')->with('success','Data Berhasil Ditambahkan');
    }

    public function editDataPegawai($id){
        // dd($data);
        $data = Employee::find($id);
        return view('editDataPegawai',compact('data'));

    }

    public function updateDataPegawai(Request $request, $id){
        $data = Employee::find($id);
        $data->update($request->all());

        if ($request->hasFile('foto'))                      // Update image.
        {      
            $destination = 'fotoPegawai/'.$data->foto;      // Delete image lama didi ganti yang baru.
            if (file::exists($destination)) 
            {
                file::delete($destination);
                
            }                                                
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('fotoPegawai/',$filename);
            $data->foto= $filename;
        }
        $data->save();
        return redirect()->route('pegawai')->with('success','Data Berhasil Diperbarui');
        
    }
    

    public function deletedatapegawai($id){
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success','Data Berhasil Dihapus');

    }


    public function exportPdf(){
        $data = Employee::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('dataPegawai-pdf');
        return $pdf->download('data.pdf');
    }

    public function exportExcel(){
        return Excel::download(new EmployeeExport, 'datapegawai.xlsx');
         

    }

    public function importExcel(Request $request){
        $data = $request->file('file');

        $filename = $data->getClientOriginalName();
        $data->move('EmployeeData', $filename);

        Excel::import(new EmployeeImport, \public_path('/EmployeeData/'.$filename));
        return \redirect()->back();
    }
  
 
}
