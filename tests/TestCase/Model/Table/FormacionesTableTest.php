<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FormacionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FormacionesTable Test Case
 */
class FormacionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FormacionesTable
     */
    public $Formaciones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.agentes_cursos',
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
        $config = TableRegistry::exists('Formaciones') ? [] : ['className' => 'App\Model\Table\FormacionesTable'];
        $this->Formaciones = TableRegistry::get('Formaciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Formaciones);

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
