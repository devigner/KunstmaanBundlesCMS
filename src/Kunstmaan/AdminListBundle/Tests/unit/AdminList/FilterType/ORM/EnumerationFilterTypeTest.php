<?php

namespace Kunstmaan\AdminListBundle\Tests\AdminList\FilterType\ORM;

use Codeception\Test\Unit;
use Kunstmaan\AdminListBundle\AdminList\FilterType\ORM\EnumerationFilterType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2014-02-26 at 15:06:50.
 */
class EnumerationFilterTypeTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var EnumerationFilterType
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function _before()
    {
        $this->object = new EnumerationFilterType('enumeration', 'b');
    }

    public function testBindRequest()
    {
        $request = new Request(array('filter_comparator_enumeration' => 'in', 'filter_value_enumeration' => array(1, 2)));

        $data = array();
        $uniqueId = 'enumeration';
        $this->object->bindRequest($request, $data, $uniqueId);

        $this->assertEquals(array('comparator' => 'in', 'value' => array(1, 2)), $data);
    }

    /**
     * @param string $comparator  The comparator
     * @param string $whereClause The where clause
     * @param mixed  $value       The value
     * @param mixed  $testValue   The test value
     *
     * @dataProvider applyDataProvider
     */
    public function testApply($comparator, $whereClause, $value, $testValue)
    {
        $qb = $this->tester->getORMQueryBuilder();
        $qb->select('b')
          ->from('Entity', 'b');
        $this->object->setQueryBuilder($qb);
        $this->object->apply(array('comparator' => $comparator, 'value' => $value), 'enumeration');

        $this->assertEquals("SELECT b FROM Entity b WHERE b.enumeration $whereClause", $qb->getDQL());
        if ($testValue) {
            $this->assertEquals($value, $qb->getParameter('var_enumeration')->getValue());
        }
    }

    /**
     * @return array
     */
    public static function applyDataProvider()
    {
        return array(
          array('in', 'IN(:var_enumeration)', array(1, 2), true),
          array('notin', 'NOT IN(:var_enumeration)', array(1, 2), true),
        );
    }

    public function testGetTemplate()
    {
        $this->assertEquals('KunstmaanAdminListBundle:FilterType:enumerationFilter.html.twig', $this->object->getTemplate());
    }
}