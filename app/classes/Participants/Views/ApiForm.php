<?php

namespace App\Participants\Views;

class ApiForm extends \Core\Views\Form {

    public function __construct($data = []) {
        $this->data = [
            'fields' => [
                'name' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_text_lenght' => ['lenght' => 40],
                        ]
                    ]
                ],
                'comment' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_text_lenght' => ['lenght' => 500],
                        ]
                    ]
                ],
            ],
            'callbacks' => [
                'success' => 'form_success',
                'fail' => 'form_fail',
            ]
        ];
    }

}
