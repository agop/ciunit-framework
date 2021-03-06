<?php
/**
 * CIUnit
 *
 * Copyright (c) 2013, Agop Seropyan <agopseropyan@gmail.com>
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the name of Agop Seropyan nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package    CIUnit
 * @subpackage constraint
 * @author     Agop Seropyan <agopseropyan@gmail.com>
 * @copyright  2013, Agop Seropyan <agopseropyan@gmail.com>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @since      File available since Release 1.2.x
 */

class CIUnit_Framework_Constraint_ObjectHasAttribute extends CIUnit_Framework_ConstraintAbstract
{
    /**
     * @var attribute
     */
    protected $attribute;
    
    /**
     * Class constructor
     * @param string $attribute
     */
    public function __construct($attribute)
    {
        $this->attribute = $attribute;
    }
    
    /**
     * (non-PHPdoc)
     * @see CIUnit_Framework_ConstraintAbstract::matches()
     */
    protected function matches($value)
    {
        $object = new ReflectionObject($value);
        
        return $object->hasProperty($this->attribute);
    }
    
    /**
     * (non-PHPdoc)
     * @see CIUnit_Framework_ConstraintAbstract::failureDescription()
     */
    protected function failureDescription ($evaluated)
    {
        return CIUnit_Util_Type::shortExport($evaluated) . ' ' . $this->toString();
    }
    
    /**
     * String representation
     * @return string
     */
    public function toString()
    {
        return sprintf('has attribute \'%s\'', $this->attribute);
    }
    
}

?>