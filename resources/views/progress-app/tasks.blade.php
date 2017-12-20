@extends('progress-app.layout')

@section('tan-main')
    <section class="vbox">
        <section class="scrollable padder">
            <section class="panel panel-default">
                <header class="panel-heading">
                    任务列表
                </header>
                <div class="row wrapper">
                    <div class="col-sm-5 m-b-xs">
                        <select class="input-sm form-control input-s-sm inline v-middle">
                            <option value="0">选择操作</option>
                            <option value="1">删除选中</option>
                            <option value="2">导出</option>
                        </select>
                        <button class="btn btn-sm btn-default">执行</button>
                    </div>
                    <div class="col-sm-4 m-b-xs">
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" class="input-sm form-control" placeholder="Search">
                            <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Go!</button>
                      </span>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                        <tr>
                            <th style="width:20px;"><label class="checkbox m-n i-checks"><input type="checkbox"><i></i></label>
                            </th>
                            <th>任务标题</th>
                            <th>任务标识</th>
                            <th>任务优先度</th>
                            <th>任务进度</th>
                            <th>任务创建人</th>
                            <th>任务开始时间</th>
                            <th>任务完成时间</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($tasks as $task)
                            <tr>
                                <td><label class="checkbox m-n i-checks"><input type="checkbox" name="post[]"><i></i></label> </td>
                                <td> <a href="/admin2/show/role/{{base64_encode($task->id)}}">{{$task->task_title}}</a></td>
                                <td>{{$task->task_tag}}</td>
                                <td>{{$task->task_priority}}</td>
                                <td>{{$task->task_progress}}</td>
                                <td>{{$task->task_creater}}</td>
                                <td>{{$task->task_start_date}}</td>
                                <td>{{$task->task_end_date}}</td>
                                <td>{{$task->updated_at}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="/admin2/show/role/{{base64_encode($task->id)}}"
                                           class="btn  btn-sm btn-info">
                                            编辑
                                        </a>
                                        <a class="btn  btn-sm btn-danger oper-del"
                                           data-id="{{base64_encode($task->id)}}"
                                           data-name="{{$task->task_title}}" data-url="/admin2/destroy/role">删除
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            empty!
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-4 hidden-xs">
                            <select class="input-sm form-control input-s-sm inline v-middle">
                                <option value="0">选择操作</option>
                                <option value="1">删除选中</option>
                                <option value="2">导出</option>
                            </select>
                            <button class="btn btn-sm btn-default">执行</button>
                        </div>
                        <div class="col-sm-4 text-center">
                            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                        </div>
                        <div class="col-sm-4 text-right text-center-xs">
                            <ul class="pagination pagination-sm m-t-none m-b-none">
                                <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </footer>
            </section>
        </section>
    </section>
@endsection


@section('tan-js')
    <script src="/tan-admin/assets/vendor/require.js"
            data-main="/tan-admin/assets/app/controller/op-role-ctrl"></script>
@endsection