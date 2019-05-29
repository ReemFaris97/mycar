<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Silber\Bouncer\Database\Ability;
use Silber\Bouncer\Database\Role;


class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('users_manage')) {
            return abort(401);
        }
        $roles = Role::where('name','!=',"*")->get();
        return view('admin.roles.index')->with(compact('roles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('users_manage')) {
            return abort(401);
        }
        $abilities = Ability::get();

        $abilities = $abilities->filter(function($q){
            return $q->name !=='*';
        });

        return view('admin.roles.create')->with(compact('abilities'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $collection = collect($request->input('abilities'));

        $abilities = $collection->filter(function($q){
            return $q !=="*";
        })->values();

        $role = new Role();
        $role->title = $request->title;
        $role->name ='en-name not available';

        if($role->save()){
            if($abilities->count() >0)
                $role->allow($abilities);

            session()->flash('success','تم إنشاء الدور بنجاح');
            return redirect(route('roles.index'));
        }

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
        if (!Gate::allows('users_manage')) {
            return abort(401);
        }
        $role = Role::findOrFail($id);

        $abilities = Ability::get();

        $abilities = $abilities->filter(function($q){
            return $q->name !=='*';
        });

        return view('admin.roles.edit')->with(compact('role','abilities'));


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
        $role = Role::find($id);
        $role->title = $request->title;
        $role->name ='en-name not available';

        if($role->save()){
            $collection = collect($request->input('abilities'));

            $abilities = $collection->filter(function ($q) {
                return $q !== "*";
            })->values();

            if($abilities->count() >0){
                foreach ($role->getAbilities() as $ability){
                    $role->disallow($ability->id);
                }
                $role->allow($abilities);
            }
        }

        session()->flash('success', 'تم تعديل الدور بنجاح');
        return redirect(route('roles.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $role = Role::findOrFail($request->id);

        if ($role->users->count() > 0) {
            return response()->json([
                'status' => false,
                'message' => 'عفواً, لا يمكنك حذف الدور نظراً لوجود مستخدمين مشتركين فيه'
            ]);
        }

        foreach ($role->getAbilities() as $ability) {
            $role->disallow($ability->id);
        }
        if($role->delete()){
            return response()->json([
                'status' => true,
                'data' => [
                    'id' => $request->id
                ],
                'message' => 'لقد تم عمليه الحذف بنجاح'
            ]);
        }

    }
}
