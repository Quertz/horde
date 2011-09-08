<?php
/**
 * Test base for the SQL driver.
 *
 * PHP version 5
 *
 * @category   Horde
 * @package    Nag
 * @subpackage UnitTests
 * @author     Gunnar Wrobel <wrobel@pardus.de>
 * @link       http://www.horde.org/apps/nag
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, version 2
 */

/**
 * Test base for the SQL driver.
 *
 * Copyright 2011 The Horde Project (http://www.horde.org/)
 *
 * See the enclosed file COPYING for license information (GPLv2). If you did not
 * receive this file, see http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * @category   Horde
 * @package    Nag
 * @subpackage UnitTests
 * @author     Gunnar Wrobel <wrobel@pardus.de>
 * @link       http://www.horde.org/apps/nag
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, version 2
 */
class Nag_Unit_Driver_Sql_Base extends Nag_Unit_Driver_Base
{
    static $callback;

    static public function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        self::getDb();
        self::$setup->getInjector()->setInstance(
            'Horde_Core_Factory_Db',
            new Nag_Stub_DbFactory(
                self::$setup->getInjector()->getInstance(
                    'Horde_Db_Adapter'
                )
            )
        );
        self::$setup->setup(
            array(
                'Horde_Share_Base' => 'Share'
            )
        );
        self::$setup->makeGlobal(
            array(
                'nag_shares' => 'Horde_Share_Base',
            )
        );

        $GLOBALS['conf']['tasklists']['driver'] = 'default';

        list($share, $other_share) = self::_createDefaultShares();
        self::$driver = new Nag_Driver_Sql(
            $share->getName(), array('charset' => 'UTF-8')
        );
    }

    static protected function getDb()
    {
        call_user_func_array(self::$callback, array());
    }
}
