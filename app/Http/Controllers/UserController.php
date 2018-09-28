<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;

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
        return view('user.index2')->with('records',$records);
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
    public function store(UserRequest $request)
    {
        dd("oioio");
        try {
           User::create($request->all());
           
           $message = collect([
                'title' => 'titulo', 
                'message' => 'Oioioi mensagem', 
                'type' => 'success'
            ]);
           
        } catch (\Exception $e) {
            return response()->json(['error' => $e], 402);
        }
        return redirect()->route('users.index' ,compact('message'));
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
    public function update(UserRequest $request, $id)
    {
        dd($request);
        try{
            User::findOrFail($id)->update($request->validated());
        } catch (Exception $ex) {

        }
        $message = collect([
            'title' => 'Bom trabalho', 
            'message' => 'Registro atualizado com sucesso!', 
            'type' => 'success'
        ]);
        session()->flash($message);
        
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
        //
    }
}
