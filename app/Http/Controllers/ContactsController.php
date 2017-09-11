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
        'email' => ['required'],
        'photo' => ['mimes:jpeg,jpg,png,gif']
    ];

    private function getRequest(Request $request){
        $data = $request->all();

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoFullName = $photo->getClientOriginalName();
            $photoName = pathinfo($photoFullName,PATHINFO_FILENAME);
            $photoExtension = pathinfo($photoFullName,PATHINFO_EXTENSION);
            $photoSaveName = $photoName . '-' . time() . '.' . $photoExtension;
            $destination = config('uploads.path.full_path');
            $photo->move($destination,$photoSaveName);
            $data['photo'] = $photoSaveName;
        }

        return $data;
    }
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

        $data = $this->getRequest($request);

        Contact::create($data);

        return redirect('/contacts')->with('success','contact created successfully');
    }
    public function edit($id){
        $contact = Contact::find($id);
        $groups = Group::pluck('name','id');
        return view('contacts.edit',['contact'=>$contact,'groups' => $groups]);
    }


    public function update($id,Request $request){

        $this->validate($request,$this->rules);

        $contact = Contact::findOrFail($id);
        $oldPhoto = $contact->photo;
        $data = $this->getRequest($request);
        $contact->update($data);

        if ( $oldPhoto !== $contact->photo ) {
            $this->removePhoto($oldPhoto);
        }

        return redirect()->route('contacts.edit',['id' => $id])->with('success','contact updated successfully');
    }

    public function destroy($id){
        $contact = Contact::findOrFail($id);
        $this->removePhoto($contact->photo);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success','Contacts deleted successfully');
    }

    private function removePhoto($photo)
    {
        if ($photo != 'default.png'){
            $file_path = config('uploads.path.full_path').$photo;
            if(file_exists($file_path)){
                unlink($file_path);
            }
        }
    }
}
