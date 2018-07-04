@extends('layouts.app') 
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">建立測驗</div>
            {{ bs()->openForm('post', '/exam') }}  {{-- //bs 代表bootstrap --}}
            {{ bs()->input('text', 'username', '吳弘凱')->placeholder('請填入姓名') }}
            {{ bs()->text('username')->placeholder('請填入姓名') }}
            {{ bs()->text('username', '小型輸入框')->sizeSmall() }}
            {{ bs()->text('username', '大型數入框')->sizeLarge() }}
            {{ bs()->hidden('op', '隱藏欄位') }}
            {{ bs()->password('pass', '密碼欄位') }}
            {{ bs()->email('email', 'Email欄位') }}
            {{ bs()->textArea('content', '這是大量文字框') }}
            {{ bs()->select('enable', ['1' => '開啟', '0' => '關閉'], '1') }}
            {{ bs()->select('color', ['red' => '紅色', 'green' => '綠色', 'biue' => '藍色'])
                ->multiple()
                ->value(['red', 'green'])
                ->placeholder('可多選') }}
                {{ bs()->checkbox('remember')->description('記住我')->checked() }}
                {{ bs()->radioGroup('enable', [1 => '啟用', 0 => '關閉'])
                ->selectedOption(1)
                ->inline()
                ->radioDisabled()
                ->addRadioClass(['bg-light', 'my-3']) }}

            {{ bs()->file('avatar2', '選擇一個檔案') }}
            {{ bs()->simpleFile('avatar') }}

            {{ bs()->submit('送出按鈕') }}
            {{ bs()->button('一般按鈕') }}

            {{ bs()->badge()->text('預設徽章') }}
            {{ bs()->badge()->text('顯示成藥丸狀')->pill() }}
            {{ bs()->badge('info')->text('加上連結')->link('#') }}

            {{ bs()->inputGroup()
                ->prefix('共')
                ->suffix('元')
                ->control(bs()->text('username')->placeholder('請填入金額')) }}
            {{ bs()->token() }}
            {{ bs()->closeForm() }}



    @component('bs::alert', ['type' => 'info', 'animated' => true, 'dismissible' => true, 'data' => ['alert-id' => 40, 'context' => 'sample-code']])
    @slot('heading')
        info 警告視窗
    @endslot

    <p>dismissible 右上會出現 x 符號，用來關閉；animated 在關閉時會有漸變效果；data 可以用來設置一些屬性</p>
    <p>除了 type 外，其餘參數截可省略</p>
@endcomponent


@component('bs::jumbotron', ['fluid' => true])
    @slot('heading')
        巨幕主標題
    @endslot
    @slot('subheading')
        這裡是次標題
    @endslot

    <hr class="my-3">
    <p>這裡愛寫啥都行</p>

    @slot('actions')
        {!! bs()->a('#', '這是個連結按鈕')->asButton('primary') !!}
    @endslot
@endcomponent

           
        </div>
    </div>
</div>

@endsection