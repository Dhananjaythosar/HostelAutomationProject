For Mail Configuration:
    php.ini:
        SMTP=smtp.gmail.com
        smtp_port=587
        sendmail_from =pictpurchasesystem@gmail.com
        sendmail_path =  "\"C:\xampp\sendmail\sendmail.exe\" -t"
    
    sendmail.ini:
        smtp_server=smtp.gmail.com
        smtp_port=587
        error_logfile=error.log
        debug_logfile=debug.log
        auth_username=pictpurchasesystem@gmail.com
        auth_password=Pict@1234
        force_sender=pictpurchasesystem@gmail.com


Just change above lines in your file & if they are in comment just comment out it i.e remove ; from that line


