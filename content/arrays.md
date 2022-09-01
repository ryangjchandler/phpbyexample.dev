---
title: Arrays
next: [If/Else, /if-else.html]
---

An array is a way of storing multiple values together in a list. Since PHP is dynamically typed, you can store different types of values inside of the same array.

An array is created using square brackets `[]`.

```php
$names = [
    'John',
    'Jane',
];
```

Each value in the array is separated by a comma.

### Accessing array items

To access an item in an array, you can use the `[]` operator and the index / position of the element.

```php
$john = $names[0];
$jane = $names[1];
```

If you try to access an element that doesn't exist, PHP will trigger a warning.

```php
$names = [];
$names[0];
```

```sh
$ php ./index.php
Warning: Undefined array key 0 in php shell code on line 1
```

### Array keys

PHP is different to other programming languages since you're allowed to assign values to specific keys in an array.

```php
$ages = [
    'John' => 45,
    'Jane' => 72,
];
```

You can specify the key on the left-hand side of the `=>` sigil. The value then goes on the right.

Instead of using the position to access the value, you now instead use the specified key.

```php
$john = $ages['John'];
$jane = $ages['Jane'];
```

> **Note**: only strings and integers can be used as keys in an array.