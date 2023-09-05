<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\LopMonHoc;
use Illuminate\Http\Request;
use App\Http\Service\LopMonHocService;
use App\Http\Requests\LopCreateRequest;

class LopMonHocController extends Controller
{
    //
    protected $lopmonhocService;

    public function __construct(LopMonHocService $lopmonhocService)
    {
        $this->lopmonhocService = $lopmonhocService;
    }

    public function create(){
        return view('admin.lopmonhoc.add',[
            'title'=>'Thêm mới lớp môn học'
        ]);
    }
    public function store(LopCreateRequest $request){
        //xu ly them moi lop mon hoc
        //dd($request->input());
        $result = $this->lopmonhocService->create($request);
        return redirect()->back();
    }
    public function index(){
        return view('admin.lopmonhoc.list',[
            'title'=>'Danh sách lớp môn học',
            'lopmonhocs' => $this->lopmonhocService->getAll()
        ]);
    }
    public function delete(Request $request){
        //xử lý xóa
        $result = $this->lopmonhocService->delete($request);
        if ($result){
            return response()->json([
                'error' => 'false',
                'message'=> "xóa lớp học thành công"
            ]);
        }
        return response()->json([
            'error'=>'true'
        ]);
    }
    public function edit(LopMonHoc $lop){
        return view('admin.lopmonhoc.edit',[
            'title'=>"Sửa danh mục",
            'lop' => $lop
        ]);
    }

    public function postedit($id, Request $request){
        $result = $this->lopmonhocService->edit($id,$request);
        return redirect()->back();
    }
}
