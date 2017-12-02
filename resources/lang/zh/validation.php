<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => '这个 :attribute 必须为确认。',
    'active_url'           => '这个 :attribute 不是一个有效的URL。',
    'after'                => '这个 :attribute 必须是一个 :date 日期以后的值。',
    'after_or_equal'       => '这个 :attribute 必须是一个等于或之后 :date 日期的值',
    'alpha'                => '这个 :attribute 只能包含字母。',
    'alpha_dash'           => '这个 :attribute 只能包含字母、数字、破折号（ - ）以及下划线（ _ ）。',
    'alpha_num'            => '这个 :attribute 只能包含字母、数字。',
    'array'                => '这个 :attribute 必须是一个 PHP 数组。',
    'before'               => '这个 :attribute 必须是给定日期 :date 之前的值。',
    'before_or_equal'      => '这个 :attribute 必须是一个等于或之前 :date 日期的值',
    'between'              => [
        'numeric' => '这个 :attribute 大小必须是在 :min 和 :max 之间的数字。',
        'file'    => '这个 :attribute 大小必须是在 :min 和 :max 之间的字节数。',
        'string'  => '这个 :attribute 长度必须是在 :min 和 :max 之间的字符串。',
        'array'   => '这个 :attribute 必须是在 :min 和 :max 之间的项目数。',
    ],
    'boolean'              => '这个 :attribute 字段必须为 true 或 false。',
    'confirmed'            => '这个 :attribute 与确认字段不符。',
    'date'                 => '这个 :attribute 不是一个有效的日期。',
    'date_format'          => '这个 :attribute 日期必须与给定的格式相匹配 :format 。',
    'different'            => '这个 :attribute 和 :other 必须不同',
    'digits'               => '这个 :attribute 必须是 :digits 数字.',
    'digits_between'       => '这个 :attribute 必须是 :min 和 :max 之间长度的数字。',
    'dimensions'           => '这个 :attribute 无效的图像尺寸。',
    'distinct'             => '这个 :attribute 字段具有重复值。',
    'email'                => '这个 :attribute 必须是一个有效的邮件地址。',
    'exists'               => '这个 查询 :attribute 是无效的。',
    'file'                 => '这个 :attribute 必须是一个成功上传的文件。',
    'filled'               => '这个 :attribute 字段必须有一个值。',
    'image'                => '这个 :attribute 必须是一个图像（ jpeg、png、bmp、gif、或 svg ）',
    'in'                   => '这个 查询 :attribute 是无效的。',
    'in_array'             => '这个 :attribute 字段值在 :other 中不存在。',
    'integer'              => '这个 :attribute 必须是整数。',
    'ip'                   => '这个 :attribute 必须是一个有效的 IP 地址。',
    'ipv4'                 => '这个 :attribute 必须是一个有效的 IPv4 地址。',
    'ipv6'                 => '这个 :attribute 必须是一个有效的 IPv6 地址。',
    'json'                 => '这个 :attribute 必须是一个有效的 JSON 字符串。',
    'max'                  => [
        'numeric' => '这个 :attribute 不能大于 :max 。',
        'file'    => '这个 :attribute 不能大于 :max 字节数。',
        'string'  => '这个 :attribute 不能大于 :max 字符串长度。',
        'array'   => '这个 :attribute 不能超过 :max 项目数。',
    ],
    'mimes'                => '这个 :attribute 文件类型必须是: :values.',
    'mimetypes'            => '这个 :attribute 文件类型必须是: :values.',
    'min'                  => [
        'numeric' => '这个 :attribute 最小为 :min。',
        'file'    => '这个 :attribute 最小为 :min 字节数。',
        'string'  => '这个 :attribute 最小为 :min 字符串长度。',
        'array'   => '这个 :attribute 最小为 :min 项目数。',
    ],
    'not_in'               => '这个查询 :attribute 是无效的。',
    'numeric'              => '这个 :attribute 必须是一个数字。',
    'present'              => '这个 :attribute 字段必须存在。',
    'regex'                => '这个 :attribute 格式是无效的。',
    'required'             => '这个 :attribute 字段是必须输入的。',
    'required_if'          => '这个 :attribute 字段必须输入当 :other 是 :value 时。',
    'required_unless'      => '这个 :attribute 字段是必须的，除非 :other 是 :values 时。 ',
    'required_with'        => '这个 :attribute 字段必须输入当 :values 存在时。',
    'required_with_all'    => '这个 :attribute 字段必须输入当 :values 存在时。',
    'required_without'     => '这个 :attribute 字段必须输入当 :values 不存在时。',
    'required_without_all' => '这个 :attribute 字段必须输入当 :values 中有一个不存在时。',
    'same'                 => '这个 :attribute 和 :other 必须匹配。',
    'size'                 => [
        'numeric' => '这个 :attribute 必须是 :size.',
        'file'    => '这个 :attribute 必须是 :size 字节数。',
        'string'  => '这个 :attribute 必须是 :size 字符串长度。',
        'array'   => '这个 :attribute 必须包含 :size 项目数。',
    ],
    'string'               => '这个 :attribute 必须是一个字符串。',
    'timezone'             => '这个 :attribute 必须是一个有效的时区。',
    'unique'               => '这个 :attribute 已经存在。',
    'uploaded'             => '这个 :attribute 上传失败',
    'url'                  => '这个 :attribute 格式无效。',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
