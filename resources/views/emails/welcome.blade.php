<body style="margin:0px; background: #f8f8f8; ">
    <div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
        <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
            <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
                <tbody>
                    <tr>
                        <td style="vertical-align: top; padding-bottom:30px;" align="center"><a href="javascript:void(0)" target="_blank"><img src="{{asset('assets/images/logo light.jpeg')}}" style="border:none"><br />
                            </a> </td>
                    </tr>
                </tbody>
            </table>
            <div style="padding: 40px; background: #fff;">
                <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                    <tbody>
                        <tr>
                            <td><b>Thanks for Purchasing,</b>
                                <p>This is to inform you that, Your account with lifesites has been created successfully. Log it to start enjoying those amazing applications.</p>
                                <br>
                                <p>USERNAME: {{$user_email}}</p>
                                <p>PASSWORD: {{$user_password}}</p>
                                <br>
                                <b>- Thanks ( LifeSites team)</b>
                            </td>
                        </tr>

                        <p>Login <a href="{{route('home')}}">Here</a></p>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>