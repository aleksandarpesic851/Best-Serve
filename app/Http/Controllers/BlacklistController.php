<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blacklist;
use Image;

class BlacklistController extends Controller
{
    public function index()
    {
        return view('blacklist.index');
    }

    public function create()
    {
        return view('blacklist.create');
    }

    public function edit($id)
    {
        $blacklist = Blacklist::find($id);
        return view('blacklist.edit', compact('blacklist'));
    }

    public function showdata($id) 
    {
        $blacklist = Blacklist::find($id);
        return view('blacklist.show', compact('blacklist'));
    }

    public function store(Request $request, Blacklist $model)
    {
        $avatar = $this->save_avatar($request);
        $birthday = (!empty($request->birthday)) ? ($request->birthday) : ('');
        $birthday = date('Y-m-d', strtotime($birthday));

        $newUser = $model->create($request->merge(['created_by' => auth()->user()->id, 'birthday' => $birthday])->all());
        $newUser->avatar = $avatar;
        $newUser->save();
        return redirect()->route('blacklist.index')->withStatus(__('New report successfully created.'));
    }

    public function destroy($id)
    {
        Blacklist::where('id',$id)->delete();
     
        return view('blacklist.index');
    }
    
    public function update(Request $request, $id)
    {
        $avatar = $this->save_avatar($request);
        $model = Blacklist::find($id);
        $model->update($request->all());
        if ($avatar != "user.png")
        {
            $model->update(['avatar' => $avatar]);
        }
        return redirect()->route('blacklist.index')->withStatus(__('Blacklist successfully updated.'));
    }

    private function save_avatar(Request $request){
        // Logic for user upload of avatar
        $filename = "user.png";
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(200, 200)->save( public_path('/uploads/blacklists/' . $filename ) );
        }
        return $filename;
    }

    public function getlist()
    {   
        $blacklistQuery = Blacklist::query();

        $start_date = (!empty($_GET["start_date"])) ? ($_GET["start_date"]) : ('');
        $end_date = (!empty($_GET["end_date"])) ? ($_GET["end_date"]) : ('');
        $full_name = (!empty($_GET["full_name"])) ? ($_GET["full_name"]) : ('');
        $business = (!empty($_GET["business"])) ? ($_GET["business"]) : ('');
        $birthday = (!empty($_GET["birthday"])) ? ($_GET["birthday"]) : ('');
        $nationality = (!empty($_GET["nationality"])) ? ($_GET["nationality"]) : ('');
        $national_id_card_no = (!empty($_GET["national_id_card_no"])) ? ($_GET["national_id_card_no"]) : ('');
        $social_security_no = (!empty($_GET["social_security_no"])) ? ($_GET["social_security_no"]) : ('');
        $country_residence = (!empty($_GET["country_residence"])) ? ($_GET["country_residence"]) : ('');
        $zip_code = (!empty($_GET["zip_code"])) ? ($_GET["zip_code"]) : ('');
        
        if($start_date && $end_date){
    
         $start_date = date('Y-m-d', strtotime($start_date));
         $end_date = date('Y-m-d', strtotime($end_date));
         
         $blacklistQuery = $blacklistQuery->whereRaw("date(created_at) >= '" . $start_date . "' AND date(created_at) <= '" . $end_date . "'");
        }

        if($birthday) {
            $birthday = date('Y-m-d', strtotime($birthday));
            $blacklistQuery = $blacklistQuery->whereRaw("date(birthday) = '" . $birthday . "'");
        }
        
        if($full_name) {
            $blacklistQuery = $blacklistQuery->where('full_name', 'like', '%'.$full_name.'%');;
        }
        if($business) {
            $blacklistQuery = $blacklistQuery->where('business', 'like', '%'.$business.'%');
        }
        if($nationality) {
            $blacklistQuery = $blacklistQuery->where('nationality', 'like', '%'.$nationality.'%');
        }
        if($national_id_card_no) {
            $blacklistQuery = $blacklistQuery->where('national_id_card_no', 'like', '%'.$national_id_card_no.'%');
        }
        if($social_security_no) {
            $blacklistQuery = $blacklistQuery->where('social_security_no', 'like', '%'.$social_security_no.'%');
        }
        if($country_residence) {
            $blacklistQuery = $blacklistQuery->where('country_residence', 'like', '%'.$country_residence.'%');
        }
        if($zip_code) {
            $blacklistQuery = $blacklistQuery->where('zip_code', 'like', '%'.$zip_code.'%');
        }

        $blacklist = $blacklistQuery->orderby('created_at', 'desc')->select('*');
        return datatables()->of($blacklist)
                        ->addColumn('action', function ($row) {
                            $user = auth()->user();
                            if ($user->isAdmin() || $user->id == $row->created_by)
                            {
                                return " <a href='#' alt='Edit' id='edit_item' data-id=".$row->id."> <i class='material-icons'>edit</i></a>" . 
                                    " <a href='#' alt='Delete' id='delete_item' data-id=" . $row->id . "> <i class='material-icons'>delete</i></a>";
                            }
                            return "";
                        })
                        ->addIndexColumn()
                        ->editColumn('avatar', function ($row) {
                            if (empty($row->avatar)) {
                                $image_url = "/material/img/user.png";
                            } else {
                                $image_url = '/uploads/blacklists/' . $row->avatar;
                            }
                            return '<img src="' . $image_url . '" class="avatar-blacklist">';
                        })
                        ->editColumn('content', function ($row) {
                            return substr($row->content,0,200) . (strlen($row->content) > 200 ? "..." : "");
                        })
                        ->rawColumns(['action', 'avatar'])
                        ->make(true);
    }

}
