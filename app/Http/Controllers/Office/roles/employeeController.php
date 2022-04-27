<?php

namespace App\Http\Controllers\Office\roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\office_Account;

use Spatie\Permission\Models\Role;
use DB;
use Hash;

class employeeController extends Controller
{
    public function index(Request $request)
    {
        $data = office_Account::orderBy('id', 'DESC')->paginate(5);
       
        return view('office.users.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();

        return view('users.Add_user', compact('roles'));
    }
  
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles_name' => 'required'
        ]);

        $input = $request->all();


        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles_name'));
        return redirect()->route('users.index')
            ->with('success', 'تم اضافة المستخدم بنجاح');
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
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('office.users.edit', compact('user', 'roles', 'userRole'));
    }
   
    public function update(Request $request, $id)
    {

      
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:office_account,email,' . $id,
            'password' => 'same:confirm-password',
            'type_user' => 'required',
            'state' => 'required_if:state,0'
        ] ,[
             'name.required' => 'يجب إدخال الأسم',
             'email.required' => 'يجب إدخال البريد الألكتروني',
             'email.email' => 'يجب ادخال الصيغة الصحيحه للبريد الالكتروني',
             'email.unique' => 'هذا البريد موجود مسبقا ',
             'password.same' => 'كملة المرور غير مطابقة',
             'type_user.required' => 'يجب تحديد نوع المستخدم',
             'state.required' => 'يجب تحديد حالة المستخدم'

        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = array_except($input, array('password'));
        }
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));
       
        return redirect()->route('users.index')
            ->with('success', 'تم تحديث معلومات المستخدم بنجاح');
    }
   

    public function delete(Request $request)
    {
        office_Account::find($request->user_id)->delete();
        return redirect()->route('office.show.employee')->with('success', 'تم حذف المستخدم بنجاح');
    }
}
