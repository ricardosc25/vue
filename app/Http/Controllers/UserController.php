<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(4);
        return [
            'paginate' => [
                'total'         => $users->total(),
                'current_page'  => $users->currentPage(),
                'per_page'      => $users->perPage(),
                'last_page'     => $users->lastPage(),
                'from'          => $users->firstItem(),
                'to'            => $users->lastPage(),
            ],
            'users' => $users
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'bail|required|max:60|min:4'
        ]);

        User::create($request->all()); //El metodo Request->all() solo guarda lo que esta
                                       //configurado en el modelo User en la variable protected.
        Return; 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        User::find($id)->update($request->all());
        return ;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }
}
