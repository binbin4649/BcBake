<?php
    namespace BcBake\Command\Bake;

    use Bake\Command\SimpleBakeCommand;

    class ServiceTestCommand extends SimpleBakeCommand
    {
        public function name(): string
        {
            return 'service_test';
        }

        public function fileName(string $name): string
        {
            return $name . 'ServiceTest.php';
        }

        public function template(): string
        {
            return 'Service/service_test';
        }
    }