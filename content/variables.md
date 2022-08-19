---
title: Variables
next: [Constants, /constants.html]
---

In PHP, variables are represented by a dollar sign `$` followed by a case-sensitive name. Values are assigned to a variable using the `=` operator.

```php
<?php

$name = 'Ryan';
```

Variables names must start with either an alphabetic character or an underscore.

```php
<?php

$name; // This is allowed.
$Name; // This is allowed.
$_name; // This is allowed.

$1; // This is not allowed.
```

You can declare multiple variables at once by using the `=` operator multiple times.

```php
<?php

$a = $b = 100;
```

You can then use a variable by referencing it in the same way as your declared it.

```php
<?php

$message = 'Hello, world';

echo $message;
```