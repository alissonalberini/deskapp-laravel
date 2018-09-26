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

    'accepted'             => 'O atributo: deve ser aceito.',
    'active_url'           => 'O atributo: não é um URL válido.',
    'after'                => 'O atributo: deve ser uma data após: data.',
    'after_or_equal'       => 'O atributo: deve ser uma data após ou igual a: data.',
    'alpha'                => 'O atributo: pode conter apenas letras.',
    'alpha_dash'           => 'O atributo: pode conter apenas letras, números e traços.',
    'alpha_num'            => 'O atributo: pode conter apenas letras e números.',
    'array'                => 'O atributo: deve ser uma matriz.',
    'before'               => 'O atributo: deve ser uma data anterior a: data.',
    'before_or_equal'      => 'O atributo: deve ser uma data anterior ou igual a: date.',
    'between'              => [
        'numeric' => 'O atributo: deve estar entre: min e: max.',
        'file'    => 'O atributo: deve estar entre: min e: max kilobytes.',
        'string'  => 'O atributo: deve estar entre: min e: caracteres max.',
        'array'   => 'O atributo: deve ter entre: min e: itens max.',
    ],
    'boolean'              => 'O campo atributo: deve ser verdadeiro ou falso.',
    'confirmed'            => 'A confirmação de atributo: não corresponde.',
    'date'                 => 'O atributo: não é uma data válida.',
    'date_format'          => 'O atributo: não corresponde ao formato: formato.',
    'different'            => 'O atributo: e outros devem ser diferentes.',
    'digits'               => 'O atributo: deve ser: digits digits.',
    'digits_between'       => 'O atributo: deve estar entre: min e: dígitos máximos.',
    'dimensions'           => 'O atributo: tem dimensões de imagem inválidas.',
    'distinct'             => 'O campo atributo: tem um valor duplicado.',
    'email'                => 'O atributo: deve ser um endereço de e-mail válido.',
    'exists'               => 'O atributo selected: é inválido.',
    'file'                 => 'O atributo: deve ser um arquivo.',
    'filled'               => 'O campo atributo: é obrigatório.',
    'image'                => 'O atributo: deve ser uma imagem.',
    'in'                   => 'O atributo selected: é inválido.',
    'in_array'             => 'O campo atributo: não existe em: outros.',
    'integer'              => 'O atributo: deve ser um inteiro.',
    'ip'                   => 'O atributo: deve ser um endereço IP válido.',
    'json'                 => 'O atributo: deve ser uma cadeia JSON válida.',
    'lt'                   => [
        'numeric' => 'O :attribute deve ser menor que :value.',
        'file'    => 'O :attribute deve ser menor que :value kilobytes.',
        'string'  => 'O :attribute deve ser menor que :value caracteres.',
        'array'   => 'O :attribute deve ser menor que :value itens.',
    ],
    'lte'                  => [
        'numeric' => 'O :attribute deve ser menor ou igual a :value.',
        'file'    => 'O :attribute deve ser menor ou igual a :value kilobytes.',
        'string'  => 'O :attribute deve ser menor que ou igual :value caracteres.',
        'array'   => 'O :attribute não deve ter mais que :value itens.',
    ],
    'max'                  => [
        'numeric' => 'O :attribute não pode ser superior a :max.',
        'file'    => 'O :attribute não pode ser superior a :max kilobytes.',
        'string'  => 'O :attribute não pode ser superior a :max caracteres.',
        'array'   => 'O :attribute não pode ter mais do que :max itens.',
    ],
    'mimes'                => 'O :attribute deve ser um arquivo do tipo: :values.',
    'mimetypes'            => 'O :attribute deve ser um arquivo do tipo: :values.',
    'min'                  => [
        'numeric' => 'O :attribute deve ser pelo menos :min.',
        'file'    => 'O :attribute deve ser pelo menos :min kilobytes.',
        'string'  => 'O :attribute deve ser pelo menos :min caracteres.',
        'array'   => 'O :attribute deve ter pelo menos :min itens.',
    ],
    'not_in'               => 'O :attribute selecionado é inválido.',
    'not_regex'            => 'O :attribute está em um formato inválido.',
    'numeric'              => 'O :attribute deve ser um número.',
    'present'              => 'O :attribute o campo deve estar presente.',
    'regex'                => 'O :attribute o formato é inválido.',
    'required'             => 'O :attribute campo é obrigatório.',
    'required_if'          => 'O :attribute campo é obrigatório quando :oOr é :value.',
    'required_unless'      => 'O :attribute campo é obrigatório a menos que :oOr é em :values.',
    'required_with'        => 'O :attribute campo é obrigatório quando :values é presente.',
    'required_with_all'    => 'O :attribute campo é obrigatório quando :values é presente.',
    'required_without'     => 'O :attribute campo é obrigatório quando :values não é presente.',
    'required_without_all' => 'O :attribute campo é obrigatório quando none de :values estão presentes.',
    'same'                 => 'O :attribute e :oOr deve combinar.',
    'size'                 => [
        'numeric' => 'O :attribute deve ter :size.',
        'file'    => 'O :attribute deve ter :size kilobytes.',
        'string'  => 'O :attribute deve ter :size caracteres.',
        'array'   => 'O :attributedeve conter :size itens.',
    ],
    'string'               => 'O :attribute deve ter um texto.',
    'timezone'             => 'O :attribute deve ter uma zona válida.',
    'unique'               => 'O :attribute unico já está em uso.',
    'uploaded'             => 'O :attribute falha no upload.',
    'url'                  => 'O :attribute formato é invalido.',

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
