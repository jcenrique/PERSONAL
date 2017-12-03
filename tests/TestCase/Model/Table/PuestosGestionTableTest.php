<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PuestosGestionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PuestosGestionTable Test Case
 */
class PuestosGestionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PuestosGestionTable
     */
    public $PuestosGestion;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.puestos_gestion'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PuestosGestion') ? [] : ['className' => 'App\Model\Table\PuestosGestionTable'];
        $this->PuestosGestion = TableRegistry::get('PuestosGestion', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PuestosGestion);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
