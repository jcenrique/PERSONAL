<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AgentesFormationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AgentesFormationsTable Test Case
 */
class AgentesFormationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AgentesFormationsTable
     */
    public $AgentesFormations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.agentes_formations',
        'app.formaciones',
        'app.cursos',
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
        'app.agentes_formaciones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AgentesFormations') ? [] : ['className' => 'App\Model\Table\AgentesFormationsTable'];
        $this->AgentesFormations = TableRegistry::get('AgentesFormations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AgentesFormations);

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
