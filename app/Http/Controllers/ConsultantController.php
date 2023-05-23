<?php

namespace App\Http\Controllers;

use App\Models\Consultants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;


class ConsultantController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * Consultant login
     * 
     * @param Request $request - Gets POST request parameters
     * @return redirect To /index if credentials are bad, /login if credentials are wrong
     */

    public function ConsultantLogin(Request $request){

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:8',
        ]);
        
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials, true)) {
            return redirect()->intended('/');
        }

        return redirect('login')->with('result', ['danger', 'Incorrect username or password!']);

    }


    /**
     * Consultant logout
     * 
     * @return redirect To /login after logout procedure
     */

    public function ConsultantLogout(){
        Auth::logout();
        return redirect('login');
    }

    /**
     * Creates an consultant account
     * @param Request $request - Gets POST request parameters
     */
    
    public function CreateConsultantAccount(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        
        
        Consultants::create([
            'UID' => generateUniqueMongoId('consultants'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => password_hash($request->input('password'), PASSWORD_DEFAULT),
            'image' => 'https://www.citypng.com/public/uploads/small/11640168385jtmh7kpmvna5ddyynoxsjy5leb1nmpvqooaavkrjmt9zs7vtvuqi4lcwofkzsaejalxn7ggpim4hkg0wbwtzsrp1ldijzbdbsj5z.png'
        ]);

        return redirect('consultants/create');        

    }

}
