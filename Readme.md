# QuickSsh

> manage ssh connections to server, create keys, run processes and log results
> currently in development

## Installation
To install the package simply run 
```
$ composer require legobox-co/quick-ssh
```
Next, proceed to register the service provider in order to have the package visible to your app.
In config/app.php, alongside it's facade for easy accessibility

```php
<?php
...
return [
  'providers' => [
    ...
    Legobox\QuickSsh\SshServiceProvider::class,
    ...
  ],
  
  'aliases' => [
    ...
    'QuickSsh' => 'Legobox\QuickSsh\Facades\QuickSsh::class',
    ...
  ]
]
```

Next you can proceed to publish the configuration so you can change the defaults.

```bash
$ php artisan vendor:publish --provider="Legobox\QuickSsh\SshServiceProvider"
```

## Usage

Lets see how to use the library
#### Creating an SSH key.

In order to create an ssh key pair
```php
use QuickSsh;
$keys = QuickSsh::createKeys($value = null);
$keys->publicKey // return the public key
$keys->privateKey // return the private key
```

#### Connect to a server
```php
use QuickSsh;
// server options host, keytext, username
$serverInstance = QuickSsh::connector($serverOptions)->connect();
```

#### Run a Process
To run commands on your default remote connection, use the run method on your instance:
```php
$serverInstance->run([
    'cd /var/www',
    'git pull origin master',
]);
```

## Catching Output From Commands
You may catch the "live" output of your remote commands by passing a Closure into the run method:

```php
$serverInstance->run($commands, function($line)
{
    echo $line.PHP_EOL;
});
```

## Tasks

If you need to define a group of commands that should always be run together, you may use the define method to define a task:

```php
$serverInstance->define('deploy', [
    'cd /var/www',
    'git pull origin master',
    'php artisan migrate',
]);
```
Once the task has been defined, you may use the task method to run it:

```php
$serverInstance->task('deploy', function($line)
{
    echo $line.PHP_EOL;
});
```

### SFTP Downloads
The instance includes a simple way to download files using the get and getString methods:
```php
$serverInstance->get($remotePath, $localPath);

$contents = $serverInstance->getString($remotePath);
```
## SFTP Uploads
The SSH class also includes a simple way to upload files, or even strings, to the server using the put and putString methods:

```php
$serverInstance->put($localFile, $remotePath);
$serverInstance->putString($remotePath, 'Foo');
```


