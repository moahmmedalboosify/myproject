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
use phpDocumentor\Reflection\Types\Boolean;

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
        // dd('test');
        $i=0;
        $roles = Role::orderBy('id', 'ASC')->paginate(5);
        $permission =Permission::pluck('id','name')->all();
        $data=[];
       
        foreach($permission as $key => $row){
            $data [$i] = '<option value='.$row.'>'.$key.'</option>';
        
            $i++;        
        }
     
        
        if($request->ajax())
        {
            return response()->json([
                'state' => 200 ,
                'data' =>$data
            ]);
        }
      
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
        $permission = Permission::pulck('id','name')->all();
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
            $role = Role::create(['guard_name' => 'office','name' => $request->input('name_role')]);
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
        $i=0;
        $flag=0;
        $data=[]; //array  to store  html element <option> for load with ajax to libaray select multi-bootstrap
        $role = Role::find($id);
        $test=[];
        $permission = Permission::pluck('id','name')->all();
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
        ->where("role_has_permissions.role_id",$id)->pluck('name')->all();
       
       
       
        foreach($permission as $key => $row){
            if($this->search($rolePermissions,$key)){
                $data [$i] = '<option selected  value='.$row.'>'.$key.'</option>'; 
            }else{
                $data [$i] = '<option  value='.$row.'>'.$key.'</option>'; 
            }
           $i++;  
        }     

                // 

        return response()->json([
            'status'=>200,
            'message'=>[
                'role'=> $role ,
                'permission' =>$data,
            ]
        ]);
        

    }

  
    public function search($r1,$value){
        foreach($r1 as $row){
              if($value == $row){
                  return true;
              }
        }
        return false;
    }

    
    public function update(Request $request, $id){

         // -------------- test unit ----------------

        // return response()->json([
        //             'status'=>200,
        //             'editRoleName'=>$request->editRoleName,
        //             'editpermission'=>$request->editpermission
        //         ]);

       

        // -------------- work unit ----------------

            $validator = Validator::make($request->all(), [
                'editRoleName' => 'required|unique:roles,name,'.$id,
                'editpermission' => 'required',
            ],[
            'editRoleName.required' => 'يجب أدخال اسم الصلاحية.' ,
            'editRoleName.unique' => 'هذا الأسم موجود مسبقا.' ,
            'editpermission.required' => 'يجب تحديد الاذونات.' ,
            ]);

            if($validator->fails())
            {
                return response()->json([
                    'status'=>400,
                    'errors'=>$validator->messages()
                ]);

            }else{
                $role =Role::find($id);
                $role->name = $request->editRoleName;
                $role->syncPermissions($request->input('editpermission'));
                $role->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'تم تحديث الصلاحية بنجاح .'
                ]);
            }
    }
   

    public function delete($id)
    {
        if(Role::find($id))
        {
            Role::find($id)->delete();
            return response()->json([
                'status'=>200,
                'message'=>'تم حذف الصلاحية بنجاح .'
            ]);
        }
    }
}
