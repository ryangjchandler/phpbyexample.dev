---
title: Values
next: [Variables, /variables.html]
---

PHP has a handful of value types including strings, integers, floats and booleans.

### Strings

You may have already seen a string on the [Hello, world](/hello-world.html) page. They are created with single or double quotes.

```php
<?php

'Hello, world';
"Hello, world";
```

### Integers

An integer is any whole number that is positive or negative.

Most integers will be represented in decimal form (base 10).

```php
<?php

1234;
```

But you can also represent integers in hexadecimal (base 16), octal (base 8) or binary (base 2).

```php
<?php

0xFF; // Hexadecimal form - prefixed with 0x;
0o123; // Octal form - prefixed with 0o.
0b11111111; // Binary form - prefixed with 0b;
```

### Floats

A float, or floating point number, is any positive or negative number with a decimal point.

```php
<?php

1.234;
```

Floating point numbers can also be represented with scientific notation.

```php
<?php

1.2e3; // Equivalent to 1200.00, or 1.2 x 10³
7e-5; // Equivalent to 0.00007, or 7 x 10⁻⁵
```

### Booleans

Booleans represent a `true` or `false` value.

```php
<?php

true;
false;
```