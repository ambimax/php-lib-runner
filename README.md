# Ambimax PhpLibrary Runner

## Quick Start
### Installation
```shell
composer require ambimax/php-lib-runner
```

## Basic Usage

A Runner should combine and invoke the different parts of the code just like a command or scheduled task would do.  
External variables should get bundled and validated in an ArgumentBag.

### Implementing a ArgumentBag
[__Detailed Infos__](docs/classes.md#argumentbag)
```php
use \Ambimax\Runner\ArgumentBag\ArgumentEnumInterface;
use \Ambimax\Runner\ArgumentBag\ArgumentBagInterface;

/*
 * Implementation
 */
class DemoArgumentBag implements ArgumentBagInterface {
    
    const DEMO_ARGUMENT_1 = 'demoArgument1';
    const DEMO_ARGUMENT_2 = 'demoArgument2';
    const DEMO_ARGUMENT_3 = 'demoArgument3';
    
    public function __construct(
        protected string $demoArgument1,
        protected string $demoArgument2
        protected string $demoArgument3,
    ) {
        try {
            $this->validateDemoArgument1($demoArgument1);
        } catch (ArgumentValidationException $exception) {
            $exceptions[] = $exception;
        }
        
        try {
            $this->validateDemoArgument2($demoArgument2);
        } catch (ArgumentValidationException $exception) {
            $exceptions[] = $exception;
        }
        
        if ($exceptions) {
            if (count($exceptions) > 1) {
                throw new MultipleArgumentValidationException($exceptions);
            }

            throw $exceptions[0];
        }
    }
    public function getArgument(string $argument)
    {
       return match ($argument) {
            self::$DEMO_ARGUMENT_1 => $this->demoArgument1,     
            self::$DEMO_ARGUMENT_2 => $this->demoArgument2,     
            self::$DEMO_ARGUMENT_3 => $this->demoArgument3,     
       }
    }
    
    // protected function validateDemoArgument1() {}
    // protected function validateDemoArgument2() {}
}
```

### Implementing a Runner
[__Detailed Infos__](docs/classes.md#runner)
```php
use \Ambimax\Runner\AbstractRunner;
use \Ambimax\Runner\ArgumentBag\ArgumentEnumInterface;

class DemoRunner extends AbstractRunner {
    public function getArgumentBagType(): string
    {
        return DemoArgumentBag::class;
    }
    
    public function run(): void
    {
        $demo1 = $this->getArgument(DemoArgumentBag::DEMO_ARGUMENT_1);
        $demo2 = $this->getArgument(DemoArgumentBag::DEMO_ARGUMENT_2);
        $demo3 = $this->getArgument(DemoArgumentBag::DEMO_ARGUMENT_3);
        
        // your code here
    }
}
```

### Usage
```php
$argumentBag = new DemoArgumentBag('example1', 'example2', 'example3');
(new DemoRunner($argumentBag))->run();
```

### Detailed Descriptions
[See here](docs/classes.md)

## Helper scripts

You can find out more about them [here](docs/tools.md).

## Addtitional Documentation

Add a list of links to additional documentation in `./docs`.

* [Changelog](./CHANGELOG.md)
* [Tools](./tools.md)
* [Plugin Template](plugin-template.md)


## Author(s)
- Fabian Köhnen, [ambimax® GmbH](https://www.ambimax.de)