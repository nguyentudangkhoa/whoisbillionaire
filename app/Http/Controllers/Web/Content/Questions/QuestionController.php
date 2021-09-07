<?php

namespace App\Http\Controllers\Web\Content\Questions;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::get();

        return view('content.questions.questions', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::orderBy('position', 'asc')->get();

        return view('content.questions.create.create_question',compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $this->validateInput($request);

        Question::create($data);

        return redirect()->back()->with('success', 'Add question successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $question = Question::find($id);

        $levels = Level::orderBy('position', 'asc')->get();

        return view('content.questions.create.create_question', compact('question', 'levels'));
    }

    /**
     * Update the specified resource in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = $this->validateInput($request);

        Question::where('id', $request->input('id'))->update($data);

        return redirect()->back()->with('success', 'Update question successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Question::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Delete question successfully');
    }

    public function validateInput($request)
    {
        return $request->validate([
              'question' => 'required',
              'answer_a' => 'required',
              'answer_b' => 'required',
              'answer_c' => 'required',
              'answer_d' => 'required',
              'answer_right' => 'required',
              'voice' => 'required',
              'level_id' => 'required'
          ]);
    }
}
