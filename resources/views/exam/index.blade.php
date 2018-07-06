@extends('layouts.app') 
@section('content')

<h1>所有測驗<small>（共 {{$exams->total()}} 筆資料）</small></h1>
<ul class="list-group">
        @forelse($exams as $exam)
            <li class="list-group-item">
                @if($exam->enable!=1)
                    {{ bs()->badge()->text('關閉') }}
                @endif
                {{ $exam->created_at->format("Y年m月d日") }} -
                <a href="exam/{{ $exam->id }}">
                    {{ $exam->title }}
                </a>
            </li>
        @empty
            <li class="list-group-item">尚無任何測驗</li>
        @endforelse
    </ul>
    <div class="my-3">
            {{ $exams->links() }}
        </div>

{{-- <ul class="list-group">
        @foreach($exams as $exam)
            <li class="list-group-item">
                {{ $exam->created_at->format("Y年m月d日") }} -
                <a href="exam/{{ $exam->id }}">
                    {{ $exam->title }}
                </a>
            </li>
        @endforeach
    </ul> --}}

@endsection
   