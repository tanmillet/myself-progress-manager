@extends('progress-app.layout')
@section('tan-css')
    <link rel="stylesheet" href="/tan-admin/js/datepicker/datepicker.css" type="text/css"/>
@endsection
@section('tan-main')
    <section class="vbox">
        <section class="scrollable padder">
            <div class="m-b-md">
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel panel-default">
                        <header class="panel-heading font-bold">新加任务</header>
                        <div class="panel-body">
                            <form role="form" id="upshowtask">
                                <div class="form-group">
                                    <label>任务标题</label>
                                    <input type="text" class="form-control" placeholder="" name="task_title"
                                           value="{{$task->task_title}}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">归属项目</label>
                                    <select name="project_id" class="form-control m-b">
                                        @foreach($projects as $project)
                                            <option value="{{$project->id}}" {{($project->id== $task->project_id) ? 'selected' : ''}}>{{$project->project_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">任务优先度</label>
                                    <select name="task_priority" class="form-control m-b">
                                        @foreach(config('progressbase.task_priority') as $key=>$task_priority)
                                            <option value="{{$key}}" {{($task->task_priority == $key) ? 'selected' : ''}}>{{$task_priority}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">任务进度</label>
                                    <select name="task_progress" class="form-control m-b">
                                        @foreach(config('progressbase.task_progress') as $key=>$task_progress)
                                            <option value="{{$key}}" {{($task->task_progress == $key) ? 'selected' : ''}}>{{$task_progress}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group pull-in clearfix">
                                    <div class="col-sm-6">
                                        <label>任务开始时间</label>
                                        <input class="datepicker-input form-control" type="text" value="{{date('Y-m-d' , time())}}" data-date-format="yyyy-mm-dd" name="task_start_date">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>任务完成时间</label>
                                        <input class="datepicker-input form-control" type="text" value="{{date('Y-m-d' , time())}}" data-date-format="yyyy-mm-dd" name="task_end_date">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">任务内容</label>
                                    <div class="btn-toolbar m-b-sm btn-editor" data-role="editor-toolbar"
                                         data-target="#editor">
                                        <div class="btn-group">
                                            <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"
                                               title="" data-original-title="Font"><i class="fa fa-font"></i><b
                                                        class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a data-edit="fontName Serif" style="font-family:'Serif'">Serif</a>
                                                </li>
                                                <li><a data-edit="fontName Sans" style="font-family:'Sans'">Sans</a>
                                                </li>
                                                <li><a data-edit="fontName Arial" style="font-family:'Arial'">Arial</a>
                                                </li>
                                                <li><a data-edit="fontName Arial Black"
                                                       style="font-family:'Arial Black'">Arial Black</a></li>
                                                <li><a data-edit="fontName Courier" style="font-family:'Courier'">Courier</a>
                                                </li>
                                                <li><a data-edit="fontName Courier New"
                                                       style="font-family:'Courier New'">Courier New</a></li>
                                                <li><a data-edit="fontName Comic Sans MS"
                                                       style="font-family:'Comic Sans MS'">Comic Sans MS</a></li>
                                                <li><a data-edit="fontName Helvetica" style="font-family:'Helvetica'">Helvetica</a>
                                                </li>
                                                <li><a data-edit="fontName Impact"
                                                       style="font-family:'Impact'">Impact</a></li>
                                                <li><a data-edit="fontName Lucida Grande"
                                                       style="font-family:'Lucida Grande'">Lucida Grande</a></li>
                                                <li><a data-edit="fontName Lucida Sans"
                                                       style="font-family:'Lucida Sans'">Lucida Sans</a></li>
                                                <li><a data-edit="fontName Tahoma"
                                                       style="font-family:'Tahoma'">Tahoma</a></li>
                                                <li><a data-edit="fontName Times" style="font-family:'Times'">Times</a>
                                                </li>
                                                <li><a data-edit="fontName Times New Roman"
                                                       style="font-family:'Times New Roman'">Times New Roman</a></li>
                                                <li><a data-edit="fontName Verdana" style="font-family:'Verdana'">Verdana</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group">
                                            <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"
                                               title="" data-original-title="Font Size"><i
                                                        class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a data-edit="fontSize 5" style="font-size:24px">Huge</a></li>
                                                <li><a data-edit="fontSize 3" style="font-size:18px">Normal</a></li>
                                                <li><a data-edit="fontSize 1" style="font-size:14px">Small</a></li>
                                            </ul>
                                        </div>
                                        <div class="btn-group">
                                            <a class="btn btn-default btn-sm" data-edit="bold" title=""
                                               data-original-title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                                            <a class="btn btn-default btn-sm" data-edit="italic" title=""
                                               data-original-title="Italic (Ctrl/Cmd+I)"><i
                                                        class="fa fa-italic"></i></a>
                                            <a class="btn btn-default btn-sm" data-edit="strikethrough" title=""
                                               data-original-title="Strikethrough"><i
                                                        class="fa fa-strikethrough"></i></a>
                                            <a class="btn btn-default btn-sm" data-edit="underline" title=""
                                               data-original-title="Underline (Ctrl/Cmd+U)"><i
                                                        class="fa fa-underline"></i></a>
                                        </div>
                                        <div class="btn-group">
                                            <a class="btn btn-default btn-sm" data-edit="insertunorderedlist" title=""
                                               data-original-title="Bullet list"><i class="fa fa-list-ul"></i></a>
                                            <a class="btn btn-default btn-sm" data-edit="insertorderedlist" title=""
                                               data-original-title="Number list"><i class="fa fa-list-ol"></i></a>
                                            <a class="btn btn-default btn-sm" data-edit="outdent" title=""
                                               data-original-title="Reduce indent (Shift+Tab)"><i
                                                        class="fa fa-dedent"></i></a>
                                            <a class="btn btn-default btn-sm" data-edit="indent" title=""
                                               data-original-title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                                        </div>
                                        <div class="btn-group">
                                            <a class="btn btn-default btn-sm btn-info" data-edit="justifyleft" title=""
                                               data-original-title="Align Left (Ctrl/Cmd+L)"><i
                                                        class="fa fa-align-left"></i></a>
                                            <a class="btn btn-default btn-sm" data-edit="justifycenter" title=""
                                               data-original-title="Center (Ctrl/Cmd+E)"><i
                                                        class="fa fa-align-center"></i></a>
                                            <a class="btn btn-default btn-sm" data-edit="justifyright" title=""
                                               data-original-title="Align Right (Ctrl/Cmd+R)"><i
                                                        class="fa fa-align-right"></i></a>
                                            <a class="btn btn-default btn-sm" data-edit="justifyfull" title=""
                                               data-original-title="Justify (Ctrl/Cmd+J)"><i
                                                        class="fa fa-align-justify"></i></a>
                                        </div>
                                        <div class="btn-group">
                                            <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"
                                               title="" data-original-title="Hyperlink"><i class="fa fa-link"></i></a>
                                            <div class="dropdown-menu">
                                                <div class="input-group m-l-xs m-r-xs">
                                                    <input class="form-control input-sm" placeholder="URL" type="text"
                                                           data-edit="createLink">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-default btn-sm" type="button">Add
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="btn btn-default btn-sm" data-edit="unlink" title=""
                                               data-original-title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                                        </div>
                                        <div class="btn-group hide">
                                            <a class="btn btn-default btn-sm" title="" id="pictureBtn"
                                               data-original-title="Insert picture (or just drag &amp; drop)"><i
                                                        class="fa fa-picture-o"></i></a>
                                            <input type="file" data-role="magic-overlay" data-target="#pictureBtn"
                                                   data-edit="insertImage"
                                                   style="opacity: 0; position: absolute; top: 0px; left: 0px; width: 0px; height: 0px;">
                                        </div>
                                        <div class="btn-group">
                                            <a class="btn btn-default btn-sm" data-edit="undo" title=""
                                               data-original-title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                                            <a class="btn btn-default btn-sm" data-edit="redo" title=""
                                               data-original-title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                                        </div>
                                    </div>
                                    <div id="editor" class="form-control"
                                         style="overflow:scroll;height:150px;max-height:150px" contenteditable="true" name="context">
                                    </div>
                                </div>
                                <button type="button" class="btn btn-sm btn-info oper-upshow">提交</button>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </section>
@endsection

@section('tan-js')
    <script src="/tan-admin/js/wysiwyg/jquery.hotkeys.js"></script>
    <script src="/tan-admin/js/wysiwyg/bootstrap-wysiwyg.js"></script>
    <script src="/tan-admin/js/wysiwyg/demo.js"></script>

    <script src="/tan-admin/js/datepicker/bootstrap-datepicker.js"></script>
    <script src="/tan-admin/assets/vendor/require.js"
            data-main="/tan-admin/assets/app/controller/op-task-ctrl"></script>
@endsection