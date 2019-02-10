<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Auth;

class PermissionController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permission = Permission::all();

        return view('Components.Access Controls.Permissions.index')->with('permissions',$permission);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('Components.Access Controls.Permissions.create')->with('roles',$roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>'required|max:40'
        ]);

        $name = $request['name'];
        $permission = new Permission();
        $permission->name = $name;

        $roles = $request['roles'];

        $permission->save();

        if(!empty($request['name'])) {
            foreach ($roles as $role) {
                $r = Role::where('id','=',$role)->firstOrFail();
                $permission = Permission::where('name','=',$name)->first();

                $r->givePermissionTo($permission);
            }
        }

        return redirect()->route('permission.index')->with('flash_message','اجازه دسرسی'.$permission->name.' ذخیره شد!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('permissions');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        return view('Components.Access Controls.Permissions.edit',compact('permission'));
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
        $permission = Permission::findOrFail($id);
        $this->validate($request,[
            'name'=>'required|max:40'
        ]);
        $input = $request->all();
        $permission->fill($input)->save();

        return redirect()->route('permission.index')
            ->with('flash_message','اجازه دسرسی'.$permission->name.' به روزرسانی شد!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);

        if ($permission->name == "Administer roles & permissions") {
            return redirect()->route('permissions.index')
                ->with('flash_message',
                    'این اجازه دسرسی نمی تواند حذف شود!');
        }

        $permission->delete();

        return redirect()->route('permissions.index')
            ->with('flash_message',
                'اجازه دسرسی حذف شد!');

    }
}
