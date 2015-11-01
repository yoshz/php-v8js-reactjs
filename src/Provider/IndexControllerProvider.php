<?php

namespace PhpReactjs\Provider;

use Silex\Application;
use Silex\ControllerProviderInterface;

class IndexControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $controllers->get('/', function (Application $app) {
            $component = new \ReactJS($this->getReactSource(), $this->getComponentSource('list'));
            $component->setErrorHandler(array($this, 'onException'));
            $component->setComponent('List', array(
                'data' => array(
                    array('col 1', 'col 2'),
                    array('row 2a', 'row 2b'),
                )
            ));

            return $this->render($component);
        });

        return $controllers;
    }

    private function getReactSource()
    {
        return
            file_get_contents(WEB_DIR . '/js/react-0.14.1.min.js') . ";\n" .
            file_get_contents(WEB_DIR . '/js/react-dom-0.14.1.min.js');
    }

    private function getComponentSource($name)
    {
        $file = WEB_DIR . '/component/' . $name . '.js';

        return file_get_contents($file);
    }

    public function onException(\Exception $e)
    {
        return (string) $e;
    }

    public function render(\ReactJS $component)
    {
        $stime = microtime(true);
        $markup = $component->getMarkup();
        $time = microtime(true) - $stime;

        return <<<EOF
<!doctype html>
<html>
  <head>
    <title>React page</title>
    <link href="/css/main.css" media="all" rel="stylesheet">
  </head>
  <body>
    <div id="page">{$markup}</div>
    <div id="time">Server time: {$time}</div>
    <script src="/js/react-0.14.1.min.js"></script>
    <script src="/js/react-dom-0.14.1.min.js"></script>
    <script src="/component/list.js"></script>
    <script>
    {$component->getJS('#page', "GLOB")}
    </script>
  </body>
</html>
EOF;
    }
}