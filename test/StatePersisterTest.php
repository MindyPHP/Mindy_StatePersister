<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 16/08/16
 * Time: 23:51
 */

namespace Mindy\StatePersister\Tests;

use Mindy\StatePersister\StatePersister;

class StatePersisterTest extends \PHPUnit_Framework_TestCase
{
    public function testSaveLoad()
    {
        @unlink(__DIR__ . '/state.bin');
        $state = new StatePersister([
            'cacheID' => false,
            'stateFile' => __DIR__ . '/state.bin'
        ]);
        $this->assertFalse($state->load());
        $state->save(['foo' => 'bar']);
        $this->assertSame(['foo' => 'bar'], $state->load());
    }
}