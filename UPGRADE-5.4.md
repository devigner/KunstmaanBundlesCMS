UPGRADE FROM 5.3 to 5.4
=======================

AdminBundle
-----------

* The composer script class `Kunstmaan\AdminBundle\Composer\ScriptHandler` is deprecated and will be removed in 6.0. 
  If you use this script handler, remove it from your composer.json scripts section.

AdminListBundle
---------------

* Not passing the Twig service as the first argument of "Kunstmaan\AdminListBundle\Service\ExportService::__construct" is deprecated and will be required in 6.0. Injected the required services in the constructor instead.
* Injecting the template renderer with "Kunstmaan\AdminListBundle\Service\ExportService::setRenderer" is deprecated and will be removed in 6.0. Inject Twig with constructor injection instead.
* Injecting the translator with "Kunstmaan\AdminListBundle\Service\ExportService::setTranslator" is deprecated and will be removed in 6.0. Inject the Translator with constructor injection instead.

ConfigBundle
------------

* Passing the "@templating" service as the 2nd argument to "Kunstmaan\ConfigBundle\Controller\ConfigController" is deprecated and will be replaced by the Twig service in 6.0. Injected the "@twig" service instead.

FormBundle
----------

* Passing the "@templating" service as the 2nd argument to "Kunstmaan\FormBundle\Helper\FormMailer" is deprecated and will be replaced by the Twig service in 6.0. Injected the "@twig" service instead.
