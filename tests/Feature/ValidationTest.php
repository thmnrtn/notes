<?php

namespace Tests\Feature;

use Tests\TestCase;

class ValidationTest extends TestCase
{
    protected $params = ['title' => 'Valid title', 'note' => 'Valid note'];

    public function testRequiredFields()
    {
        $requiredFields = ['title', 'note'];
        foreach ($requiredFields as $field) {
            $params = $this->params;
            unset($params[$field]);

            $response = $this->json('post', 'notes', $params);
            $content = json_decode($response->getContent());

            $this->assertObjectHasAttribute($field, $content->errors);
            $this->assertContains(
                'The ' . str_replace('_', ' ', $field) . ' field is required.',
                $content->errors->{$field}
            );
        }
    }
}
