<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Contact;
use App\Models\admin\Salutation;

class ContactController extends Controller
{
    protected $contact;
    protected $salutation;

    public function __construct()
    {
        $this->contact = new Contact();
        $this->salutation = new Salutation();
    }
    public function index(){
        $contacts = $this->contact->orderBy('id', 'desc')->paginate(config('constants.pagination_limit'));
        return view('admin.contacts.index', compact('contacts'));
    }
    public function add(){
        $salutation = $this->salutation->all();
        return view('admin.contacts.add', compact('salutation'));
    }
    public function store(Request $request){
        $data = [
            'salutation' => $request->salutation,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'remark' => $request->remark,
        ];

        $this->contact->create($data);
        return redirect()->back()->with('success', 'Success!');
    }
    public function edit($id){
        $salutation = $this->salutation->all();
        $contact = $this->contact->find($id);
        if($contact){
            return view('admin.contacts.edit', compact('contact', 'salutation'));
        }
        return redirect()->back()->with('error', 'no record found!');
    }
    public function update(Request $request){
        $contact = $this->contact->find($request->id);
        $data = [
            'salutation' => $request->salutation,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'remark' => $request->remark,
        ];

        $contact->update($data);
        return redirect()->back()->with('success', 'Success!');
    }
    public function delete($id)
    {
        try {
            $contact = $this->contact->findOrFail($id);
            $contact->delete();

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'exceptionError', 'error' => $e->getMessage()]);
        }
    }
}
