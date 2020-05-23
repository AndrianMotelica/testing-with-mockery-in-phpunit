# Working with Mockery inside PHPUnit

##Mockery
Mockery is a simple yet flexible PHP mock object framework for use in unit testing with PHPUnit, PHPSpec or any other testing framework. Its core goal is to offer a test double framework with a succinct API capable of clearly defining all possible object operations and interactions using a human readable Domain Specific Language (DSL). Designed as a drop in alternative to PHPUnit’s phpunit-mock-objects library, Mockery is easy to integrate with PHPUnit and can operate alongside phpunit-mock-objects without the World ending.

##Mock Objects
In unit tests, mock objects simulate the behaviour of real objects. They are commonly utilised to offer test isolation, to stand in for objects which do not yet exist, or to allow for the exploratory design of class APIs without requiring actual implementation up front.

The benefits of a mock object framework are to allow for the flexible generation of such mock objects (and stubs). They allow the setting of expected method calls and return values using a flexible API which is capable of capturing every possible real object behaviour in way that is stated as close as possible to a natural language description. 

### Purpose of using Mockery with PHPUnit
When it comes to mocking **protected**, **static** function calls and object **instantiation** besides Dependency Injection, PHPUnit has limited options to provide.
Here it comes in play the combination of **Mockery**.


 ###Installing 
 >$ composer install

### Running tests
run tests
> $ vendor/bin/phpunit tests

run a single test
>$ vendor/bin/phpunit tests --filter testName

##Read The Docs
[Mockery Documentation](http://docs.mockery.io/en/latest/reference/creating_test_doubles.html)

[PHPUnit Documentation](https://phpunit.readthedocs.io/en/9.1/assertions.html)