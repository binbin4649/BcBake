<?php
    namespace BcBake\Command\Bake;

    use Bake\Command\SimpleBakeCommand;
    use Cake\Console\Arguments;
    use Cake\Core\Configure;
    use Cake\Utility\Inflector;

    class ServiceTestCommand extends SimpleBakeCommand
    {

        public function name(): string
        {
            return 'service_test';
        }

        public function fileName(string $name): string
        {
            return 'tests/TestCase/Service/' . $name . 'ServiceTest.php';
        }

        public function template(): string
        {
            return 'Service/service_test';
        }

        /**
         * templateData
         * @param Arguments $arguments
         * @return array
         */
        public function templateData(Arguments $arguments): array
        {
            $namespace = Configure::read('App.namespace');
            if ($this->plugin) {
                $namespace = $this->_pluginNamespace($this->plugin);
            }
            $name = $arguments->getArgument('name');
            return [
                'namespace' => $namespace,
                'singularName' => Inflector::singularize($name),
                'pluralName' => $name
            ];
        }

    }