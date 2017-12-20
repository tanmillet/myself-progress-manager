<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    //
    /**
     * @author Terry Lucas
     * @var array
     */
    protected $guarded = [
        'id',
        'updated_at',
        'created_at',
    ];

    /**
     * @author Terry Lucas
     * @var array
     */
    protected $fillable = [
        'project_name',
        'project_tag',
        'project_type',
        'project_status',
        'project_digest',
        'project_context',
        'project_milestone',
        'project_creater',
    ];

    /**
     * @author Terry Lucas
     * Role constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable('projects');
    }

    /**
     * 获得此项目的任务列表
     * @author Terry Lucas
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks(): HasMany
    {
        return $this->hasMany('App\Task');
    }
}
