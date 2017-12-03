<?php
namespace App\Test\TestCase\Controller;

use App\Controller\AgentesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\AgentesController Test Case
 */
class AgentesControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
