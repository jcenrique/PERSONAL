<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AgentesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AgentesTable Test Case
 */
class AgentesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AgentesTable
     */
    public $Agentes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.agentes',
        'app.cargos',
        'app.residencias',
        'app.puestos_gestion',
        'app.devoluciones_computo',
        'app.devoluciones_sabados',
        'app.dia_adicional_vacaciones',
        'app.disponibilidad',
        'app.horas_computo',
        'app.observaciones',
        'app.reconocimientos_medico',
        'app.sabados_trabajados',
        'app.telefonos',
        'app.cursos',
        'app.agentes_cursos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Agentes') ? [] : ['className' => 'App\Model\Table\AgentesTable'];
        $this->Agentes = TableRegistry::get('Agentes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Agentes);

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
