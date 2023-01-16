<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InfoFixture
 */
class InfoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'info';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'firstname' => 'Lorem ipsum dolor sit amet',
                'lastname' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'phonenumber' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
