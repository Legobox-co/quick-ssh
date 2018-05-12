# QuickSsh

> manage ssh connections to server, create keys, run processes and log results
> currently in development

## How to use
Lets see how to use the library
#### Creating an SSH key.
```php
use QuickSsh;
$keys = QuickSsh::createKeys($value = null);
$keys->publicKey // return the public key
$keys->privateKey // return the private key
```

#### Connect to a server
```php
use QuickSsh;
$serverInstance = QuickSsh::connection($key, $serverOptions);
```

#### Run a Process

```php
use QuickSsh;

$serverInstance->run($commandstring);
$serverInstance->run($commandstrings[]);

$serverInstance->run($commandstring)->tail('dir');

```

