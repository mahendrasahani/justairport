
    
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Verification Email</title>
      <style>
        /* Styles specific to email clients */
        body {
          margin: 0;
          padding: 0;
          font-family: Helvetica, Arial, sans-serif;
          line-height: 1.5;
          color: #333;
        }
    
        table {
          border-collapse: collapse;
          width: 100%;
        }
    
        .container {
          width: 100%;
          padding: 20px;
          box-sizing: border-box;
        }
    
        .content {
          width: 65%;
          margin: 50px auto;
          padding: 1.5rem;
          /* padding-top: 1.5rem; */
          border: 2px solid #ddd;
          border-radius: 8px;
          background-color: #fff;
        }
    
        .text_align {
          text-align: center;
        }
    
        .header {
          border-bottom: 1px solid #eee;
          padding-bottom: 20px;
          padding-top: 1.5rem;
        }
    
        .header img {
          max-width: 100%;
          height: auto;
        }
    
        .verification-code {
          background: #00466a;
          /* margin: 20 auto; */
          width: max-content;
          padding: 0 10px;
          color: #fff;
          border-radius: 4px;
          display: inline-block;

          text-align: center !important;
        }
    
        .footer {
          font-size: 0.9em;
        }
    
        .footer hr {
          border: none;
          border-top: 1px solid #eee;
        }
      </style>
    </head>
    
    <body>
      <table class="container" role="presentation" cellspacing="0" cellpadding="0">
        <tr>
          <td>
            <table class="content" role="presentation" cellspacing="0" cellpadding="0">
              <tr>
                <td class="header text_align">
                  <a href="#">
                    <img src="{{url('public/assets/backend/images/brand_logo.png')}}" alt="Brand Logo">
                  </a>
                </td>
              </tr>
              <tr>
                <td style="text-align: left; padding:1.5rem;">
                  <p style="font-size: 1.1em; margin: 0;">Hi,</p>
                  <p style="margin: 0;">Before we get started, we just need to confirm that this is you. Use your
                    verification code below to confirm.</p>
                  <h2 class="verification-code " id="verification_code">{{$login_otp_data['otp']}}</h2>
                </td>
              </tr>
              <tr>
                <td class="footer" style="text-align: left; padding: 10px;">
                  <p style="margin: 0; padding:1.5rem;">
                    Regards,<br>Just Airports
                  </p>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </body>
    
    </html>