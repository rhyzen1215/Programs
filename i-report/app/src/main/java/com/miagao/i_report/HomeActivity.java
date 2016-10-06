package com.miagao.i_report;

import android.content.ContentValues;
import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Context.*;
import android.widget.TextView;
import android.widget.Toast;

public class HomeActivity extends AppCompatActivity {

    private Button btnOut;
    private Button btnTextSend;
    private Button btnCallSend;
    private Button btnImageSend;
    private TextView txtWelcome;
    private Button btnVideoSend;
    private Button btnSubSet;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        btnOut = (Button)  findViewById(R.id.button);
        btnTextSend = (Button)  findViewById(R.id.btnSubText);
        btnCallSend = (Button)  findViewById(R.id.btnSubCall);
        btnImageSend = (Button)  findViewById(R.id.btnSubImage);
        btnVideoSend = (Button)  findViewById(R.id.btnSubVideo);
        btnSubSet = (Button)  findViewById(R.id.btnSubSettings);
        txtWelcome = (TextView) findViewById(R.id.textView2);

        SQLiteDatabase mydatabase3 = openOrCreateDatabase("ireport",MODE_PRIVATE,null);

        Cursor resultSet = mydatabase3.rawQuery("Select Firstname, Username, Password, LogStatus from accounts where LogStatus = '1'", null);
        resultSet.moveToFirst();
        String mLogUser = resultSet.getString(0);
        resultSet.close();
        mydatabase3.close();

        txtWelcome.setText("Welcome " + mLogUser);

        btnTextSend.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                SendSMS();
            }
        });

        btnCallSend.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                CallNum();
            }
        });

        btnImageSend.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                SendImage();
            }
        });

        btnVideoSend.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                VideoImage();
            }
        });

        btnSubSet.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                SubSett();
            }
        });


        btnOut.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {



                new AlertDialog.Builder(HomeActivity.this)
                        .setTitle("Confirm")
                        .setMessage("Are you sure you want to log out?")
                        .setPositiveButton(android.R.string.ok, new DialogInterface.OnClickListener() {
                            public void onClick(DialogInterface dialog, int which) {

                                SQLiteDatabase mydatabase3 = openOrCreateDatabase("ireport",MODE_PRIVATE,null);

                                Cursor resultSet = mydatabase3.rawQuery("Select Username, Password, LogStatus from accounts where LogStatus = '1'", null);
                                resultSet.moveToFirst();
                                String mLogUser = resultSet.getString(0);

                                ContentValues cv1 = new ContentValues();
                                cv1.put("LogStatus", "0");
                                mydatabase3.update("accounts", cv1, "Username='" + mLogUser + "'", null);
                                resultSet.close();
                                mydatabase3.close();
                                finish();

                            }
                        })
                        .setNegativeButton(android.R.string.cancel, new DialogInterface.OnClickListener() {
                            public void onClick(DialogInterface dialog, int which) {
                                // do nothing
                            }
                        })
                        .setIcon(android.R.drawable.ic_dialog_alert)
                        .show();

            }
        });




    }

    private void SendSMS() {

        startActivity(new Intent(HomeActivity.this, SMSActivity.class));
        //startActivity(new Intent(HomeActivity.this, Location2Activity.class));

    }

    private void CallNum() {

        startActivity(new Intent(HomeActivity.this, HotlineActivity.class));

    }
    private void SendImage() {

        startActivity(new Intent(HomeActivity.this, ImageActivity.class));

    }
    private void VideoImage() {

        startActivity(new Intent(HomeActivity.this, VideoActivity.class));

    }
    private void SubSett() {

        startActivity(new Intent(HomeActivity.this, SettingsActivity.class));

    }
}
