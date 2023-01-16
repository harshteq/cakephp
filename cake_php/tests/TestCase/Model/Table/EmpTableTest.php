<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmpTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmpTable Test Case
 */
class EmpTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EmpTable
     */
    protected $Emp;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Emp',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Emp') ? [] : ['className' => EmpTable::class];
        $this->Emp = $this->getTableLocator()->get('Emp', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Emp);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EmpTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
