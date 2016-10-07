# behat-quick-start

The source is from [Quick Start | Behat documentation](http://behat.org/en/latest/quick_start.html)

1. Create a feature

There is a feature in `features/basket.feature`.

2. Create steps and test cases for the feature

There are two methods for creating steps in `features/bootstrap/FeatureContext.php`:

- Manually add steps.
- Automatically add steps by `vendor/bin/behat --dry-run --append-snippets` command.

3. Fulfill the test cases

Before writing the application implementation, you should fill the test cases with application code in `features/bootstrap/FeatureContext.php`.

4. Run test

First time, you run the test. Normally, the test should fail, because there is no feature implementation.

Therefore you may get the following error message:
```
PHP Fatal error:  Class 'Shelf' not found in .../examples/behat-quick-start/features/bootstrap/FeatureContext.php on line 25
```

5. Implement the feature

Try to create the missing class in `features/bootstrap/`.
For example, The `features/bootstrap/Shelf.php` class stores products and price. And the `features/bootstrap/Basket.php` stores user's interesting products.
