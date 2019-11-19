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
        $content_files = $this->save_content_files($request);
        $birthday = (!empty($request->birthday)) ? ($request->birthday) : ('');
        $birthday = date('Y-m-d', strtotime($birthday));

        $newUser = $model->create($request->merge(['created_by' => auth()->user()->id, 'birthday' => $birthday])->all());
        $newUser->avatar = $avatar;
        $newUser->content_files = $content_files;
        $newUser->save();
        return redirect()->route('blacklist.index')->withStatus(__('messages.blacklist_create_message'));
    }

    public function destroy($id)
    {
        Blacklist::where('id',$id)->delete();
     
        return view('blacklist.index');
    }
    
    public function destro($id)
    {
        Blacklist::where('id',$id)->delete();
        return 'ok';
    }

    public function update(Request $request, $id)
    {
        $avatar = $this->save_avatar($request);
        $content_files = $this->save_content_files($request);
        $model = Blacklist::find($id);
        var_dump($request->except(['image_names']));
        $model->update($request->except(['image_names']));
        if ($avatar != "user.png")
        {
            $model->update(['avatar' => $avatar]);
        }
        $model->update(['content_files' => $content_files]);
        
        return redirect()->route('blacklist.index')->withStatus(__('messages.blacklist_updated_message'));
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

    private function save_content_files(Request $request) {
        $filenames = [];
        if($request->hasFile('contentfiles')){
            foreach($request->file('contentfiles') as $image) {
                $filename = time() . '-' . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->save( public_path('/uploads/blacklist_contents/' . $filename ) );
                $filenames[] = $filename;
            }
        }
        if(!empty($request->image_names)) {
            $originNames = explode(",", $request->image_names);
            $filenames = array_merge($filenames, $originNames);
        }

        return json_encode($filenames);
    }

    public function getlist()
    {   
        $blacklistQuery = Blacklist::query();

        $denounced_action = (!empty($_GET["denounced_action"])) ? ($_GET["denounced_action"]) : ('');
        $place_facts = (!empty($_GET["place_facts"])) ? ($_GET["place_facts"]) : ('');
        $full_name = (!empty($_GET["full_name"])) ? ($_GET["full_name"]) : ('');
        $provided_service = (!empty($_GET["provided_service"])) ? ($_GET["provided_service"]) : ('');
        $birthday = (!empty($_GET["birthday"])) ? ($_GET["birthday"]) : ('');
        $nationality = (!empty($_GET["nationality"])) ? ($_GET["nationality"]) : ('');
        $national_id_card_no = (!empty($_GET["national_id_card_no"])) ? ($_GET["national_id_card_no"]) : ('');
        $social_security_no = (!empty($_GET["social_security_no"])) ? ($_GET["social_security_no"]) : ('');
        $country_residence = (!empty($_GET["country_residence"])) ? ($_GET["country_residence"]) : ('');
        $accomplice = (!empty($_GET["accomplice"])) ? ($_GET["accomplice"]) : ('');
        $affected_entity = (!empty($_GET["affected_entity"])) ? ($_GET["affected_entity"]) : ('');
        
        if($birthday) {
            $birthday = date('Y-m-d', strtotime($birthday));
            $blacklistQuery = $blacklistQuery->whereRaw("date(birthday) = '" . $birthday . "'");
        }

        if($denounced_action) {
            $blacklistQuery = $blacklistQuery->where('denounced_action', 'like', '%'.$denounced_action.'%');;
        }

        if($place_facts) {
            $blacklistQuery = $blacklistQuery->where('place_facts', 'like', '%'.$place_facts.'%');;
        }
        
        if($full_name) {
            $blacklistQuery = $blacklistQuery->where('full_name', 'like', '%'.$full_name.'%');;
        }
        if($provided_service) {
            $blacklistQuery = $blacklistQuery->where('provided_service', 'like', '%'.$provided_service.'%');
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
        if($accomplice) {
            $blacklistQuery = $blacklistQuery->where('accomplice', 'like', '%'.$accomplice.'%');
        }
        if($affected_entity) {
            $blacklistQuery = $blacklistQuery->where('affected_entity', 'like', '%'.$affected_entity.'%');;
        }

        $blacklist = $blacklistQuery->orderby('created_at', 'desc')->select('*');
        $datatable = datatables()->of($blacklist)
                        ->addIndexColumn()
                        ->editColumn('avatar', function ($row) {
                            if (empty($row->avatar)) {
                                $image_url = "/material/img/user.png";
                            } else {
                                $image_url = '/uploads/blacklists/' . $row->avatar;
                            }
                            return '<img src="' . $image_url . '" class="avatar-blacklist">';
                        })
                        ->rawColumns(['avatar']);
                        
            if (auth()->user()->isAdmin()) {
                $datatable = $datatable->addColumn('action', function ($row) {
                                return " <a href='#' alt='Edit' id='edit_item' data-id=".$row->id."> <i class='material-icons'>edit</i></a>" . 
                                    " <a href='#' alt='Delete' id='delete_item' data-id=" . $row->id . "> <i class='material-icons'>delete</i></a>";
                            })
                            ->rawColumns(['action', 'avatar']);

            }
            return $datatable->make(true);
    }

}
