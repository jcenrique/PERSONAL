<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ResidenciasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ResidenciasTable Test Case
 */
class ResidenciasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ResidenciasTable
     */
    public $Residencias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.residencias',
        'app.puestos_gestion',
        'app.agentes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Residencias') ? [] : ['className' => 'App\Model\Table\ResidenciasTable'];
        $this->Residencias = TableRegistry::get('Residencias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Residencias);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
