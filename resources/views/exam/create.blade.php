@extends('layouts.app') 
@section('content')
    <h1>{{ __('Exam Create') }}</h1>

    @can('建立測驗')
        {{ bs()->openForm('post', '/exam') }}

            {{ bs()->formGroup()
                ->label('測驗標題',false,'text-sm-right')
                ->control(bs()->text('title')->placeholder('請填入測驗標題'))
                ->showAsRow()
                }}

            {{ bs()->formGroup()
                ->label('是否啟用？',false,'text-sm-right')
                ->control(bs()->radioGroup('enable', [1 => '啟用', 0 => '關閉'])->selectedOption(1)->inline())
                ->showAsRow()
                }}

            {{ bs()->submit('儲存') }}
        {{ bs()->closeForm() }}
    @else
        @component('bs::alert', ['type' => 'danger'])
            @slot('heading')
                沒有建立測驗的權限
            @endslot

            <p>請先登入，或確定身份。</p>
        @endcomponent
    @endcan
@stop