JagmortTimezonePlugin
=====================

- PHP 5 >= 5.2.0
- Symfony 1.4
- Doctrine
- sfGuardDoctrinePlugin

Model and view timezones
------------------------

Model time is a unified time (by default your server's system time), view is a
user time, may specific for any user.

`config/app.yml`

  default_timezone: UTC

`config/ProjectConfiguration.class.php`

  public function configureDoctrineBuilderOptions(sfEvent $event, $options) {
    $options['baseClassName'] = 'JagmortTzDoctrineRecord';

    return $options;
  }

Rebuild your models:

    symfony doctrine:build-model

Testing
-------

    cd /path/to/your/project/plugins/JagmortTimezonePlugin
    touch symfony
    /path/to/symfony/data/bin/symfony test:unit -t JagmortTimezonePlugin

or add to your `config/ProjectConfiguration.class.php`:

  public function setupPlugins()
  {
    $this->pluginConfigurations['JagmortTimezonePlugin']->connectTests();
  }

and then run:

    cd /path/to/your/project
    symfony test:unit -t JagmortTimezonePlugin

Links
-----

Daylight saving time and timezone best practices
  http://stackoverflow.com/questions/2532729/daylight-saving-time-and-timezone-best-practices

PHP DateTime bug
  https://bugs.php.net/bug.php?id=51051
