<?php

namespace App\Http\Controllers\Web\Content\Levels;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\Question;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::get();
        return view('content.levels.levels', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.levels.create.create_level');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateInput($request);

        Level::create($data);

        return redirect()->back()->with('success', 'Add level successfully');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $level = Level::find($id);

        return view('content.levels.create.create_level', compact('level'));
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
        $level = Level::find($id);
        if ($level->position == $request->input('position')){
            $data = $request->validate([
               'name' => 'required',
                'position' => 'integer'
            ]);
        }else {
            $data = $this->validateInput($request);
        }

        Level::where('id', $id)->update($data);

        return redirect()->back()->with('success', 'Update level successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::where('level_id', $id)->update(['level_id' => null]);
        Level::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Delete level successfully');
    }

    public function validateInput($request)
    {
        return $request->validate([
              'name' => 'required',
              'position' => 'required|integer|unique:levels,position'
          ]);
    }
}
