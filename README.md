# Objective:

This project was created as a test for reviewing programming and structure concepts as asked by the company, specifically, to review, refactor, improve and fix potential bugs in the codebase.

Also, to propose and implement improvements and refactoring the code to set it to the most consistent and up to date status up to nowadays standards.

**NOTE: It's out of scope to completely adapt the code to an MVC framework, due to time constraints**

# Instalation

**Note: Composer needs to be installed for the PSR-2 and autoload generation**

Clone the repo to a desired location and execute `composer install` && `composer dump-autoload`

# Structure & improvements

For all classes: 
    1. Names should be capitalized and following PSR-2 style.
    2. Refactor the code to follow as many as possible of [SOLID](https://en.wikipedia.org/wiki/SOLID) principles

## Index.php:
    *) Using a PSR-4 autoload as composer allows would help not to require a long list of files.
    *) A Factory to create different types of cards will be useful to have a common creation point (See example in link at the end)
    *) Create a `CardController` to execute the creation (Via a `create()`, `renderCards()` && `printCards()` methods) of different types and amount of cards, to not have the for loop spreaded in the file, and being repeated (Lines 14 to 26).
    *) Part of the text is hardcoded with "Pack ", which should be a constant or a variable for every different type of card/pack according to the business rules.
    *) Print statement should also be in the previously mentioned controller, for it to handle it.
    *) Also, hardcoded text in the print.
    *) The function "mk_rnd_greyscale()" is scattered in the file, without explicitly being bound to any model, so it's hard to realize who, how and when has to be used. A meaningful name more related to the business will be helpful, and has to be protected, not public.

## Cards classes:
    *) For starting, the "minicard" & "businesscard" classes are special cases for values. This means, the only thing that changes are a fixed set of values, not any single structure change, so the inheritance is used simply to save and keep some very specific case together.
    *) An abstract class was implemented with the common structure and functionality between card types, to avoid repetition of code like now.
    *) Use more meaningful names for the attributes ("width" instead of "w"), so the comments will be unnecesaries.
    *) A main class comment with an explanation about the business role of that card.
    *) Camel case names according to up to date PSR standards.
    *) Render method was fixed, which will be hard to change if necessary. The solution was to create an interface with a "render" method, that implements it in the concrete class. A better (Although out of scope solution) would be to create a set of strategies and set them via dependency injection, as a "CardRenderer" to the card that will take care of it, easily interchangeable.

## Pack:
    1) $array attribute renamed to $cards for a more meaningful name
    2) Same, "bgSort()" should be implemented as explained before for the "render" method (An interface to help the code to be extended)

Regarding the structure, keeping classes separated helps to achieve Single responsibility principle (S in SOLID), while coding to an interface helps the Open-Closed one (O in SOLID). 

Basically, the idea about the refactor was to make the code more readable, maintanable, easier to upgrade and to test.

## Tests

For didactic reasons a test file for `CardController` has been added. The test consists in 2 methods for testing the correct loading of packs into the controller.

It shows how to set up a test, create useful mocks and assert some value. Although basic, this test shows us how easy or hard could be to test the codebase.

As the NOTE at teh beginning explained, thorough testing is out of scope for time reasons, but as an example, in order to test all the methods in the controller, a factory-style method has to be created to instantiate the set of cards inside the for loop.

The reason of this is that is not possible to mock a `new Class()` sentence, as PHPUnit only provides result mocks for methods.
For that reason, the solution would be:

    1. Create a Card factory class, with a `CardFactory::createCard()` method.
    2. Create a mock of that factory, with a mocked Card returned.
    3. Assert that N cards are created, according to the MAX number passed.
    4. Once, it will be possible to also test the amount of times that, for example, method `bgSort()` is called, via `$mock->expects($this->once())` assertion styles.

## Running the tests

Once created a test in `tests` folder, execute `$ vendor/bin/phpunit tests/<test-name>.php`. Follow PHPUnit manual for further instructions.
