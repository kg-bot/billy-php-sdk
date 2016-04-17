<?php
/**
 * Billy
 *
 * PHP version 5
 *
 * @category  Billy
 * @package   Billy
 * @author    Lars Olesen <lars@intraface.dk>
 * @copyright 2014 Lars Olesen
 * @license   MIT Open Source License https://opensource.org/licenses/MIT
 * @version   GIT: <git_id>
 * @link      http://github.com/lsolesen/Billy
 */

namespace Billy\Accounts;

use Billy\Entity;

/**
 * Class AccountGroup
 *
 * @category  Billy
 * @package   Billy
 * @author    Lars Olesen <lars@intraface.dk>
 * @copyright 2014 Lars Olesen
 */
class AccountGroup extends Entity
{

    /**
     * Required properties to create an account group.
     * @return array
     */
    public function requiredProperties()
    {
        return array(
          'organization',
          'nature',
          'name',
        );
    }

    /**
     * Returns AccountGroup organization ID
     *
     * @note: Marked as immutable by the API.
     *
     * @return mixed
     * @throws \Exception
     */
    public function getOrganization()
    {
        return $this->get('organizationId');
    }

    /**
     * Returns the nature ID of the account group.
     *
     * @note: Marked as immutable by API.
     *
     * @return mixed
     * @throws \Exception
     */
    public function getNature()
    {
        return $this->get('natureId');
    }

    /**
     * Returns the account group's name
     *
     * @return mixed
     * @throws \Exception
     */
    public function getName()
    {
        return $this->get('name');
    }

    /**
     * Set the account group's name.
     *
     * @param string $string Group name
     *
     * @return $this
     */
    public function setName($string)
    {
        return $this->set('name', $string);
    }

    /**
     * Returns the account group's description.
     *
     * @return mixed
     * @throws \Exception
     */
    public function getDescription()
    {
        return $this->get('description');
    }

    /**
     * Sets the account group's description.
     *
     * @param string $string Group description
     *
     * @return $this
     */
    public function setDescription($string)
    {
        return $this->set('description', $string);
    }
}
