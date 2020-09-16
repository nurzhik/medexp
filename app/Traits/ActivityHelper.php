<?php


namespace App\Traits;


use App\Analytics;
use App\Expertise;
use App\GosZakup;
use App\NpaProject;
use App\ScienceActivity;
use Illuminate\Support\Facades\File;

trait ActivityHelper
{
    public function addActivityHandle($request)
    {
        switch ($request->type)
        {
            case 1:
                $add = new NpaProject();
                $add->title = $request->title;
                $add->lang = $request->lang;
                $add->files = $this->uploadStorage($request,'npaproject') ?? '';
                if ($add->save()) {
                    return true;
                }
            break;
            case 2:
                $add = new ScienceActivity();
                $add->title = $request->title;
                $add->file_more = $request->file_more;
                $add->lang = $request->lang;
                $add->files = $this->uploadStorage($request,'activies') ?? '';
                if ($add->save()) {
                    return true;
                }
            break;
            case 3:
                $add = new Analytics;
                $add->title = $request->title;
                $add->lang = $request->lang;
                $add->files = $this->uploadStorage($request,'analytics') ?? '';
                if ($add->save()) {
                    return true;
                }
            break;
            case 4:
                $add = new GosZakup();
                $add->title = $request->title;
                $add->link = $request->link;
                $add->lang = $request->lang;
                if ($add->save()) {
                    return true;
                }
            break;

            case 5:
                $add = new Expertise();
                $add->lang = $request->lang;
                $add->title = $request->title;
                if ($add->save()) {
                    return true;
                }
            break;
            case 6:
                $add = new Expertise();
                $add->title = $request->title;
                $add->lang = $request->lang;
                $add->parent_id = $request->id;
                $add->text = $request->text;
                if ($add->save()) {
                    return true;
                }
            break;

        }
        return false;
    }
    public function updateActivityHandle($request)
    {
        switch ($request->type)
        {
            case 1:
                $add = NpaProject::find($request->id);
                $add->title = $request->title;
                $add->lang = $request->lang;
                if ($request->hasFile('file')) {
                    $add->files = $this->uploadStorage($request,'npaproject') ?? '';
                }
                if ($add->save()) {
                    return true;
                }
                break;
            case 2:
                $add =  ScienceActivity::find($request->id);
                $add->title = $request->title;
                $add->lang = $request->lang;
                $add->file_more = $request->file_more;
                if ($request->hasFile('file')) {
                    $add->files = $this->uploadStorage($request,'activies') ?? '';
                }
                if ($add->save()) {
                    return true;
                }
                break;
            case 3:
                $add =  Analytics::find($request->id);
                $add->title = $request->title;
                $add->lang = $request->lang;
                if ($request->hasFile('file')) {
                    $add->files = $this->uploadStorage($request, 'analytics') ?? '';
                }
                if ($add->save()) {
                    return true;
                }
                break;
            case 4:
                $add =  GosZakup::find($request->id);
                $add->title = $request->title;
                $add->lang = $request->lang;
                $add->link = $request->link;
                if ($add->save()) {
                    return true;
                }
                break;

            case 5:
                $add =  Expertise::find($request->id);
                $add->title = $request->title;
                $add->lang = $request->lang;
                if ($add->save()) {
                    return true;
                }
                break;
            case 6:
                $add =  Expertise::find($request->post_id);
                $add->title = $request->title;
                $add->parent_id = $request->id;
                $add->lang = $request->lang;
                $add->text = $request->text_;
                if ($add->save()) {
                    return true;
                }
                break;

        }
        return false;
    }

    public function removeHandle($request)
    {
        switch ($request['type'])
        {
            case 1:
                $add = NpaProject::find($request['id']);
                if ($add) {
                    $add->files ? File::delete(storage_path('app/'.$add->files)) : false;
                }
                if ($add->delete()) {
                    return true;
                }
                break;
            case 2:
                $add =  ScienceActivity::find($request['id']);
                if ($add) {
                    $add->files ? File::delete(storage_path('app/'.$add->files)) : false;
                }
                if ($add->delete()) {
                    return true;
                }
                break;
            case 3:
                $add =  Analytics::find($request['id']);
                if ($add) {
                    $add->files ? File::delete(storage_path('app/'.$add->files)) : false;
                }
                if ($add->delete()) {
                    return true;
                }
                break;
            case 4:
                $add =  GosZakup::find($request['id']);
                if ($add->delete()) {
                    return true;
                }
                break;

            case 5:
                $add =  Expertise::find($request['id']);
                if ($add->delete()) {
                    return true;
                }
            case 6:
                $add =  Expertise::find($request['id']);
                if ($add->delete()) {
                    return true;
                }
                break;

        }
        return false;
    }
    protected function uploadStorage($request,$folderName)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file')->store($folderName);
            return $file;
        }
        return false;
    }
}
