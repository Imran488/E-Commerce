<?php

namespace App\Http\Controllers\Backend;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function team(){
        $teams=Team::all();
        return view('admin.layouts.teamsetting.team_table',compact('teams'));
    }

    public function addTeam(){
        return view('admin.layouts.teamsetting.add_team');
    }

    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
            'name' => 'required',
            'designation' => 'required',
        ]);

        $imageUrl = str_replace(' ', '-', $request->name) . '-' . time() . '.' . $request->image->extension();
        $request->image->move(public_path('/uploads/team'), $imageUrl);

        Team::create([
            'image' => $imageUrl,
            'name'=>$request->name,
            'designation' => $request->designation,
        ]);
        return redirect()->route('team.setting')->with('message', 'Team Member added successfully');
    }
    public function edit($id)
    {
        $team = Team::find($id);
        return view('admin.layouts.teamsetting.team_edit', compact('team'));
    }
    public function update(Request $request, $id)
    {
        $team = Team::find($id);
        if(!empty($request->image)){
            $imageUrl = str_replace(' ', '-', $request->name) . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('/uploads/team'), $imageUrl);
            }else{
                $imageUrl=  $team->image;
            }
        $team->update([
            'image' => $imageUrl,
            'name' =>$request->name,
            'designation' => $request->designation,
        ]);
        return redirect()->route('team.setting')->with('message', 'Team Member List updated');
    }
    public function delete($id)
    {
        $team = Team::find($id);
        $image = str_replace('\\', '/', public_path('uploads/team/' . $team->image));
        unlink($image);
        $team->delete();
        return redirect()->route('team.setting')->with('error', 'Team Member deleted');

    }

    public function view($id)
    {
        $team = Team::find($id);
        return view('admin.layouts.teamsetting.team_view', compact('team'));
    }
    public function change(Request $request, $id)
    {
        $team = Team::find($id);
        if(!empty($request->image)){
            $imageUrl = str_replace(' ', '-', $request->name) . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('/uploads/team'), $imageUrl);
            }else{
                $imageUrl=  $team->image;
            }
        $team->update([
            'image' => $imageUrl,
        ]);
        return redirect()->route('team.setting')->with('message', 'Team Member Image Updated');
    }
}
