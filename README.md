Fast and secure unique smol ID generator, that look like this:

```
JIN5gNQEwht8999c4xZx9
88AFNNkR1RJI1gs8BBwxV
c54wMAUAR4wkFs9dN9Jts
```

Smaller than UUID and copy-paste friendly.

# Usage

```php
// Basic:
$id = (new Smolid())->generate(); // Yd0AwdV80s8oRs0odN8hZ

// Custom alphabet:
$id = (new Smolid(alphabet: Alphabet::HEXADECIMAL_UPPERCASE))->generate(); // FE3782DA33AAA5ED96BEC

// Custom size:
$id = (new Smolid())->generate(size: 10); // N0BRRpNgpE
```

> Inspired by [Nano ID](https://github.com/ai/nanoid)