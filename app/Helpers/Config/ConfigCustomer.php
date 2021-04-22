<?php

namespace App\Helpers\Config;

/**
 * 客户管理配置数据
 */
class ConfigCustomer
{
    /**
     * 业务类型
     *
     * @return void
     */
    public function businessType()
    {
        return [
            [
                "key" => "自有收购",
                "value" => "1",
            ],
            [
                "key" => "出售自有",
                "value" => "2",
            ],
            [
                "key" => "代办新办",
                "value" => "3",
            ],
            [
                "key" => "代办增项",
                "value" => "4",
            ],
            [
                "key" => "代办延期",
                "value" => "5",
            ],
            [
                "key" => "代办升级",
                "value" => "6",
            ],
            [
                "key" => "代办分立",
                "value" => "7",
            ],
            [
                "key" => "合作升级",
                "value" => "8",
            ],
            [
                "key" => "居间转让",
                "value" => "9",
            ],
        ];
    }

    /**
     * 客户状态
     *
     * @return void
     */
    public function customerState()
    {
        return [
            [
                "key" => "潜在客户",
                "value" => "1",
            ],
            [
                "key" => "意向客户",
                "value" => "2",
            ],
            [
                "key" => "成交客户",
                "value" => "3",
            ],
            [
                "key" => "失败客户",
                "value" => "4",
            ],

            [
                "key" => "已流失客户",
                "value" => "5",
            ],
        ];
    }

    /**
     * 客户来源
     *
     * @return void
     */
    public function customerSource()
    {
        return [
            [
                "key" => "营销通电话",
                "value" => "1",
            ],
            [
                "key" => "官网后台留言",
                "value" => "2",
            ],
            [
                "key" => "400电话",
                "value" => "3",
            ],
            [
                "key" => "SEO推广渠道",
                "value" => "4",
            ],

            [
                "key" => "新媒体（抖音等）",
                "value" => "5",
            ],
            [
                "key" => "客户介绍",
                "value" => "6",
            ],
            [
                "key" => "朋友介绍",
                "value" => "7",
            ],
            [
                "key" => "同行介绍",
                "value" => "8",
            ],
            [
                "key" => "陌生电话",
                "value" => "9",
            ],
            [
                "key" => "公共关系",
                "value" => "10",
            ],
            [
                "key" => "微信",
                "value" => "11",
            ],
            [
                "key" => "QQ",
                "value" => "12",
            ],
        ];

    }

    /**
     * 客户类别
     *
     * @return void
     */
    public function customerType()
    {
        return [
            [
                "key" => "个人",
                "value" => "1",
            ],
            [
                "key" => "企业",
                "value" => "2",
            ],
            [
                "key" => "同行",
                "value" => "3",
            ],
        ];
    }

    /**
     * 跟进情况
     *
     * @return void
     */
    public function followUpStatus()
    {
        return [
            [
                "key" => "今日跟进过",
                "value" => "1",
            ],
            [
                "key" => "3天未跟进",
                "value" => "2",
            ],
            [
                "key" => "7天未跟进",
                "value" => "3",
            ],
            [
                "key" => "15天未跟进",
                "value" => "4",
            ],

            [
                "key" => "30天未跟进",
                "value" => "5",
            ],
            [
                "key" => "60天未跟进",
                "value" => "6",
            ],
            [
                "key" => "从未跟进",
                "value" => "7",
            ],
        ];
    }

    /**
     * 新增情况
     *
     * @return void
     */
    public function newStatus()
    {
        return [
            [
                "key" => "本日新增",
                "value" => "1",
            ],
            [
                "key" => "本月新增",
                "value" => "2",
            ],
            [
                "key" => "本年新增",
                "value" => "3",
            ],
        ];
    }

    /**
     * 资质预警
     *
     * @return void
     */
    public function qualiWarning()
    {
        return [
            [
                "key" => "30天",
                "value" => "30",
            ],
            [
                "key" => "60天",
                "value" => "60",
            ],
            [
                "key" => "90天",
                "value" => "90",
            ],
            [
                "key" => "180天",
                "value" => "180",
            ],
        ];
    }

    /**
     * 安许预警
     *
     * @return void
     */
    public function securityPermissionWarning()
    {
        return [
            [
                "key" => "30天",
                "value" => "30",
            ],
            [
                "key" => "60天",
                "value" => "60",
            ],
            [
                "key" => "90天",
                "value" => "90",
            ],
            [
                "key" => "180天",
                "value" => "180",
            ],
        ];
    }

    /**
     * 跟进方式
     *
     * @return void
     */
    public function followUpType()
    {
        return [
            [
                "key" => "电话",
                "value" => "1",
            ],
            [
                "key" => "微信",
                "value" => "2",
            ],
            [
                "key" => "QQ",
                "value" => "3",
            ],
            [
                "key" => "Email",
                "value" => "4",
            ],
            [
                "key" => "登门拜访",
                "value" => "5",
            ],
        ];
    }
}
