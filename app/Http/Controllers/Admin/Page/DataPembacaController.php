<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class DataPembacaController extends Controller
{
    public function index(){
        return view('admin.page.datapembaca');
    }

    public function get_user(Request $request)
    {
            $data = User::select('id', 'nama', 'email', 'username', 'role', 'no_hp')
                ->where('role', 3)
                ->get()
                ->map(function ($user) {
                    $user->role = 'Pembaca';
                    return $user;    
                });


            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="btn-group">
                        <a href="javascript:void(0)" type="button" id="btn-edit" class="btn-edit btn btn-warning rounded me-1 p-1" onClick="edit_data(' . "'" . $row->id . "'" . ')" data-bs-toggle="modal" data-bs-target="#form_modal"><i class="ti ti-pencil fs-5"></i></a>
                        <a href="javascript:void(0)" type="button" id="btn-del" class="btn-hapus btn btn-danger rounded p-1" onClick="delete_data(' . "'" . $row->id . "'" . ')"><i class="ti ti-trash fs-5"></i></a>
                    </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
}
