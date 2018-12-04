<?php
//ContactController.php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ContactController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        return view('contact');
    }
    public function list(){

        $users = DB::select('select * from contact ');
        return view('contact-list', ['contact' => $users]);

    }
    public function del(Request $request, $id){

        $users = $deleted = DB::delete('delete from contact where id = ?', [$id]);
        return redirect('list');
    }
    public function add(Request $request)
    {
        $firstname = $request->input('inputFirstName');
        $lastname = $request->input('inputLastName');
        $email = $request->input('inputEmail');
        $msg = $request->input('inputMessage');

    $users =  DB::insert('insert into contact ( firstname , lastname,email,msg) values (?, ? , ?, ?)',
     [$firstname,$lastname,$email,$msg]);

       return view('welcome');
       

        //
    }
}