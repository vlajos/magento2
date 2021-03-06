<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Magento
 * @package     Mage_ImportExport
 * @subpackage  unit_tests
 * @copyright   Copyright (c) 2013 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Mage_ImportExport_Model_Export_Entity_ProductTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Stub_UnitTest_Mage_ImportExport_Model_Export_Entity_Product
     */
    protected $_object;

    protected function setUp()
    {
        $this->_object = new Stub_UnitTest_Mage_ImportExport_Model_Export_Entity_Product();
    }

    protected function tearDown()
    {
        unset($this->_object);
    }

    public function testUpdateDataWithCategoryColumnsNoCategoriesAssigned()
    {
        $dataRow = array();
        $productId = 1;
        $rowCategories = array($productId => array());

        $this->assertTrue($this->_object->updateDataWithCategoryColumns($dataRow, $rowCategories, $productId));
    }
}

/**
 * We had to create this stub class because _updateDataWithCategoryColumns() parameters are passed by reference -
 * we can't use ReflectionMethod::setAccessible() and then ReflectionMethod::invokeArgs() to call it from test.
 */
class Stub_UnitTest_Mage_ImportExport_Model_Export_Entity_Product extends Mage_ImportExport_Model_Export_Entity_Product
{
    /**
     * Disable parent constructor
     */
    public function __construct()
    {
    }

    /**
     * Update data row with information about categories. Return true, if data row was updated
     *
     * @param array $dataRow
     * @param array $rowCategories
     * @param int $productId
     * @return bool
     */
    public function updateDataWithCategoryColumns(&$dataRow, &$rowCategories, $productId)
    {
        return $this->_updateDataWithCategoryColumns($dataRow, $rowCategories, $productId);
    }
}
