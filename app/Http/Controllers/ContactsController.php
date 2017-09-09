<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Group;
use App\Contact;


class ContactsController extends Controller
{
    private $limit = 5;
    private $rules = [
        'name' => ['required','min:5'],
        'company' => ['required'],
        'email' => ['required']
    ];
    public function index(Request $request){
        if ($group_id = ($request->get('group_id'))) {
            $contacts = Contact::where('group_id',$group_id)->orderBy('id','DESC')->paginate($this->limit);
        } else {
            $contacts = Contact::orderBy('id','DESC')->paginate($this->limit);
        }

        return view('contacts.index',['contacts' => $contacts]);
    }

    public function create(){
        $groups = Group::pluck('name','id');
        return view('contacts.create',['groups' => $groups]);
    }

    public function store(Request $request){
        $this->validate($request,$this->rules);


        Contact::create($request->all());

        return redirect('/contacts')->with('success','contact created successfully');
        // return view('contacts.create');
    }
    public function edit($id){
        $contact = Contact::find($id);
        $groups = Group::pluck('name','id');
        return view('contacts.edit',['contact'=>$contact,'groups' => $groups]);
    }


    public function update($id,Request $request){

        $this->validate($request,$this->rules);

        $contact = Contact::findOrFail($id);

        $contact->update($request->all());

        return redirect()->route('contacts.edit',['id' => $id])->with('success','contact updated successfully');
        // return view('contacts.create');
    }
}
