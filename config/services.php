<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],
    'firebase' => [
        "type" =>  "service_account",
        "project_id" =>  "penta-b0191",
        "private_key_id" =>  "e7f1fd96728b83727cf87892a09a053ed02cc8b1",
        "private_key" =>  "-----BEGIN PRIVATE KEY-----\nMIIEvwIBADANBgkqhkiG9w0BAQEFAASCBKkwggSlAgEAAoIBAQC7BkHzZfjt7Ay5\nWim24zEISRSCV2JTkYaM07nY+po9PXIV09BnYlS2cjNzmXnywzoBOEo/wWh9Vn5T\ncyNG1mw57nYapye+HEXgcUVqnqwCbeTMCU0RZVcfR6q434XWH4yfiB6GfXXk2o6C\n15j68Tjti1RhZ9XV6oTy6jdmpkAqULxPsa9feRlrrONYdYqp0KPMjF0ACY+jOYLn\npSlMk5vgzmxxHG/6q1nJ5q49qPCDLK2KsTDY5RA1MrJ+Yzy6EqjY7RvkRMZjmHkE\nUKHlyLzbkjZJ/1kSI58YbtmNK5+ZUv3Y8Tlluv6YjFOswdn1mNHvCukQrbvkr/Fv\nAkO0AZilAgMBAAECggEAI0jsc2vnOZgh1Gx210roysvi4y5yXhrkHDir5QxuwiQQ\nHJ8gQAkUu3EzVNl9YPhFPsqsc3fda1xArCTaYHh+5bUgMiocPOlfo5crRhDWmgS6\nuGX+1MveUof2ZTfCq+G66bRIMg6Eih9T6MqdUabmGycAzfnFpby/xYa72hF+pJzQ\n3t7lGlsw5/cFPtp4tnJ+Y8hwZRfH9KIKKT6Wb7/WwR5ftXnpT6kTkmTk+mPqKhcu\nC0tpGxE3VlQv8qRfKwwjv3/jK4Oc/r4E0ujNLcf+MiXpOCzi25bDP371/U2EtwQ0\nIq/F1SlocVldvi2lXAw7xHrW7pl5g2yk3MeU2vGGVwKBgQDxBtCnUK4Bwycsxhvp\nJdYY982xkSwCE22C5Lx4ptuyT6pSU/Ms4RZxw/KLBAF+P1b3GBLul0ZRvQs64Iod\nl5MPDZHtqTs0LXXTZTUgB/ksasHioi3QGh2Ikhw2uOtYzuSRsiZjjPvm1eHaXqEc\nsKhxmAP03ItLZuqL76KjwzzSywKBgQDGpJ1pTSN+s3dUX4bOf2Nsi4mXFHda2RSQ\nIQoClAKqaLE3dy576VJragojgll+NhnD7+whWNqqJaLZgBbYcO5KeQhUCfjssV4r\nvGl30A87GBUr+UR+6DFXykKUfwVnMUWfCPLjPmkdkAwqc5BV4K+oeEQTQvX5bBNs\n8T/EqMgkTwKBgQCRFvQltAh7YRnE9yC4EaG29/znhidCvKUwpTbbPj6EMTarRoPd\nIUYch8MKcgfgEorsRZ6n54JaE/2dnKsnsyXAav/MXBIaj78c2RDIzmPtm/pIzi3b\n1syueJ3pRxnNJQYsulwnkyfURi4mAM7lcWaEsui2zsg/RJ2uTTvPbui/TwKBgQCD\nQ4ZNbk71S8yf8ZwYWq+tq6uZLUoNu4NOFrcRqxLz3si0mUobUbxIBMN8YYeX0lJG\nWwXTp26fns01IuJ11nJwvfgV6J0Yc8CB8DhVlyRpbWmYLFjp76+jjqFelW1Rmoqi\nI/y006oMggK4DrOjPB13mzmI7Oe0EYnopKb54nqXGwKBgQCSWAQv9JPkPtizPZjO\n6Gjz9k5DKc7rqh4x+KVBTnVIPD3Tn0FFQgTOYlGfFkm0jz4F7KvZqk0l+Ix6DBAO\nShhO/r87bczOOPF0Xi3LssVAn5sZsughOErefudaiHPo1GjMg31mR0cTG0KyaCJC\nL4BKKvyoTaWpEaGj+7KV9mY1Vw==\n-----END PRIVATE KEY-----\n",
        "client_email" =>  "firebase-adminsdk-xty53@penta-b0191.iam.gserviceaccount.com",
        "client_id" =>  "109204019150947190657",
        "auth_uri" =>  "https://accounts.google.com/o/oauth2/auth",
        "token_uri" =>  "https://oauth2.googleapis.com/token",
        "auth_provider_x509_cert_url" =>  "https://www.googleapis.com/oauth2/v1/certs",
        "client_x509_cert_url" =>  "https://www.googleapis.com/robot/v1/metadata/x509/firebase-adminsdk-xty53%40penta-b0191.iam.gserviceaccount.com",
        "universe_domain" =>  "googleapis.com"
    ],

];
