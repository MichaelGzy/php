
@extends('layouts.home')
@section('title')
    <title>文章添加页</title>
@endsection

@section('main')
    <!-- //btm-wthree-left -->

    <div id="editor">
        <p>欢迎使用 <b>wangEditor</b> 富文本编辑器</p>
    </div>

    <!-- 注意， 只需要引用 JS，无需引用任何 CSS ！！！-->
    <script type="text/javascript" src="/js/wangEditor.min.js"></script>

    <script type="text/javascript">
        var E = window.wangEditor
        var editor = new E('#editor')
        // 或者 var editor = new E( document.getElementById('#editor') )
        editor.create()
    </script>

@endsection
