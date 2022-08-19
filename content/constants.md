---
title: Constants
next: []
---

Constants in PHP are named values that cannot change during the execution of a script. They are case sensitive like variables but are defined separately.

You can use the `const` keyword to define a constant.

```php
<?php

const NAME = 'Ryan';
```

The convention in PHP is to use an uppercase name for all constants. You're also allowed to use underscores and numbers.

### `define()`

Another method for defining constants is the `define()` function. This function accepts the name of the constant and it's value.

```php
<?php

define('NAME', 'Ryan');
```

It's highly likely you'll see this in PHP code, however the more modern approach is using the `const` keyword from above.