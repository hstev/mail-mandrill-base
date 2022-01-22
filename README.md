# MandrillMail

## Installation

```sh
composer install
```
## How to use it?...
You will require the MandrillMail.php class. Then, just instance it and call the send_html() method 

```php
$mandrill = new MandrillMail();
$mandrill->send_html('Subject', 'Text or HTML content', 'contact@domain.com');
```

| LANGUAGE | STATUS |
| ------ | ------ |
| PHP | DONE |
| Node | DONE |
| Python | - |
| Java | - |
| C# | - |

## License

MIT

[DOC]: https://mailchimp.com/developer/transactional/guides/send-first-email/#send-your-first-email 


