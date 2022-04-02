<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\HoldingCompetition;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class CompetitionsController extends Controller
{
    public function about()
    {
        return view('about');
    }

    public function index(Request $request)
    {
if(Auth::check()){
//$type_name =  strtolower(Auth::user()->type_name);
//$type_name =  substr($type_name, strrpos($type_name, "\\")+1,strlen($type_name) );
if(!empty(Auth::user()->type_name))
        $competitions = Competition::where( 'user_type',Auth::user()->type_name)->get();
else
$competitions = Competition::all();

}
else{
	$competitions = Competition::all();
}
        return view('competitions', ['competitions' => $competitions]);

    }

    public function schedule()
    {
        $competitions = Competition::all();
        return view('schedule', ['competitions' => $competitions]);
    }

    public function holdCompetitionForm(Request $request, $competition_id)
    {
        $competition = Competition::find($competition_id);
        return view('admin.hold_competition_form', ['competition' => $competition]);

    }

    public function holdCompetition(Request $request, $competition_id): \Illuminate\Http\RedirectResponse
    {
        $holding = HoldingCompetition::find($request['id']);
        $competition = Competition::find($competition_id);
        $data = [
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date']
        ];
        if ($holding) {
            $holding->update($data);
        } else {
            $holding = new HoldingCompetition($data);
        }
        $holding->competition()->associate($competition);
        $holding->save();
        return redirect()->back();
    }

    public function holdingUsers(Request $request, $holding_id)
    {
        $holding = HoldingCompetition::find($holding_id);
        return view('admin.holding_users',['holding'=>$holding]);
    }

    public function deleteHolding(Request $request, $holding_id): \Illuminate\Http\RedirectResponse
    {
	$holding =HoldingCompetition::find($holding_id);
	\File::deleteDirectory(public_path(Competition::answers_folder_path.$holding_id));
        $holding ->delete();
	
        return redirect()->back();
    }

    public function competition(Request $request, $competition_id)
    {
        $competition = Competition::find($competition_id);
        return view('competition', ['competition' => $competition]);
    }

    public function teachingMaterial(Request $request, $competition_id)
    {
        $competition = Competition::find($competition_id);
        return view('teaching_material', ['competition' => $competition]);
    }

    public function competitionForm($competition_id = null)
    {
        $competition = Competition::find($competition_id);

        return view('admin.competition.competition_form', ['competition' => $competition]);
    }

    public function competitionDescriptionForm(Request $request, $competition_id)
    {
        return view('admin.competition.description_form', ['data' => $request['data'], 'competition_id' => $competition_id]);
    }

    public function competitionMaterialsForm(Request $request, $competition_id)
    {
        return view('admin.competition.teaching_materials_form', ['data' => $request['data'], 'competition_id' => $competition_id]);
    }


    public function save(Request $request, $page, $competition_id = null)
    {
        switch ($page) {
            case 'teaching_materials':

                $data = [
                    'description' => $request['description'],
                    'teaching_materials' => $request['teaching_materials'],
                ];
                $validator = [
                    'description' => Competition::rules()['description'],
                    'teaching_materials' => Competition::rules()['teaching_materials']
                ];
                Validator::make($data, $validator)->validate();
                $competition = Competition::find($competition_id);
                $competition->update($data);
                $competition->save();
                return redirect(route('admin.home'));
                break;
            case 'description':

                $data = [
                    'description' => $request['description'],
                    'teaching_materials' => $request['teaching_materials'],
                ];
                $validator = [
                    'description' => Competition::rules()['description'],
                    'teaching_materials' => Competition::rules()['teaching_materials']
                ];

                Validator::make($data, $validator)->validate();

                $competition = Competition::find($competition_id);
                $competition->update($data);
                $competition->save();
                //return redirect(route('admin.competition_materials_form', ['competition_id' => $competition_id, 'data' => $data]));
                return view('admin.competition.teaching_materials_form', ['data' =>  $data, 'competition_id' => $competition->id]);
                break;
            case 'all':
		#dd($this->validator($request->all())->errors()->first());
                $this->validator($request->all())->validate();
                $competition = Competition::find($competition_id);
                if ($competition) {
                    $competition->update(
                        ['name' => $request['name'],
                            'max_points' => $request['max_points'],
                            'user_type' => $request['user_type'],
                            'preview_text' => $request['preview_text'],
                        ]);
                } else {
                    $competition = new Competition([
                        'name' => $request['name'],
                        'max_points' => $request['max_points'],
                        'user_type' => $request['user_type'],
                        'preview_text' => $request['preview_text'],
                        'description' => $request['description'],
                        'teaching_materials' => $request['teaching_materials'],
                    ]);
                }

                $competition->save();
                if (array_key_exists('video', $request->all())) {
                    $video = $request->file('video');
		    $extension = $request->file('video')->extension();
                    $files = Storage::disk('public')->files(Competition::videos_folder_path . $competition->id);

                    Storage::disk('public')->delete($files);
                    $video->storeAs(Competition::videos_folder_path, $competition->id, 'public');
                }

                $data = [
                    'description' => $request['description'],
                    'teaching_materials' => $request['teaching_materials'],
                ];
                //return redirect(route('admin.competition_description_form', ['data' => $data, 'competition_id' => $competition->id]));
                return view('admin.competition.description_form', ['data' =>  $data, 'competition_id' => $competition->id]);
                break;
            default:
                abort(500, 'Invalid request');
                break;
        }
    }

    protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
    {
        $validator = Competition::rules();
        return Validator::make($data, $validator);
    }

    public function delete(Request $request, $competition_id): \Illuminate\Http\RedirectResponse
    {
        Competition::find($competition_id)->delete();
        return redirect()->back();
    }
}
