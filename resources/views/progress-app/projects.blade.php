@extends('progress-app.layout')

@section('tan-main')
    <section class="vbox" id="bjax-el">
        <section class="scrollable padder-lg">
            <h3 class="font-thin m-b">项目列表
                <span class=""><a href="/pro/show/project/"><i class="icon-plus"></i></a></span>
            </h3>
            <div class="row row-sm">
                @forelse($projects as $project)

                    <div class="col-xs-6 col-sm-4 col-md-3">

                        <div class="item">
                            <a href="/pro/project/detail/{{base64_encode($project->id)}}">
                                <div class="pos-rlt">
                                    <img src="/tan-admin/images/m40.jpg" alt=""
                                         class="r r-2x img-full">
                                </div>
                            </a>
                            <div class="padder-v">
                                <p>
                                    <a class="btn btn-sm btn-default"
                                       href="/pro/project/detail/{{base64_encode($project->id)}}">
                                        <i class="icon-screen-desktop text-info"></i>
                                        <span class="text" data-toggle="tooltip" data-placement="right"
                                              data-original-title="{{$project->project_tag}}">{{$project->project_name}}</span>
                                    </a>
                                    <a class="btn btn-sm btn-default" data-toggle="button">
                                        <i class="fa fa-group text-info"></i> 25
                                    </a>
                                    <a class=" btn btn-info btn-sm" href="/pro/show/project/{{base64_encode($project->id)}}">
                                        <i class="fa fa-edit"></i> 编辑 </i>
                                    </a>
                                    <a class=" btn btn-info btn-sm" href="/pro/show/task/null/{{base64_encode($project->id)}}">
                                        <i class="fa fa-plus"></i> 任务 </i>
                                    </a>
                                    <a class=" btn btn-danger btn-sm oper-del" data-id="{{base64_encode($project->id)}}"
                                       data-name="{{$project->project_name}}"
                                       data-url="/pro/destroy/project">
                                        <i class="fa fa-bitbucket-square "> 删除 </i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </section>
    </section>
@endsection

@section('tan-js')
    <script src="/tan-admin/assets/vendor/require.js"
            data-main="/tan-admin/assets/app/controller/op-project-ctrl"></script>
@endsection