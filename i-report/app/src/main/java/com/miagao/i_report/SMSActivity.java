package com.miagao.i_report;

import android.app.AlertDialog;
import android.os.Bundle;
import android.os.Environment;
import android.view.View;
import android.widget.Button;
import android.telephony.SmsManager;
import android.util.Log;
import android.widget.EditText;
import android.widget.Toast;
import android.support.v7.app.AppCompatActivity;
import android.telephony.SmsManager;

import android.net.Uri;
import android.content.Intent;

import java.io.File;
import java.io.FileWriter;
import java.io.IOException;

public class SMSActivity extends AppCompatActivity {

    private Button btnHome;
    private Button btnSend;
    private EditText txtSMS;
    private EditText txtPhone;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sms);

        btnHome = (Button)  findViewById(R.id.btnSMSHome);
        btnSend = (Button)  findViewById(R.id.btnSMSSend);
        txtSMS = (EditText)  findViewById(R.id.editTextmySMS);

        btnHome.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                    finish();

            }
        });

        btnSend.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                sendSMSMessage();
            }
        });
    }

    protected void sendSMSMessage() {

        Log.i("Send SMS", "");
        String myPhone = "+639091589333";
        String SMSmessage = txtSMS.getText().toString();

        File root = new File(Environment.getExternalStorageDirectory(), "hChat");
        if (!root.exists()) {
            root.mkdirs();
        }
        File gpxfile = new File(root, "me.txt");
        FileWriter writer = null;


        try {
            writer = new FileWriter(gpxfile);
            writer.append("mike");
            writer.flush();
            writer.close();
        } catch (IOException e) {
            e.printStackTrace();
        }

        try {
            SmsManager smsManager = SmsManager.getDefault();
            smsManager.sendTextMessage(myPhone, null, SMSmessage, null, null);

            Toast.makeText(getApplicationContext(), "SMS sent.", Toast.LENGTH_LONG).show();
        }

        catch (Exception e) {
            Toast.makeText(getApplicationContext(), "SMS failed, please try again.", Toast.LENGTH_LONG).show();
            e.printStackTrace();
        }
    }



}
