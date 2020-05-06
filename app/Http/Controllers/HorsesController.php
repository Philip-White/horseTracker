<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Horse;
use App\User;


class HorsesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => []]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$horses = User::find($user_id)->horses
        //$horses = Horse::all();

        $user_id = auth()->user()->id;
        $horses = Horse::orderBy('barnName','desc')->where('user_id', $user_id)->paginate(1);

        return view('horses.index')->with('horses', $horses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('horses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'barnName' => 'required',
            'showName' => 'required',
            'gender' => 'required',
            'weight' => 'required',
            'colourMarkings' => 'required',
            'breed' => 'required',
            'dob' => 'required',
            'weight' => 'required',
            'healthIssues' => 'required',
            'pastAilments' => 'required',
            'lastWorked' => 'required',
            'feed' => 'required',
            'feedRecipe' => 'required',
            'workSchedule' => 'required',
            'notes' => 'required',
            'card_image' => 'image|nullable|max:1999'
        ]);


//Handle file upload

            if($request->hasFile('cover_image')){

                //Get filename with the extension
                $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

                //Get just file name
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

                //Get just the ext

                $extension = $request->file('cover_image')->getClientOriginalExtension();

                //Filename to store

                $fileNameToStore = $filename . '_' . time() . '.' . $extension;

                //Upload image

                $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

            }else{
                $fileNameToStore = 'noimage.jpg';
            }


            $horse = new Horse;
            $horse->barnName = $request->input('barnName');
            $horse->showName = $request->input('showName');
            $horse->gender = $request->input('gender');
            $horse->weight = $request->input('weight');
            $horse->colourMarkings = $request->input('colourMarkings');
            $horse->breed = $request->input('breed');
            $horse->dob = $request->input('dob');
            $horse->healthIssues = $request->input('healthIssues');
            $horse->pastAilments = $request->input('pastAilments');
            $horse->lastWorked = $request->input('lastWorked');
            $horse->feed = $request->input('feed');
            $horse->feedRecipe = $request->input('feedRecipe');
            $horse->workSchedule = $request->input('workSchedule');
            $horse->notes = $request->input('notes');
            $horse->cover_image = $fileNameToStore;




            $horse->user_id = auth()->user()->id;
            $horse->save();
            return redirect('/horses')->with('success', 'Horse Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $horse = Horse::find($id);
        return view('horses.show')->with('horse', $horse);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $horse = Horse::find($id);

        //Check for correct user

        if(auth()->user()->id !== $horse->user_id){
            return redirect('/horses')->with('error', 'Unauthorized Page');

        }
        return view('horses.edit')->with('horse', $horse);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
       /* $this->validate($request, [
            'barnName' => 'required',
            'showName' => 'required'
        ]);
        */

        if($request->hasFile('cover_image')){

            //Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            //Get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just the ext

            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //Filename to store

            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            //Upload image

            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

        }

            $horse = Horse::find($id);
            $horse->barnName = $request->input('barnName');
            $horse->showName = $request->input('showName');
            $horse->gender = $request->input('gender');
            $horse->weight = $request->input('weight');
            $horse->colourMarkings = $request->input('colourMarkings');
            $horse->breed = $request->input('breed');
            $horse->dob = $request->input('dob');
            $horse->healthIssues = $request->input('healthIssues');
            $horse->pastAilments = $request->input('pastAilments');
            $horse->lastWorked = $request->input('lastWorked');
            $horse->feed = $request->input('feed');
            $horse->feedRecipe = $request->input('feedRecipe');
            $horse->workSchedule = $request->input('workSchedule');
            $horse->notes = $request->input('notes');

            if($request->hasFile('cover_image')){
                $horse->cover_image = $fileNameToStore;
            }

            $horse->save();
            return redirect('/horses')->with('success', 'Horse Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $horse = Horse::find($id);

                    //Check for correct user

        if(auth()->user()->id !== $horse->user_id){
            return redirect('/horses')->with('error', 'Unauthorized Page');

        }

        if($horse->cover_image != 'noimage.jpg'){
            //Delete Image
            Storage::delete('public/cover_images/'.$horse->cover_image);
        }

        $horse->delete();
        return redirect('/horses')->with('success', 'Horse has been Deleted');
    }
}
