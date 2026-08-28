<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Template;

class TemplateController extends Controller
{
    protected $template;

    public function __construct()
    {
        $this->template = new Template();
    }
    public function index(){
        $templates = $this->template->orderBy('id', 'desc')->paginate(config('constants.pagination_limit'));
        return view('admin.template.index', compact('templates'));
    }

    public function add(){
        return view('admin.template.add');
    }

    public function store(Request $request){
        $data = [
            'name' => $request->name,
            'subject' => $request->subject,
            'body' => $request->body,
            'placeholders' => $request->placeholder,
        ];

        $this->template->create($data);

        return redirect()->back()->with('success', 'Success!');

    }

    public function edit($id){
        $template = $this->template->find($id);
        if(!$template){
            return redirect()->back()->with('error', 'no record found!');
        }
        return view('admin.template.edit', compact('template'));
    }

    public function update(Request $request){
        $template = $this->template->find($request->id);
         $data = [
            'name' => $request->name,
            'subject' => $request->subject,
            'body' => $request->body,
            'placeholders' => $request->placeholder,
        ];

        $template->update($data);

        return redirect()->back()->with('success', 'Success!');
    }

    public function delete($id)
    {
        try {
            $template = $this->template->find($id);
            $template->delete();

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'exceptionError', 'error' => $e->getMessage()]);
        }
    }

}
