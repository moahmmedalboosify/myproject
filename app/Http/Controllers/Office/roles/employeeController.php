<?php

namespace App\Http\Controllers\Office\roles;

use DB;
use Auth;
use Hash;
use Illuminate\Http\Request;

use App\Model\office_Account;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class employeeController extends Controller
{

    public function index(Request $request)
    {
        $data = office_Account::orderBy('id', 'DESC')->paginate(5);
        return view('office.users.index', compact('data'));
    }


    public function fetch_data(Request $request)
    {

        if($request->ajax()){
            $data = office_Account::orderBy('id', 'DESC')->paginate(5);
            return view('office.users.index_pagination', compact('data'))->render();
        }
    }
   

    public function create()
    {
        $roles = Role::pluck('id', 'name')->all();
        $data = [] ;
        $i=0;
        
        foreach($roles as $key => $row){
            $data [$i] = '<option value='.$row.'>'.$key.'</option>';
            $i++;
        }
        return response()->json([
            'status'=>200,
            'data'=> $data
        ]);
    }
  
    public function store(Request $request)
    {
       
         $rule =[
            'user_name' => 'required|max:30',
            'email' => 'required|email|unique:office_account,email',
            'password' => 'required|same:confirm_password|max:30',
            'state' => 'required',
            'role_user' => 'required'
         ];
         $message =[
            'user_name.required' => 'يجب أدخال الأسم. ' ,
            'user_name.max' => 'عدد الأحرف لا تتعدي 30. ' ,
           
            'email.required' => 'يجب أدخال البريدي الألكتروني.' ,
            'email.email' => 'يجب أدخال البريد بصيغه صحيحة مثلا: test@test.ly' ,
            'email.unique' => 'البريد الالكتروني موجود مسبقاّ' ,
            'password.required' => 'يجب أدخال كلمة المرور' ,
            'password.same' => 'كلمة المرور غير متطابقة' ,
            'state.required' => 'يجب تحديد الحالة',
            'role_user.required' => 'يجب تحديد الصلاحية' ,
        ];
        $validator = Validator::make($request->all(),$rule, $message);

        if($validator->fails())
        {
            return response()->json([
                'state'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{
            
            $user = new office_Account();
            $user->name = $request->user_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->state_account = $request->state;
            $user->office_info_id = Auth::guard('office')->user()->office_info_id;
           // $user->office_info_id = 1;
            $user->assignRole($request->role_user);
            $user->save();

            return response()->json([
                'state' => '200',
                'message' => 'تم أضافة المستخدم بنجاح',
            ]);  
        }


                // $input = $request->all();


                // $input['password'] = Hash::make($input['password']);

                // $user = User::create($input);
                // $user->assignRole($request->input('roles_name'));
                // return redirect()->route('users.index')
                //     ->with('success', 'تم اضافة المستخدم بنجاح');
    }

  
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = office_Account::find($id);
        $roles = Role::pluck('id', 'name')->sort()->all();
       return response()->json([
           'state' => '200' ,
           'message' => [
               'user' =>$user ,
               'roles'=>$roles,
               'role_user'=>$user->getRoleNames(),
           ]
        ]);
        // return view('office.users.edit', compact('user', 'roles', 'userRole'));
    }


    public function update(Request $request, $id)
    {

        $rules =[
            'edit_user_name' => 'required|max:30|alpha_dash',
            'edit_email' => 'required|email|unique:office_account,email,'. $id,
            'edit_select' => 'required',
            'edit_state' => 'required'
        ] ;
        $message =[
            'edit_user_name.required' => 'يجب إدخال الأسم',
            'edit_user_name.max' => 'عدد الأحرف لا تتعدي 30. ' ,
            'edit_user_name.alpha_dash' =>'يجب أن يحتوي الأسم علي حروف  وأرقام.' ,
            'edit_email.required' => 'يجب إدخال البريد الألكتروني',
            'edit_email.email' => 'يجب ادخال الصيغة الصحيحه للبريد الالكتروني',
            'edit_email.unique' => 'هذ البريد موجود مسبقا ',
            'password.same' => 'كملة المرور غير مطابقة',
            'edit_select.required' => 'يجب تحديد صلاحية المستخدم',
            'edit_state.required' => 'يجب تحديد حالة المستخدم'
        ];
         $validator = Validator::make($request->all(),$rules,$message);

         if($validator->fails())
         {
             return response()->json([
                 'state'=>400,
                 'errors'=>$validator->messages()
             ]);
         }else{
            // DB::table('model_has_roles')->where('model_id', $id)->delete();

            $user= new office_Account();
            $user->name = $request->edit_user_name;
            if(office_Account::where('id',$id)->where('email',$request->edit_email))
            { }
            else $user->email = $request->edit_email;
            $user->state_account = $request->edit_state;
            $user->assignRole($request->edit_select);
            $user->update();

            return response()->json([
                'state'=>200,
            ]);



             
         
            
        }

        // $user = User::find($id);
        // $user->update($input);
        // $user->assignRole($request->input('roles'));
       
        // return redirect()->route('users.index')
        //     ->with('success', 'تم تحديث معلومات المستخدم بنجاح');
    }

    
      
   

    public function delete(Request $request)
    {
        office_Account::find($request->id)->delete();
        return "true"; 
    }
}
