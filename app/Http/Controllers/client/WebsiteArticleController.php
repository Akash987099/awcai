<?php
namespace App\Http\Controllers\client;
use App\Http\Controllers\Controller;
use App\Models\client\WebsiteArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class WebsiteArticleController extends Controller {
 public function index(){ $articles=WebsiteArticle::where('client_id',Auth::guard('client')->id())->latest('publish_date')->paginate(12); return view('panel.client.article.index',compact('articles')); }
 public function store(Request $r){ $c=Auth::guard('client')->user(); $d=$this->data($r,true); $d['featured_image']=$this->upload($r,$c); WebsiteArticle::create($d+['client_id'=>$c->id]); return back()->with('success','Article added successfully.'); }
 public function delete($id){ $a=WebsiteArticle::where('client_id',Auth::guard('client')->id())->find($id); if(!$a)return response()->json(['status'=>'error','message'=>'Article not found.'],404); if($a->featured_image&&File::exists(public_path($a->featured_image)))File::delete(public_path($a->featured_image)); $a->delete(); return response()->json(['status'=>'success']); }
 private function data(Request $r,bool $required): array { return $r->validate(['title'=>['required','string','max:180'],'summary'=>['nullable','string','max:500'],'content'=>['nullable','string','max:10000'],'publish_date'=>['nullable','date'],'status'=>['required','in:draft,published'],'meta_title'=>['nullable','string','max:160'],'meta_description'=>['nullable','string','max:500'],'featured_image'=>[$required?'required':'nullable','image','mimes:jpg,jpeg,png,webp','max:4096']]); }
 private function upload(Request $r,$client): string { $key=str_replace(['/','\\','..'],'',trim((string)$client->api_key)); abort_if($key==='',422,'Client API key is missing.'); $dir="$key/uploads/articles"; File::ensureDirectoryExists(public_path($dir),0755,true); $f=$r->file('featured_image'); $name=time().'_'.uniqid().'.'.$f->getClientOriginalExtension(); $f->move(public_path($dir),$name); return "$dir/$name"; }
}