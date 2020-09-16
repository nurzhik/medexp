<?php


namespace App\Http\Controllers\Admin;


use App\Analytics;
use App\Expertise;
use App\GosService;
use App\GosZakup;
use App\Http\Controllers\Controller;
use App\NpaProject;
use App\ScienceActivity;
use App\Traits\Uploader;
use App\WorkPlan;
use App\NpaBase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function planWork()
    {
        $workPlan = WorkPlan::all();
        $find = WorkPlan::find(\request()->post_id ?? 0);
        return view('admin.activity.planwork',[
            'workPlan'=>$workPlan,
            'find'=>$find
        ]);
    }

    public function expertise()
    {
        $expertise = Expertise::parentId(0)->get();
        $expertiseOne = Expertise::find(\request()->post_id ?? 0);

        return view('admin.activity.expertise',[
            'expertise'=>$expertise,
            'find'=>$expertiseOne
        ]);
    }

    public function viewExpertise($id)
    {
        $expertise = Expertise::parentId($id)->get();
        $expertiseOne = Expertise::find(\request()->post_id ?? 0);
        return view('admin.activity.expertiseposts',[
            'expertise'=>$expertise,
            'find'=>$expertiseOne
        ]);
    }

    public function postWorkPlan(Request $request)
    {
        if ($request->type == 1) {
            $workPlan =  WorkPlan::find($request->id);
            $workPlan->title = $request->title;
             $workPlan->lang = $request->lang;
            if ($request->hasFile('file')) {
                $workPlan->files = $this->storageUpload($request,'planWork') ?? '';
            }
            if ($workPlan->save()) {
                return redirect()->back()->with('success','Успешно добавлено');
            }
        }else {
            $workPlan = new WorkPlan();
            $workPlan->title = $request->title;
             $workPlan->lang = $request->lang;
            $workPlan->files = $this->storageUpload($request,'planWork') ?? '';
            if ($workPlan->save()) {
                return redirect()->back()->with('success','Успешно добавлено');
            }
        }

    }

    public function planWorkRemove($id)
    {
        $remove = WorkPlan::find($id);
        if ($remove) {
            $remove->files ? File::delete(storage_path('app/'.$remove->files)) : false;
        }
        if ($remove->delete()) {
            return redirect()->back()->with('success','Успешно удалено');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }
    public function NpaBase()
    {
        $npabase = NpaBase::all();
        $find = NpaBase::find(\request()->post_id ?? 0);

        return view('admin.activity.npabase',[
            'npabase'=>$npabase,
            'find'=>$find
        ]);
    }

    public function postNpaBase(Request $request)
    {
        if ($request->type == 1) {

            $npabase =  NpaBase::find($request->id);
            $npabase->title = $request->title;
            $npabase->link = $request->link;
            $npabase->lang = $request->lang;
            if ($npabase->save()) {
                return redirect()->back()->with('success','Успешно изменено');
            }
        }else {
            $npabase = new NpaBase();
            $npabase->title = $request->title;
            $npabase->link = $request->link;
            $npabase->lang = $request->lang;
            if ($npabase->save()) {
                return redirect()->back()->with('success','Успешно добавлено');
            }
        }


    }
    public function removeNpaBase($id, Request $request)
    {
        $npabase = NpaBase::find($id);

        if ( $npabase->delete()) {
            return redirect()->back()->with('success','Успешно удалено');
        }
        return redirect()->back()->with('error','Повторите еще раз');

    }
    public function npaProjects()
    {
        $npaprojects = NpaProject::all();
        $find = NpaProject::find(\request()->post_id ?? 0);
        return view('admin.activity.npaprojects',[
            'npaprojects'=>$npaprojects,
            'find'=>$find
        ]);
    }

    public function activities()
    {
        $activities = ScienceActivity::all();
        $find = ScienceActivity::find(\request()->post_id ?? 0);
        return view('admin.activity.activities',[
            'activities'=>$activities,
            'find'=>$find
        ]);
    }

    public function statics()
    {
        $statics = Analytics::all();
        $find = Analytics::find(\request()->post_id ?? 0);
        return view('admin.activity.analytics',[
            'statics'=>$statics,
            'find'=>$find
        ]);
    }
    public function gosZakup()
    {
        $goszakup = GosZakup::all();
        $find = GosZakup::find(\request()->post_id ?? 0);
        return view('admin.activity.goszakup',[
            'goszakup'=>$goszakup,
            'find'=>$find
        ]);
    }

    public function addUploadData(Request $request)
    {
        if ($this->addActivityHandle($request)) {
            return redirect()->back()->with('success','Успешно добавлено');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }

    public function updateUploadData(Request $request)
    {
        if ($this->updateActivityHandle($request)) {
            return redirect()->back()->with('success','Успешно редактировано');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }

    public function removeHandler($id,$type)
    {
        $request = ['id'=>$id,'type'=>$type];
        if ($this->removeHandle($request)) {
            return redirect()->back()->with('success','Успешно добавлено');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }

    public function gosServiceList()
    {
        $list = GosService::parentId(0)->get();
        $find = GosService::find(\request()->post_id ?? 0);

        return view('admin.humans.gosuslugi',[
            'list'=>$list,
            'find'=>$find
        ]);
    }

    public function viewList($id)
    {
        $list = GosService::parentId($id)->get();
        $find = GosService::find(\request()->post_id ?? 0);
        return view('admin.humans.viewgos',[
            'list'=>$list,
            'find'=>$find
        ]);
    }

    public function addGosUslugi(Request $request)
    {
        if ($this->gosHandler($request)) {
            return redirect()->back()->with('success','Успешно ');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }

    private function gosHandler($request)
    {
        switch ($request->type)
        {
            case 1:
                $post = new GosService();
                $post->title = $request->title;
                $post->type = 0;
                 $post->lang = $request->lang;
                if ($post->save()) {
                    return true;
                }
                break;
            case 2:
                $post = new GosService();
                $post->title = $request->title;
                $post->type = $request->type_;
                $post->parent_id = $request->id;
                 $post->lang = $request->lang;
                if ($request->hasFile('file')) {
                    $post->data = $request->file('file')->store('gosservices');
                }
                if ($request->link) {
                    $post->data = $request->link;
                }
                if ($post->save()) {
                    return true;
                }
                break;
            case 3:
                $post =  GosService::find($request->id);
                $post->title = $request->title;
                 $post->lang = $request->lang;
                if ($post->save()) {
                    return true;
                }
                break;
            case 4:
                $post =  GosService::find($request->id);
                $post->title = $request->title;
                $post->type = $request->type_;
                 $post->lang = $request->lang;
                if ($request->hasFile('file')) {
                    $post->data = $request->file('file')->store('gosservices');
                }
                if ($request->link) {
                    $post->data = $request->link;
                }
                if ($post->save()) {
                    return true;
                }
                break;
        }
        return false;
    }

    public function removeGosService($id,$type)
    {
        if ($type == 1) {
            $remove = GosService::find($id);
            GosService::parentId($remove->id)->delete();
            if ($remove->delete()) {
                return redirect()->back()->with('success','Успешно удалено');
            }

        }else if($type == 2) {
            $remove = GosService::find($id);

            if ($remove->delete()) {
                return redirect()->back()->with('success','Успешно удалено');
            }
        }
    }

}
