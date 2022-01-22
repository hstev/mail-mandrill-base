    //Instalar npm para importar @mailchimp/mailchimp_transactional
    const mailchimp = require('@mailchimp/mailchimp_transactional')('AQUI_LA_API');

    /**
     * Comprobar si se ha conectado correctamente con la API
     * @return {String} PONG! si la conexion es exitosa
     */
    async function ping() {
        const response = await mailchimp.users.ping();
        console.log(response);
    }
  
    /**
     * Enviar email
     * @param {*} message Objeto del mensaje
     * @return {*} Object Objeto de la respuesta
     */
    async function run(message) {
        const response = await mailchimp.messages.send({message});
        console.log(response);
    }   

    //Objeto message que se envia a la función run()
    const message = {
        from_email: "noreply@domain.com",
        from_name: "FROM_NAME",
        subject: "Nuevo mensaje",
        html: `<span style="font-family:monospace; font-size:20px; color:green;">este es un mensaje en HTML</span>`,
        to: [
            {
            email: "jhon.doe@mail.com",
            type: "to",
            name: "Jhon Doe"
            }
        ]
    };

    run(message);
    //ping(); //PONG! if TRUE