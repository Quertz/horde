<?php
/**
 * Maps a single Kolab_Storage group ACL element to the Horde permission system.
 *
 * PHP version 5
 *
 * @category Horde
 * @package  Perms
 * @author   Gunnar Wrobel <wrobel@pardus.de>
 * @license  http://www.horde.org/licenses/lgpl21 LGPL 2.1
 * @link     http://pear.horde.org/index.php?package=Perms
 */

/**
 * Maps a single Kolab_Storage group ACL element to the Horde permission system.
 *
 * Copyright 2006-2012 Horde LLC (http://www.horde.org/)
 *
 * See the enclosed file COPYING for license information (LGPL). If you
 * did not receive this file, see http://www.horde.org/licenses/lgpl21.
 *
 * @category Horde
 * @package  Perms
 * @author   Gunnar Wrobel <wrobel@pardus.de>
 * @license  http://www.horde.org/licenses/lgpl21 LGPL 2.1
 * @link     http://pear.horde.org/index.php?package=Perms
 */
class Horde_Perms_Permission_Kolab_Acl_Group
extends Horde_Perms_Permission_Kolab_Acl
{
    /**
     * The group id.
     *
     * @var string
     */
    private $_id;

    /**
     * The group handler.
     *
     * @var Group
     */
    private $_groups;

    /**
     * Constructor.
     *
     * @param string $acl               The folder ACL element as provided by
     *                                  the driver.
     * @param string $id                The group id.
     */
    public function __construct($acl, $id)
    {
        $this->_id     = $id;
        parent::__construct($acl);
    }

    /**
     * Convert the Acl string to a Horde_Perms:: mask and store it in the
     * provided data array.
     *
     * @param array &$data The horde permission data.
     *
     * @return NULL
     */
    public function toHorde(array &$data)
    {
        $data['groups'][$this->_id] = $this->convertAclToMask();
    }
}
