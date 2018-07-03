@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">提示面板</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>

@endsection

@section('my_menu')
<li><a class="nav-link" href="/home">我的選項1</a></li>
<li><a class="nav-link" href="/home">我的選項2</a></li>
<li><a class="nav-link" href="/home">我的選項3</a></li>
<li><a class="nav-link" href="/home">我的選項4</a></li>
@parent 
@stop
