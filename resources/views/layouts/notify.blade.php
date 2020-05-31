<!DOCTYPE html>
<html>
<head>
<title>Notify Responder</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<style type="text/css">
img {
    max-width: 600px;
    outline: none;
    text-decoration: none;
    -ms-interpolation-mode: bicubic;
}

a {
    text-decoration: none;
    border: 0;
    outline: none;
    color: #bbbbbb;
}

a img {
    border: none;
}

/* General styling */
td, h1, h2, h3  {
    font-family: 'Helvetica', Arial, sans-serif;
    font-weight: 400;
}

td {
    text-align: center;
}

body {
    -webkit-font-smoothing:antialiased;
    -webkit-text-size-adjust:none;
    width: 100%;
    height: 100%;
    color: #37302d;
    background: #ffffff;
    font-size: 16px;
}

table {
    border-collapse: collapse !important;
}

.headline {
    color: #ffffff;
    font-size: 36px;
}

.force-full-width {
    width: 100% !important;
}

.step-width {
    width: 110px;
    height: 111px;
}
</style>

<style type="text/css" media="screen">
    @media screen {
        td, h1, h2, h3 {
            font-family: 'Droid Sans', 'Helvetica Neue', 'Arial', 'sans-serif' !important;
        }
    }
</style>

<style type="text/css" media="only screen and (max-width: 480px)">
    @media only screen and (max-width: 480px) {

        table[class="w320"] {
            width: 320px !important;
        }

        img[class="step-width"] {
            width: 80px !important;
            height: 81px !important;
        }
    }
</style>
</head>

<body class="body" style="padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none" bgcolor="#ffffff">
    <table align="center" cellpadding="0" cellspacing="0" width="100%" height="100%" >
        <tr>
            <td align="center" valign="top" bgcolor="#ffffff"  width="100%">
                <center>
                    <table style="margin: 30px auto 0  auto;" cellpadding="0" cellspacing="0" width="600" class="w320">
                        <tr>
                            <td align="center" valign="top">
                                <table style="margin: 0 auto;" cellpadding="0" cellspacing="0" width="100%" bgcolor="#4dbfbf">
                                    <tr>
                                        <td class="headline">
                                        <br>
                                          Holla, {{ $name }}
                                        </td>
                                    </tr>
                        
                                    <tr>
                                        <td>
                                            <center>
                                                <table style="margin: 0 auto;" cellpadding="0" cellspacing="0" width="60%">
                                                    <tr>
                                                        <td style="color:#187272;">
                                                        <br>
                                                        <br>
                                                        Thanks for contacting us, please wait a moment we will contact you soon if you need quick information please visit the link on below
                                                        <br>
                                                        <br>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </center>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div><!--[if mso]>
                                                <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://" style="height:50px;v-text-anchor:middle;width:200px;" arcsize="8%" stroke="f" fillcolor="#178f8f">
                                                  <w:anchorlock/>
                                                  <center>
                                                <![endif]-->
                                                <a href="{{ route('index.home') }}" style="background-color:#178f8f;border-radius:4px;color:#ffffff;display:inline-block;font-family:Helvetica, Arial, sans-serif;font-size:16px;font-weight:bold;line-height:50px;text-align:center;text-decoration:none;width:200px;-webkit-text-size-adjust:none;">Welcome</a>
                                                <!--[if mso]>
                                                  </center>
                                                </v:roundrect>
                                                <![endif]-->
                                            </div>
                                            <br>
                                            <br>
                                        </td>
                                  </tr>
                                </table>

                                <table style="margin: 0 auto 30px auto;" cellpadding="0" cellspacing="0" class="force-full-width" bgcolor="#414141">
                                    <tr>
                                        <td style="padding-top:10px;">
                                            <label style="color:#dddddd; font-size:12px; font-weight:300; font-family:Segoe UI;">
                                                <a href="{{ route('index.home') }}">View in browser</a> | <a href="{{ route('index.home') }}">Unsubscribe</a> | <a href="{{ route('index.contact') }}">Contact</a>
                                                <br><br>
                                            </label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label style="color:#dddddd; font-size:13px; font-weight:300; font-family:Segoe UI;">
                                            © {{ date('Y') }} {{ $notice }} All Rights Reserved
                                            </label>
                                            <br>
                                            <br>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </center>
            </td>
        </tr>
    </table>
</body>
</html>