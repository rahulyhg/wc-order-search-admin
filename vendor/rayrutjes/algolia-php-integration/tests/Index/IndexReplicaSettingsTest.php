<?php

/*
 * This file is part of AlgoliaIntegration library.
 * (c) Raymond Rutjes <raymond.rutjes@gmail.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace AlgoliaOrdersSearch\AlgoliaIntegration\Tests\Index;

use AlgoliaOrdersSearch\AlgoliaIntegration\Index\IndexReplicaSettings;

class IndexReplicaSettingsTest extends \PHPUnit_Framework_TestCase
{
    public function testCanRetrieveItsName()
    {
        $settings = new IndexReplicaSettings('name', array());
        $this->assertEquals('name', $settings->getIndexName());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCanNotContainReplicasOption()
    {
        $settings = new IndexReplicaSettings('name', array('replicas' => array()));
    }

    public function testCanRetrieveOptionsAsAnArray()
    {
        $options = array(
            'searchableAttributes' => array('name'),
            'customRanking' => array('desc(timestamp)'),
        );

        $settings = new IndexReplicaSettings('name', $options);
        $this->assertEquals($options, $settings->toArray());
    }
}
