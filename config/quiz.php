<?php

return [

    'models' => [

        /*
        *   Tipo do Modelo que será responderá o questionário
        */
        'type' => App\User::class,

    ],

    'table_names' => [

        /*
        *   Nome da tabela utilizada para os questionários
        */
        'questionnaires' => 'questionnaires',

        /*
        *   Nome da tabela do relacionamento de questionários e modelo
        */
        'model_has_questionnaires' => 'model_has_questionnaires'

    ],

    'column_names' => [

        /*
        *   Nome da coluna da chave estrangeira para questionnaire
        */
        'questionnaire_id' => 'questionnaire_id',

        /*
        *   Nome da coluna id da relacao polimorfica
        */
        'model_morph_key' => 'model_id',

        /*
        *   Nome da coluna do modelo da relacao polimorfica
        */
        'model_morph_type' => 'model_type'

    ],

    'question_types' => [

        'OPEN'          => ['id' => 1, 'name' => 'Questão aberta', 'description' => 'Questão com resposta livre para o usuário'],
        'CLOSED'        => ['id' => 2, 'name' => 'Questão fechada', 'description' => 'Questão fechada com alternativas de respostas para o usuário'],
        'ATTACHMENT'    => ['id' => 3, 'name' => 'Questão respondida via anexo', 'description' => 'Questão cuja resposta é o upload de um anexo']

    ]
];
