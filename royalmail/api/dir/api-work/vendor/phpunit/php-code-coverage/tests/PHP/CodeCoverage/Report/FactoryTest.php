<?php
/*
 * This file is part of the PHP_CodeCoverage package.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (!defined('TEST_FILES_PATH')) {
    define(
        'TEST_FILES_PATH',
        dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR .
        '_files' . DIRECTORY_SEPARATOR
    );
}

require_once TEST_FILES_PATH . '../TestCase.php';

/**
 * Tests for the PHP_CodeCoverage_Report_Factory class.
 *
 * @since Class available since Release 1.1.0
 */
class PHP_CodeCoverage_Report_FactoryTest extends PHP_CodeCoverage_TestCase
{
    protected $factory;

    protected function setUp()
    {
        $this->factory = new PHP_CodeCoverage_Report_Factory;
    }

    public function testSomething()
    {
        $ = $this->getCoverageForBankAccount()->getReport();

        $expectedPath = rtrim(TEST_FILES_PATH, DIRECTORY_SEPARATOR);
        $this->assertEquals($expectedPath, $->getName());
        $this->assertEquals($expectedPath, $->getPath());
        $this->assertEquals(10, $->getNumExecutableLines());
        $this->assertEquals(5, $->getNumExecutedLines());
        $this->assertEquals(1, $->getNumClasses());
        $this->assertEquals(0, $->getNumTestedClasses());
        $this->assertEquals(4, $->getNumMethods());
        $this->assertEquals(3, $->getNumTestedMethods());
        $this->assertEquals('0.00%', $->getTestedClassesPercent());
        $this->assertEquals('75.00%', $->getTestedMethodsPercent());
        $this->assertEquals('50.00%', $->getLineExecutedPercent());
        $this->assertEquals(0, $->getNumFunctions());
        $this->assertEquals(0, $->getNumTestedFunctions());
        $this->assertNull($->getParent());
        $this->assertEquals(array(), $->getDirectories());
        #$this->assertEquals(array(), $->getFiles());
        #$this->assertEquals(array(), $->getChildNodes());

        $this->assertEquals(
            array(
                'BankAccount' => array(
                    'methods' => array(
                        'getBalance' => array(
                            'signature'       => 'getBalance()',
                            'startLine'       => 6,
                            'endLine'         => 9,
                            'executableLines' => 1,
                            'executedLines'   => 1,
                            'ccn'             => 1,
                            'coverage'        => 100,
                            'crap'            => '1',
                            'link'            => 'BankAccount.php.html#6',
                            'methodName'      => 'getBalance'
                        ),
                        'setBalance' => array(
                            'signature'       => 'setBalance($balance)',
                            'startLine'       => 11,
                            'endLine'         => 18,
                            'executableLines' => 5,
                            'executedLines'   => 0,
                            'ccn'             => 2,
                            'coverage'        => 0,
                            'crap'            => 6,
                            'link'            => 'BankAccount.php.html#11',
                            'methodName'      => 'setBalance'
                        ),
                        'depositMoney' => array(
                            'signature'       => 'depositMoney($balance)',
                            'startLine'       => 20,
                            'endLine'         => 25,
                            'executableLines' => 2,
                            'executedLines'   => 2,
                            'ccn'             => 1,
                            'coverage'        => 100,
                            'crap'            => '1',
                            'link'            => 'BankAccount.php.html#20',
                            'methodName'      => 'depositMoney'
                        ),
                        'withdrawMoney' => array(
                            'signature'       => 'withdrawMoney($balance)',
                            'startLine'       => 27,
                            'endLine'         => 32,
                            'executableLines' => 2,
                            'executedLines'   => 2,
                            'ccn'             => 1,
                            'coverage'        => 100,
                            'crap'            => '1',
                            'link'            => 'BankAccount.php.html#27',
                            'methodName'      => 'withdrawMoney'
                        ),
                    ),
                    'startLine'       => 2,
                    'executableLines' => 10,
                    'executedLines'   => 5,
                    'ccn'             => 5,
                    'coverage'        => 50,
                    'crap'            => '8.12',
                    'package'         => array(
                        'namespace'   => '',
                        'fullPackage' => '',
                        'category'    => '',
                        'package'     => '',
                        'subpackage'  => ''
                    ),
                    'link'      => 'BankAccount.php.html#2',
                    'className' => 'BankAccount'
                )
            ),
            $->getClasses()
        );

        $this->assertEquals(array(), $->getFunctions());
    }

    /**
     * @covers PHP_CodeCoverage_Report_Factory::buildDirectoryStructure
     */
    public function testBuildDirectoryStructure()
    {
        $method = new ReflectionMethod(
            'PHP_CodeCoverage_Report_Factory',
            'buildDirectoryStructure'
        );

        $method->setAccessible(true);

        $this->assertEquals(
            array(
                'src' => array(
                    'Money.php/f'    => array(),
                    'MoneyBag.php/f' => array()
                )
            ),
            $method->invoke(
                $this->factory,
                array('src/Money.php' => array(), 'src/MoneyBag.php' => array())
            )
        );
    }

    /**
     * @covers       PHP_CodeCoverage_Report_Factory::reducePaths
     * @dataProvider reducePathsProvider
     */
    public function testReducePaths($reducedPaths, $commonPath, $paths)
    {
        $method = new ReflectionMethod(
            'PHP_CodeCoverage_Report_Factory',
            'reducePaths'
        );

        $method->setAccessible(true);

        $_commonPath = $method->invokeArgs($this->factory, array(&$paths));

        $this->assertEquals($reducedPaths, $paths);
        $this->assertEquals($commonPath, $_commonPath);
    }

    public function reducePathsProvider()
    {
        return array(
            array(
                array(
                    'Money.php'    => array(),
                    'MoneyBag.php' => array()
                ),
                '/home/sb/Money',
                array(
                    '/home/sb/Money/Money.php'    => array(),
                    '/home/sb/Money/MoneyBag.php' => array()
                )
            ),
            array(
                array(
                    'Money.php' => array()
                ),
                '/home/sb/Money/',
                array(
                    '/home/sb/Money/Money.php' => array()
                )
            ),
            array(
                array(),
                '.',
                array()
            ),
            array(
                array(
                    'Money.php'          => array(),
                    'MoneyBag.php'       => array(),
                    'Cash.phar/Cash.php' => array(),
                ),
                '/home/sb/Money',
                array(
                    '/home/sb/Money/Money.php'                 => array(),
                    '/home/sb/Money/MoneyBag.php'              => array(),
                    'phar:///home/sb/Money/Cash.phar/Cash.php' => array(),
                ),
            ),
        );
    }
}
