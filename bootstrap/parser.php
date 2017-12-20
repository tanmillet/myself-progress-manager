<?php
/*
|--------------------------------------------------------------------------
| 系统解析数据 解析层 parser
|--------------------------------------------------------------------------
|
| 由于部分数据并不需要进行controller 业务逻辑层进行处理数据
| 不需要传统的mvc模式 直接使用mvp模式
|
*/
if (!function_exists("parser_taskprogress")) {

    function parser_task_progress($task_progress_id): string
    {
        $task_progresses = config('progressbase.task_progress');
        if (isset($task_progresses[$task_progress_id])) {
            return $task_progresses[$task_progress_id];
        }
        return '未知';
    }
}