<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\District;
use App\Models\admin\State;
use App\Models\api\Countries;

class DistrictController extends Controller
{
    protected $disctrict;
    protected $state;
    protected $country;

    public function __construct()
    {
        $this->disctrict = new District();
        $this->state     = new State();
        $this->country   = new Countries();
    }

    public function index(){
        $district = $this->disctrict->orderBy('id', 'desc')->paginate(config('constants.pagination_limit'));
        return view('admin.district.index', compact('district'));
    }
    public function add(){
        $country = $this->country->all();
        $state = $this->state->where('country_id', '1')->get();
        return view('admin.district.add', compact('country', 'state'));
    }
    public function store(Request $request){
        $data = [
            'state_id' => $request->state,
            'name'     => $request->name,
        ];
        $this->disctrict->create($data);
        return redirect()->back()->with('success', 'Success!');
    }
    public function edit($id){
        $disctrict = $this->disctrict->find($id);
        $country = $this->country->all();
        $state = $this->state->where('country_id', '1')->get();
        if($disctrict){
            return view('admin.district.edit', compact('country', 'state', 'disctrict'));
        }
        return redirect()->back()->with('error' , 'no record found!');
    }
    public function update(Request $request){
        $district = $this->disctrict->find($request->id);
        $data = [
            'state_id' => $request->state,
            'name'     => $request->name,
        ];
        $district->update($data);
        return redirect()->back()->with('success', 'Success!');
    }
    public function delete($id)
    {
        try {
            $district = $this->disctrict->findOrFail($id);
            $district->delete();
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'exceptionError', 'error' => $e->getMessage()]);
        }
    }

    public function district(){
        $district = $this->disctrict->select('id', 'state_id', 'name')->get();
        if ($district) {
            return response()->json(['status' => 'success', 'data' => $district], 200);
        }
        return response()->json(['statis' => 'error', 'msg' => 'no record found!']);
    }
    public function districtbyid($id){
        $district = $this->disctrict->select('id', 'state_id', 'name')->find($id);
        if ($district) {
            return response()->json(['status' => 'success', 'data' => $district], 200);
        }
        return response()->json(['statis' => 'error', 'msg' => 'no record found!']);
    }
    public function districtbystateid($id){
        $district = $this->disctrict->select('id', 'state_id', 'name')->where('state_id',$id)->get();
        if ($district) {
            return response()->json(['status' => 'success', 'data' => $district], 200);
        }
        return response()->json(['statis' => 'error', 'msg' => 'no record found!']);
    }
}
