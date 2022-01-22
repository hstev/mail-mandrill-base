# NodeJS Mandrill-Transactional

## Pasos para utilizarla

### Instalar la librería (ej NPM)
```sh
npm i @mailchimp/mailchimp_transactional
```

### Editar la API_KEY en el archivo index.js
```sh
const mailchimp = require('@mailchimp/mailchimp_transactional')('API_KEY_AQUI');
```
NOTA: Recomendable no colocar directameUtilizar un archivo para almacenar la constante, ej un .env


### Probar
Antes de enviar un correo tener en cuenta lo siguiente:

- Editar la variable _message_ dentro del archivo

```js
const message = {
        from_email: "noreply@domain.com",
        from_name: "FROM_NAME",
        subject: "SUBJET",
        html: `<span style="font-family:monospace; font-size:20px; color:green;">Este es un mensaje en HTML</span>`,
        to: [
            {
                email: "eliot.alderson@evil.corp",
                type: "to",
                name: "Eliot Alderson"
            }
        ]
    };
```

### Como probar ?
```
node index.js
```

### NOTA 
El archivo contiene las 2 funciones necesarias para enviar correos. Adaptalo segun tus necesidades