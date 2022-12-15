# Classes
## Runner
**Interface**: [RunnerInterface](../src/RunnerInterface.php)

A Runner should combine and invoke the different parts of the code just like a command or scheduled task would do.
External variables should get bundled and validated in an ArgumentBag.

### AbstractRunner
**Class**: [AbstractRunner](../src/AbstractRunner.php)

This enforces to create a Runner with an ArgumentBag in its constructor.  
Also it allows overwriting `getArgumentBagType()` method to exactly define which kind of ArgumentBag is needed.

## ArgumentBag
**Interface**: [ArgumentBagInterface](../src/ArgumentBag/ArgumentBagInterface.php)

An ArgumentBag is a storage for all arguments a runner needs.  
This Arguments should be validated and set in the constructor and only return an ArgumentBag when all arguments are valid.
You should set all arguments in the constructor by its own variable.
### Best Practices
Every Argument should addressed in a Enum or have a key as Constant set in the class over which this Argument can be addressed in the getArgument method.

## Exceptions
### ArgumentValidationException
**Class**: [ArgumentValidationException](../src/ArgumentBag/ArgumentValidationException.php)

A simple wrapper Exception which formats the error message.
### MultipleArgumentValidationException
**Class**: [MultipleArgumentValidationException](../src/ArgumentBag/MultipleArgumentValidationException.php)

A wrapper around Exception which expects an array of ArgumentValidationExceptions and formats the error message to combine the single error messages
