<?php

/**
 * 菜单操作配置文件
 */

namespace App\Helpers\Config;

class MenuActions
{

    /**
     * 菜单操作配置数据
     *
     * @return void
     */
    public static function getActions()
    {
        return [
             [
                "key" => "人员管理/用户列表",
                "value" => "userList",
                "actions" => [
                    [
                        "key" => "查看",
                        "value" => "view",
                    ],
                    [
                        "key" => "添加",
                        "value" => "add",
                    ],
                    [
                        "key" => "修改",
                        "value" => "edit",
                    ],
                    [
                        "key" => "状态",
                        "value" => "status",
                    ],
                    [
                        "key" => "重置密码",
                        "value" => "reset",
                    ],
                ],
            ],
            [
                "key" => "客户管理/全部客户",
                "value" => "custom",
                "actions" => [
                    [
                        "key" => "查看",
                        "value" => "view",
                    ],
                    [
                        "key" => "添加",
                        "value" => "add",
                    ],
                    [
                        "key" => "修改",
                        "value" => "edit",
                    ],
                    [
                        "key" => "状态",
                        "value" => "status",
                    ],
                ],
            ],
            [
                "key" => "组织架构",
                "value" => "areaManage",
                "actions" => [
                    [
                        "key" => "查看",
                        "value" => "view",
                    ],
                    [
                        "key" => "添加",
                        "value" => "add",
                    ],
                    [
                        "key" => "修改",
                        "value" => "edit",
                    ],
                ],
            ],
            [
                "key" => "资质管理",
                "value" => "qualiManage",
                "actions" => [
                    [
                        "key" => "查看",
                        "value" => "view",
                    ],
                    [
                        "key" => "添加",
                        "value" => "add",
                    ],
                    [
                        "key" => "修改",
                        "value" => "edit",
                    ],
                    [
                        "key" => "状态",
                        "value" => "status",
                    ],
                ],
            ],
            [
                "key" => "角色管理",
                "value" => "adminRole",
                "actions" => [
                    [
                        "key" => "查看",
                        "value" => "view",
                    ],
                    [
                        "key" => "添加",
                        "value" => "add",
                    ],
                    [
                        "key" => "修改",
                        "value" => "edit",
                    ],
                    [
                        "key" => "状态",
                        "value" => "status",
                    ],
                ],
            ],
            [
                "key" => "菜单设置",
                "value" => "adminMenu",
                "actions" => [
                    [
                        "key" => "查看",
                        "value" => "view",
                    ],
                    [
                        "key" => "添加",
                        "value" => "add",
                    ],
                    [
                        "key" => "修改",
                        "value" => "edit",
                    ],
                    [
                        "key" => "状态",
                        "value" => "status",
                    ],
                    [
                        "key" => "上传",
                        "value" => "upload_file",
                    ],

                ],
            ],
        ];
    }
}
