# pip install mailchimp-transactional

import mailchimp_transactional as MailchimpTransactional
from mailchimp_transactional.api_client import ApiClientError

mailchimp = MailchimpTransactional.Client('YOUR-API-KEY-HERE')
message = {
    "from_email": "user@domain.co",
    "subject": "Hello world",
    "text": "Welcome to Mailchimp Transactional!",
    "to": [
      {
        "email": "target@domain.co",
        "type": "to"
      }
    ]
}

def run():
  try:
    response = mailchimp.messages.send({"message":message})
    print('API called successfully: {}'.format(response))
  except ApiClientError as error:
    print('An exception occurred: {}'.format(error.text))

run()
