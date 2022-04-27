<?php

namespace App\Http\Controllers\Office\roles;

use DB;
use Hash;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class roleController extends Controller
{

    function __construct()
    {

        // $this->middleware('permission:عرض صلاحية', ['only' => ['index']]);
        // $this->middleware('permission:اضافة صلاحية', ['only' => ['create','store']]);
        // $this->middleware('permission:تعديل صلاحية', ['only' => ['edit','update']]);
        // $this->middleware('permission:حذف صلاحية', ['only' => ['destroy']]);

    }






    public function index(Request $request)
    {
        $roles = Role::orderBy('id', 'ASC')->paginate(5);
        $permission = Permission::get();
      
        return view('office.roles.index', compact('roles','permission'));
    }

    public function fetch_data(Request $request)
    {
        if($request->ajax())
        {           
            $roles = Role::orderBy('id', 'DESC')->paginate(5);
            $permission = Permission::get();
            return view('office.roles.index_pagintion', compact('roles','permission'))->render();
        }
   
    }
   


    public function create()
    {
        $permission = Permission::get();
        return view('office.roles.create', compact('permission'));
    }
 


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name_role'=> 'required|unique:roles,name',
            'select_permission'=>'required',  
        ] , [
            'name_role.required' => 'يجب أدخال اسم الصلاحية',
            'name_role.unique' => 'أسم الصلاحيات موجود مسبقا',
            'select_permission.required' => 'يجب تحديد الأذونات',
            
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $role = Role::create(['name' => $request->input('name_role')]);
            $role->syncPermissions($request->input('select_permission'));
            return response()->json([
                'status'=>200,
                'message'=>'تم أضافة الصلاحية بنجاح .'
            ]);
        }
    }
    
    
    
    public function show($id)
    {
        $role = Role::where('id',$id)->pluck('name','name')->all();
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)->pluck('name','name')->all();
        return response()->json([
            'status'=>200,
            'message'=>[
                'role'=> $role ,
                'rolePermissions' => $rolePermissions ,
            ]
        ]);
        // $role = Role::find($id);
        // $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
        //     ->where("role_has_permissions.role_id", $id)
        //     ->get();
           
        // return view('office.roles.show', compact('role', 'rolePermissions'));
    }
   


    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        
        return response()->json([
            'status'=>200,
            'message'=>[
                'role'=> $role ,
                'permission' => $permission ,
            ]
        ]);
    }
  

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('office.show.roles')
            ->with('success', 'Role updated successfully');
    }
   

    public function delete($id)
    {
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }
}
