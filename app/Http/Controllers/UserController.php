<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = User::simplePaginate(5);
        return view('user.index')->with('records',$records);
    }
    
    
    public function index2()
    {
        $records = User::all();
        return view('user.index2')->with('records',$records);
    }
    
    
    public function index3()
    {
        $records = User::all();
        return view('user.index3')->with('records',$records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        try {
            
            User::create($request->all());            
            set_message_sucess('Registro criado com sucesso!');
           
        }
        catch (Exception $ex) {
            abort(500);
        }
        catch (\Exception $ex) {
            abort(500);
        }
        
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = User::findOrFail($id);
        return view('user.show')->with('edit', $record);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = User::findOrFail($id);
        return view('user.edit')->with('edit', $record);
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
        $this->validator($request->all())->validate();
        try{
            
            User::findOrFail($id)->update($request->all());
            set_message_sucess('Registro atualizado com sucesso!');
            
        }
        catch (Exception $ex) {
            abort(500);
        }
        catch (\Exception $ex) {
            abort(500);
        }
        
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            
            User::findOrFail($id)->delete();
            set_message_sucess('Registro removido com sucesso!');
            
        } catch (Exception $ex) {
            abort(500);
        }
        return redirect()->route('users.index');
        
    }
    
    protected function validator(array $data)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'email' => 'required|string|email|max:255|unique:users',
            
        ];
        
        if(isset($data['id'])){
            $rules['email'] = 'required|string|email|max:255';
            $rules[] .= Rule::unique('users')->ignore($data['id']);
        }
        
        return Validator::make($data, $rules);
        
    }
}
