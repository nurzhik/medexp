<?php

namespace App\Http\Controllers;

use App\Expertise;
use App\GosService;
use App\NpaBase;
use App\NpaProject;
use App\ScienceActivity;
use App\Traits\Uploader;
use App\WorkPlan;
use App\GosZakup;
use App\Analytics;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    use Uploader;
    public function expertise()
    {
        $expertise = Expertise::parentId(0)->where('lang',app()->getLocale())->get();

        return view('front.expertise_type',[
            'expertise'=>$expertise
        ]);
    }
    public function view($id,$lang=null)
    {
        $expertise = Expertise::where('id',$id)->where('lang',app()->getLocale())->first();
         if(empty($expertise))
            return redirect()->to('/404');
         return view('front.expertise_view',[
            'data'=>$expertise,
            'lang' =>$lang,
        ]);
    }
    public function planWork()
    {
        $workPlan = WorkPlan::where('lang',app()->getLocale())->get();
        return view('front.work_plan',[
            'workPlan'=>$workPlan
        ]);
    }

    public function npaBase()
    {
        $npaBase = NpaBase::where('lang',app()->getLocale())->get();

        return view('front.npa_base',[
            'npaBase'=>$npaBase
        ]);
    }

    public function npaProjects()
    {
        $npaProjects = NpaProject::where('lang',app()->getLocale())->get();

        return view('front.npa_project',[
            'npaProjects'=>$npaProjects
        ]);
    }

    public function scienceActivity()
    {
        $activites = ScienceActivity::where('lang',app()->getLocale())->get();

        return view('front.science_activity',[
            'activites'=>$activites
        ]);
    }
    public function gosZakup()
    {
        $goszakup = GosZakup::where('lang',app()->getLocale())->get();

        return view('front.goszakup',[
            'goszakup'=>$goszakup
        ]);
    }

    public function gosUslugi()
    {
        $gosservices = GosService::parentId(0)->where('lang',app()->getLocale())->get();

        return view('front.gos_services',[
            'gosservices'=>$gosservices
        ]);
    }
    public function analytics()
    {
        $analytics = Analytics::where('lang',app()->getLocale())->get();

        return view('front.statistics',[
            'analytics'=>$analytics
        ]);
    }
}
