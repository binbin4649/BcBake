<?php
namespace BcBake\Command\Bake;

use Bake\Command\TestCommand;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;

class ServiceTestCommand extends TestCommand
{
    /**
     * Initialization method that configures the `classTypes` property
     * to include 'Service' as a valid class type for this command.
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->classTypes['Service'] = 'Service';
    }

    public function template(): string
    {
        return 'Service/service_test';
    }

    /**
     * Overriding the `testCaseFileName` method to specify the file name pattern
     * for Service test cases.
     */
    public function testCaseFileName(string $type, string $className): string
    {
        if ($type === 'Service') {
            $path = $this->getBasePath();
            $classTail = substr($className, strrpos($className, '\\') + 1);
            return $path . 'Service' . DS . $classTail . 'Test.php';
        }

        return parent::testCaseFileName($type, $className);
    }

    /**
     * Overriding the `buildOptionParser` method to customize the command description
     * and help text specific to generating Service test cases.
     */
    // コメントアウトしないと、bin/cake --version　が動かない。原因は今のところ不明。
    // protected function buildOptionParser(ConsoleOptionParser $parser): ConsoleOptionParser
    // {
    //     $parser = parent::buildOptionParser($parser);
    //     $parser->setDescription('Bake test case skeletons for Service classes.');
    //     return $parser;
    // }
}