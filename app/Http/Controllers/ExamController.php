<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Http\Requests\ExamRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //第一種呼叫全部
        // $exams = Exam::all();
        //第二種呼叫 + 分頁
        // $exams = Exam::where('enable', 1)
        //     ->orderBy('created_at', 'desc')
        //     ->take(10)
        //     ->paginate(10)
        // ;
        // return view('exam.index', ['exams' => $exams]);
        //第三種 加入判斷式
        $user = Auth::user();
        if ($user and $user->can('建立測驗')) {
            $exams = Exam::orderBy('created_at', 'desc')
                ->paginate(3);
        } else {
            $exams = Exam::where('enable', 1)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }

        return view('exam.index', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //一開始的寫法
        // return view('exam.create');
        //配合後來編輯測驗的寫法
        // $exam           = new Exam;
        // $exam['enable'] = 1;
        // $method         = 'post';
        // $action         = '/exam';
        // return view('exam.create', compact('exam', 'method', 'action'));

        //最後更正做法
        return view('exam.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamRequest $request)
    {
        //dd($request);
        //新增物件的方法
        // $exam          = new Exam;
        // $exam->title   = $request->title;
        // $exam->user_id = $request->user_id;
        // $exam->enable  = $request->enable;
        // $exam->save();

        //直接宣告的方法(model要先定義)
        // Exam::create([
        //     'title'   => $request->title,
        //     'user_id' => $request->user_id,
        //     'enable'  => $request->enable,
        // ]);

        //最常用(最簡單)(model要先定義)

        Exam::create($request->all());
        return redirect()->route('exam.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //dd($id) 第一種直接抓id
        // $exam = Exam::find($id);
        // return view('exam.show', compact('exam'));
        //dd($exam);第二種綁定物件給
        // $topics = Topic::where('exam_id', $exam->id)->get();
        // return view('exam.show', ['exam' => $exam, 'topics' => $topics]);

        //第三種直接使用關聯性方法呼叫
        // return view('exam.show', ['exam' => $exam]);

        //第四種 加入修改topic
        // $topic  = new Topic;
        // $method = 'post';
        // $action = '/topic';

        // return view('exam.show', compact('exam', 'topic', 'method', 'action'));

        $user = Auth::user();
        if ($user and $user->can('進行測驗')) {
            $exam->topics = $exam->topics->random(10);
        }
        return view('exam.show', compact('exam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //修改寫法
        // $method = 'patch';
        // $action = "/exam/" . $exam->id;
        // return view('exam.create', compact('exam', 'method', 'action'));

        //改成再試圖判斷
        return view('exam.create', compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExamRequest $request, Exam $exam)
    {
        $exam->update($request->all());
        return redirect()->route('exam.show', $exam->id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        //
        $exam->delete();
    }
}
